<?php

    namespace App\Http\Controllers;

    use App\Models\Contacts;
    use App\Models\Content;
    use App\Models\HeadBlock;
    use App\Models\Information;
    use App\Models\Newsletter;
    use App\Models\Price;
    use App\Models\Reservation;
    use App\Models\Reviews;
    use App\Models\SectionTitle;
    use App\Models\Services;
    use GuzzleHttp\Client;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Validator;
    use Laracasts\Flash\Flash;
    use SubscriptionConfirmation;
    use Yajra\DataTables\DataTables;
    use Yajra\DataTables\Exceptions\Exception;

    class AdminController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\JsonResponse
         * @throws Exception
         */
        public function index()
        {
            $prices = Price::all();
            $headBlocks = HeadBlock::all();
            $information = Information::all();
            $reviews = Reviews::all();
            $contacts = Contacts::all();
            $section_title = SectionTitle::all();
            $reservations = Reservation::all('new_date');
            $services = Services::all();
            $newsletter = Newsletter::all();
            $text_content = Content::all();
//            if (request()->ajax()) {
//                return datatables()->of(Services::latest()->get())
//                    ->addColumn('action', function ($data) {
//                        $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
//                        $button .= '&nbsp;&nbsp;';
//                        $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
//                        return $button;
//                    })
//                    ->rawColumns(['action'])
//                    ->make(true);
//            }
            return view('admin', compact('prices', 'headBlocks', 'information', 'reviews', 'contacts',
                'section_title', 'reservations', 'services', 'newsletter', 'text_content'));
        }

        public function storeHeaderBlock(Request $request)
        {

            $product = HeadBlock::create($request->input());
            return response()->json($product);
        }

        public function getHeaderBlock(Request $request)
        {
            return view('admin');

        }

        public function showHeaderBlock($headblock_id)
        {
            $headBlock = HeadBlock::find($headblock_id);
            return response()->json($headBlock);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function updateHeaderBlock(Request $request, $headblock_id)
        {
            $headblock = HeadBlock::find($headblock_id);
            $headblock->title = $request->title;
            $headblock->subtitle = $request->subtitle;
            $headblock->save();
            return response()->json($headblock);
        }

        public function destroyHeaderBlock($headblock_id)
        {
            $headBlock = HeadBlock::destroy($headblock_id);
            return response()->json($headBlock);
        }

        public function subscribe(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'agree' => 'required',
                'recaptcha' => 'required'
            ]);

            // Implement Google reCAPTCHA v3 verification
            $recaptcha_token = $request->input('recaptcha');
            $recaptcha_secret_key = '6LcivXInAAAAAOSU4FzhvY87QghSlLPDMnuTOlt7';
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret' => $recaptcha_secret_key,
                    'response' => $recaptcha_token
                ]
            ]);

            $body = json_decode((string)$response->getBody());
            if (!$body->success || $body->score < 0.5) {
                return redirect()->back()->withInput()->withErrors(['recaptcha' => 'Failed to verify reCAPTCHA.']);
            }

            // Send the email
            $email = $request->input('email');
            // Implement your email sending logic here, using Laravel's Mail class or any other email package.
            // For simplicity, I'll use the `mail()` function.
            mail($email, 'Subscription Successful', 'Thank you for subscribing.');

            // Save the email to a text file
            $this->saveToTextFile($email);

            return redirect()->back()->with('success', 'Subscription successful.');
        }

        private function saveToTextFile($email)
        {
            $filename = public_path('subscribers.txt');
            file_put_contents($filename, $email . PHP_EOL, FILE_APPEND);
        }

        public function reservations()
        {
            $reservations = Reservation::all();
            $blockedDates = [];
            // Loop through each reservation and get the custom date value
            foreach ($reservations as $reservation) {
                // Access the 'custom_date' attribute (using the accessor) to get the custom date value
                $blockedDates[] = $reservation->custom_date;
            }
            $blockedDatesJson = json_encode($blockedDates);
            return view('admin', compact('blockedDatesJson'));
        }

        /*Reviews collection methods*/
        public function getReservationDates()
        {
            try {
                // Fetch data from the database or perform other operations

                // Example of returning data as JSON
                $reviews = Reservation::all('new_date');
//                $reviews = Reservation::all('new_date')->map(function ($reservation) {
//                    return date('Y/m/d', strtotime($reservation->new_date));
//                });
                return response()->json($reviews);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to retrieve reviews'], 500);
            }
        }


        public function uploadImage(Request $request)
        {
            $uploadedFile = $request->file('file');

            // Save the file to the "public/c" directory
            $imagePath = $request->file('file')->storePublicly('images', 'custom');

            // Extract the filename from the stored path
            $imageName = basename($imagePath);
            // Get the public URL for the file
            return response()->json(['location' => "/images/$imageName"]);
        }
    }

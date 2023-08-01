<?php

    namespace App\Http\Controllers;

    use App\Models\Contacts;
    use App\Models\Content;
    use App\Models\HeadBlock;
    use App\Models\Information;
    use App\Models\Price;
    use App\Models\Reservation;
    use App\Models\Reviews;
    use App\Models\SectionTitle;
    use App\Models\Services;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Validator;
    use Laracasts\Flash\Flash;
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
            if (request()->ajax()) {
                return datatables()->of(Services::latest()->get())
                    ->addColumn('action', function ($data) {
                        $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin', compact('prices', 'headBlocks', 'information', 'reviews', 'contacts',
                'section_title', 'reservations', 'services'));
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
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:subscribes,email',
                'agree' => 'required|accepted',
                'g-recaptcha-response' => 'required|captcha'
            ], [
                'agree.accepted' => 'You must agree to the terms and conditions.',
                'g-recaptcha-response.required' => 'Please complete the reCAPTCHA.'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            return redirect()->back()->with('success', 'Thank you for subscribing!');

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

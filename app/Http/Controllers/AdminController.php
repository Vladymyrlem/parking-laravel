<?php

    namespace App\Http\Controllers;

    use App\Mail\NewSubscriberNotification;
    use App\Models\AboutUs;
    use App\Models\Contacts;
    use App\Models\Content;
    use App\Models\HeadBlock;
    use App\Models\Information;
    use App\Models\Newsletter;
    use App\Models\Parking;
    use App\Models\Price;
    use App\Models\Reservation;
    use App\Models\Reviews;
    use App\Models\SectionTitle;
    use App\Models\Services;
    use GuzzleHttp\Client;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Validation\Validator;
    use Laracasts\Flash\Flash;
    use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
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
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\View\View
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
            $about_us = AboutUs::all();
            $about_us_title = DB::table('about_us')->value('title');;
            $about_us_content = DB::table('about_us')->value('content');
            $parkings = Parking::all();
            $parkings_arrival = Parking::all('arrival');
            $parkings_departure = Parking::all('departure');
            return view('admin', compact('prices', 'headBlocks', 'information', 'reviews', 'contacts',
                'section_title', 'reservations', 'services', 'newsletter', 'text_content', 'about_us', 'about_us_title', 'about_us_content', 'parkings'));
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
         * @return \Illuminate\Http\JsonResponse
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
                'email' => 'email',

//                'g-recaptcha-response' => 'required|recaptchav3:newsletter-form,0.5'
            ]);

            // Implement Google reCAPTCHA v3 verification
//            $recaptcha_token = $request->input('recaptcha');
//            $recaptcha_secret_key = '6LfCSLgnAAAAAAwp2E-HSCwKa6htwmFkFlyC9puJ';
//            $client = new Client();
//            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
//                'form_params' => [
//                    'secret' => $recaptcha_secret_key,
//                    'response' => $recaptcha_token
//                ]
//            ]);

//            $body = json_decode((string)$response->getBody());
//            if (!$body->success || $body->score < 0.5) {
//                return redirect()->back()->withInput()->withErrors(['recaptcha' => 'Failed to verify reCAPTCHA.']);
//            }
            $response = RecaptchaV3::verify($request->input('g-recaptcha-response'));

           // if ($response) {
            // Send the email
            $email = $request->input('email');
            // Implement your email sending logic here, using Laravel's Mail class or any other email package.
            // For simplicity, I'll use the `mail()` function.
            Mail::mailer('ukrnet')->to('vladymyrlem@ukr.net')->send(new NewSubscriberNotification($request->email));
            // Save the email to a text file
            return response()->json(['message' => 'You have been subscribed successfully!']);
      //  }else {
        // reCAPTCHA verification failed
   // return response()->json(['error' => 'reCAPTCHA verification failed'], 422);
    //}

    }

    public
    function reservations()
    {
        $reservations = Reservation::all('new_date');
        $blockedDates = [];
        // Loop through each reservation and get the custom date value
        foreach ($reservations as $reservation) {
            // Access the 'custom_date' attribute (using the accessor) to get the custom date value
            $blockedDates[] = $reservation->custom_date;
        }
        $blockedDatesJson = json_encode($blockedDates);
        return view('admin', compact('blockedDatesJson'));
    }

//        public function uploadImage(Request $request)
//        {
//            $uploadedFile = $request->file('file');
//
//            // Save the file to the "public/c" directory
//            $imagePath = $request->file('file')->storePublicly('images', 'custom');
//
//            // Extract the filename from the stored path
//            $imageName = basename($imagePath);
//            // Get the public URL for the file
//            return response()->json(['location' => "/images/$imageName"]);
//        }
    public
    function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('file');

        // Get the original filename
        $originalFilename = $uploadedFile->getClientOriginalName();

        // Save the file to the "public/images" directory with the original filename
        $imagePath = $request->file('file')->storeAs('images', $originalFilename, 'custom');

        // Get the public URL for the file
        return response()->json(['location' => "/images/$originalFilename"]);
    }

    public
    function calendarDate(Request $request)
    {
        $dates = [];

        // Loop through the request input to extract date values
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'field_date_') === 0) {
                $dates[substr($key, 11)] = $value;
            }
        }

        // Loop through the dates and store them in the database
        foreach ($dates as $key => $date) {
            Reservation::create([
                'new_date' => $date, // Adjust column names accordingly
            ]);
        }

        return response()->json(['message' => 'Reservation dates stored successfully']);
    }

    public
    function storeAllDates(Request $request)
    {
        $selectedDates = $request->input('dates');

        foreach ($selectedDates as $key => $date) {
            // Assuming you have a Reservation model and 'start_date' is the column name
            Reservation::create([
                'new_date' => $date,
            ]);
        }

        return response()->json(['message' => 'All dates stored successfully']);
    }

    public
    function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }

    public
    function deleteByDate(Request $request)
    {
        $blockedDate = $request->input('blockedDate');
        Log::info('Blocked Date: ' . $blockedDate);

        $reservation = Reservation::where('new_date', $blockedDate)->first();
        Log::info('Found Reservation: ' . json_encode($reservation));

        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Reservation deleted successfully']);
    }


    public
    function getUpdatedDatesList()
    {
//            return view('partials.dates-list', ['name' => 'John Doe', 'email' => 'john@example.com'] );
        $reservations = Reservation::pluck('new_date');
        return response()->json([
            'success' => true,
            'message' => 'Reservation deleted successfully',
            'data' => $reservations,
        ]);
    }

    public
    function deleteOrder($id)
    {
        $order = Parking::find($id);
        if ($order) {
            $order->delete();
            return response()->json(['message' => 'Order deleted successfully']);
        }
        return response()->json(['message' => 'Order not found'], 404);
    }
    }

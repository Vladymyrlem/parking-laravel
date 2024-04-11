<?php

    namespace App\Http\Controllers;

    use App\Mail\ContactMail;
    use App\Models\Contacts;
    use App\Models\HeadBlock;
    use App\Models\Information;
    use App\Models\Parking;
    use App\Models\Price;
    use App\Models\SeasonPrices;
    use App\Models\Reservation;
    use App\Models\Reviews;
    use App\Models\Services;
    use Carbon\Carbon;
    use DateInterval;
    use DatePeriod;
    use DateTime;
    use DateTimeZone;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Validator;
    use TimeHunter\LaravelGoogleReCaptchaV2\Facades\GoogleReCaptchaV2;

    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            $prices = Price::where('count_days', '<=', 15)->get();

// Витягуємо усі ціни де колонка count_days рівна 16
            $prices16 = Price::where('count_days', 16)->get();
            $seasonPrices = SeasonPrices::all();
            $headBlocks = HeadBlock::all();
            $information = Information::all();
            $reservations = Reservation::all('new_date');
            $reviews = Reviews::all();
            $contacts = Contacts::all();
            $services = Services::all();
            $phoneNumber = DB::table('contacts')->value('phone_number_1');
            $address = DB::table('contacts')->value('address');
            $map_link = DB::table('contacts')->value('map_link');
            $about_us_title = DB::table('about_us')->value('title');
            $about_us_content = DB::table('about_us')->value('content');
            $blockedDates = [];
            // Loop through each reservation and get the custom date value
            foreach ($reservations as $reservation) {
                // Access the 'custom_date' attribute (using the accessor) to get the custom date value
                $blockedDates[] = $reservation->custom_date;
            }
            $blockedDatesJson = json_encode($blockedDates);
            $today = Carbon::now(new DateTimeZone('Europe/Warsaw'))->startOfDay();  // Get the start of the day in Warsaw timezone

// Filter out old dates and keep only dates from today onwards
            $newReservations = $reservations->filter(function ($reservation) use ($today) {
                // Compare the 'new_date' string with today's date string
                return $reservation->new_date >= $today;
            });
            // Pass the $blockedDates variable to the view
            return view('home', compact('headBlocks', 'prices','prices16','seasonPrices', 'information', 'blockedDatesJson',
                'reviews', 'phoneNumber', 'address', 'map_link', 'about_us_title', 'about_us_content', 'services', 'reservations', 'newReservations'));
        }

        public function sendContactUs(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'contact_firstname' => 'required|min:3',
                'contact_phone' => 'required|min:3',
                'contact_lastname' => 'required',
                'contact_email' => 'required|email',
                'contact_message' => 'required',
                'checkbox1' => 'accepted',
                'checkbox2' => 'accepted'
            ]);
            $adminEmail = config('mail.from.address'); // This will retrieve the admin email from the .env file

//            if ($validator->passes()) {
            // Return the total price as a JSON response (optional)
            Mail::mailer('reservation')->to('kontakt@parkingrondo.pl')->send(new ContactMail($request->all()));

            return response()->json(['message' => 'Message sent successfully']);
//            } else {
//                return response()->json(['error' => $validator->errors()]);
//            }
        }

        public function verify(Request $request)
        {
            dd(GoogleReCaptchaV2::verifyResponse($request->input('g-recaptcha-response'))->getMessage());
        }

    }

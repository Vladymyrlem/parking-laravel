<?php

    namespace App\Http\Controllers;

    use App\Models\Contacts;
    use App\Models\HeadBlock;
    use App\Models\Information;
    use App\Models\Price;
    use App\Models\Reservation;
    use App\Models\Reviews;
    use DateInterval;
    use DatePeriod;
    use DateTime;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

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
            $prices = Price::all();
            $headBlocks = HeadBlock::all();
            $information = Information::all();
            $reservations = Reservation::all();
            $reviews = Reviews::all();
            $contacts = Contacts::all();
            $phoneNumber = DB::table('contacts')->value('phone_number_1');
            $address = DB::table('contacts')->value('address');
            $map_link = DB::table('contacts')->value('map_link');
            $blockedDates = [];
            // Loop through each reservation and get the custom date value
            foreach ($reservations as $reservation) {
                // Access the 'custom_date' attribute (using the accessor) to get the custom date value
                $blockedDates[] = $reservation->custom_date;
            }
            $blockedDatesJson = json_encode($blockedDates);
            // Pass the $blockedDates variable to the view
            return view('home', compact('headBlocks', 'prices', 'information', 'blockedDatesJson',
                'reviews', 'phoneNumber', 'address', 'map_link'));
        }
    }

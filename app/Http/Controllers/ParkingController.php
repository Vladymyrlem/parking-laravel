<?php

    namespace App\Http\Controllers;

    use App\Models\Parking;
    use App\Models\Price;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class ParkingController extends Controller
    {


        public function storeParking(Request $request)
        {
            // Validate the form data (you can add your validation rules here)

            // Get the difference in days from the form data
//            $startDate = $request->input('checkout_pick_up_date');
//            $endDate = $request->input('checkout_drop_off_date');
//            $startTime = $request->input('checkout_pick_up_time');
//            $endTime = $request->input('checkout_drop_off_time');
//            // Parse the received date strings into Carbon instances
//            $parsedStartDate = Carbon::parse($startDate);
//            $parsedEndDate = Carbon::parse($endDate);
//
//            // Calculate the difference in days
//            $differenceInDays = $parsedStartDate->diffInDays($parsedEndDate);
//
//            // Combine the date and time values into a single DateTime string
//            $combinedStartDateTime = $startDate . ' ' . $startTime;
//            $combinedEndDateTime = $endDate . ' ' . $endTime;
            // Create a new order record in the database and save the calculated price
            $order = Parking::create($request->input());
//            $order->arrival = $combinedStartDateTime;
//            $order->departure = $combinedEndDateTime;
//            $order->number_days = $differenceInDays;
//            $order->price = $request->input('checkout_price');
//            $order->number_peoples = $request->input('checkout_people');
//            $order->client_name = $request->input('checkout_firstname');
//            $order->client_surname = $request->input('checkout_lastname');
//            $order->phone_number = $request->input('checkout_phone');
//            $order->email = $request->input('checkout_email');
//            $order->car_type = $request->input('checkout_car');
//            $order->car_mark = $request->input('checkout_car_brand');
//            $order->car_model = $request->input('checkout_car_model');
            // Add other form fields as needed
//            $order->save();

            // Return the total price as a JSON response (optional)
            return response()->json($order);

        }

        public function getParking(Request $request)
        {
            return view('admin');

        }

        public function showParking($parking_id)
        {
            $parking = Parking::find($parking_id);
            return response()->json($parking);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $parking_id
         * @return \Illuminate\Http\Response
         */
        public function updateParking(Request $request, $parking_id)
        {
            $parking = Parking::find($parking_id);
            $parking->title = $request->title;
            $parking->subtitle = $request->subtitle;
            $parking->approval_rodo = $request->approval_rodo;
            $parking->approval_title = $request->approval_title;
            $parking->approval_subtitle = $request->approval_subtitle;
            $parking->save();
            return response()->json($parking);
        }
    }

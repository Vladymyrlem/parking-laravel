<?php

    namespace App\Http\Controllers;

    use App\Models\Contacts;
    use App\Models\Parking;
    use App\Models\Price;
    use Barryvdh\DomPDF\Facade\Pdf;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\OrderConfirmation;

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
            $order->fill($request->all());

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
            $order["email"] = $order->email;
            $order["title"] = "Laravel 8 send email with attachment - Techsolutionstuff";
            $order["body"] = "Laravel 8 send email with attachment";
            $arrivalDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->arrival)->format('d/m/Y H:i');
            $departureDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->departure)->format('d/m/Y H:i');
            $contacts = Contacts::all();
            $pdf = PDF::loadView('pdf-template', compact('order', 'arrivalDate', 'contacts'));
            $pdf->setOption('encoding', 'utf-8');

            $filename = 'order_' . $order->id . '.pdf';

            $pdf->save(public_path('order/' . $filename));

            $adminEmail = config('mail.from.address'); // This will retrieve the admin email from the .env file
            Mail::mailer('ukrnet')->to($order->email)->send(new OrderConfirmation($order, $filename));
            Mail::mailer('ukrnet')->to($adminEmail)->send(new OrderConfirmation($order, $filename));
            // Return the total price as a JSON response (optional)
            return response()->json([
                'message' => 'Order created successfully!',
                'order' => $order,
                'pdf_url' => url('order/' . $order->id . '.pdf'), // Replace with the actual path to your PDF
            ]);

        }

        public function generatePdfContent(Parking $order_data)
        {

            // Example: Create a PDF using SnappyPDF
            $pdf = PDF::loadView('pdf-template', compact('order_data'));

            // Save the PDF to a file
            $pdfPath = public_path('order/' . $order_data->id . '.pdf');
            $pdf->output();

            return $pdfPath;
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

<?php

    namespace App\Http\Controllers;

    use App\Models\Reviews;
    use Illuminate\Http\Request;
    use App\Models\Reservation;
    use Carbon\Carbon;
    use Illuminate\Http\Response;

    // Assuming you have a "Reservation" model for the database table

    class ReservationController extends Controller
    {
        public function saveReservations(Request $request)
        {
            $selectedDates = $request->input('reservation_dates');

            // Assuming you have a user authentication system, get the authenticated user ID
            $userId = auth()->user()->id;

            // Save the selected dates to the database
            foreach ($selectedDates as $date) {
                Reservation::create([
                    'new_date' => $date,
                ]);
            }

            // Redirect back or display a success message
            return redirect()->back()->with('success', 'Reservations saved successfully.');
        }


    }

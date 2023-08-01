<?php

    namespace Database\Seeders;

    use App\Models\Reservation;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;

    class ReservationSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $startDate = strtotime('01/07/2023');
            $endDate = time(); // Get today's date in Unix timestamp format

            // Loop through dates from 01.07.2023 to today
            for ($date = $startDate; $date <= $endDate; $date = strtotime('+1 day', $date)) {
                // Format the date to 'Y-m-d' (MySQL date format)
                $formattedDate = date('d/m/Y', $date);

                // Insert the record into the 'reservations' table
                Reservation::create([
                    'new_date' => $formattedDate,
                    // Add other columns as needed
                ]);
            }
        }
    }

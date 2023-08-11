<?php

    namespace Database\Seeders;

    use App\Models\Parking;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Faker\Factory as Faker;

    class ParkingOrders extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $faker = Faker::create();

            foreach (range(1, 100) as $index) {
                $arrival = $faker->dateTimeBetween('now', '2023-10-31');
                $departure = $faker->dateTimeBetween($arrival, '+3 month');
                $numberDays = $faker->numberBetween(1, 10);
                $basePrice = ($numberDays <= 3) ? 99 : (119 + ($numberDays - 4) * 10);
                $price = $basePrice * $numberDays;
                $numberPeople = $faker->numberBetween(1, 10);
                $typeCar = $faker->numberBetween(1, 3);

                Parking::create([
                    'arrival' => $arrival,
                    'departure' => $departure,
                    'number_days' => $numberDays,
                    'price' => $price,
                    'number_peoples' => $numberPeople,
                    'client_name' => $faker->firstName,
                    'client_surname' => $faker->lastName,
                    'phone_number' => $faker->phoneNumber,
                    'email' => $faker->email,
                    'type_car' => $typeCar,
                    'car_mark' => $faker->word,
                    'car_model' => $faker->word,
                    'car_number' => $faker->regexify('[A-Z0-9]{6}'),
                    'updated_at' => now(),
                    'deleted_at' => null,
                    'created_at' => now(),
                ]);
            }
        }
    }

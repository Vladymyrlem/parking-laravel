<?php

    namespace Database\Seeders;

    // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use ParkingOrderSeeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()
        {
            // \App\Models\User::factory(10)->create();

             \App\Models\User::factory()->create([
                 'name' => 'Yevhenii',
                 'email' => 'admin@example.com',
                 'password' => bcrypt('password')
             ]);
//            $this->call(ReservationSeeder::class);
//            $this->call(ParkingOrders::class);
        }
    }

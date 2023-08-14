<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('parking', function (Blueprint $table) {
                $table->id();
                $table->dateTime('arrival');
                $table->dateTime('departure');
                $table->integer('number_days');
                $table->integer('price');
                $table->integer('number_peoples');
                $table->text('client_name');
                $table->text('client_surname');
                $table->integer('phone_number');
                $table->text('email');
                $table->string('type_car');
                $table->string('car_mark');
                $table->string('car_number');
                $table->string('car_model');
                $table->timestamps();
                $table->softDeletes();

            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('parking');
        }
    };

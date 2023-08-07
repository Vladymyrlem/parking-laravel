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
            Schema::table('parking', function (Blueprint $table) {
                $table->dropColumn('start_date');
                $table->string('car_model');
                $table->string('car_type');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('parking', function (Blueprint $table) {
                $table->dropColumn('car_type');
                $table->dropColumn('car_model');
                $table->dateTime('start_date');
            });
        }
    };

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
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('contacts_title');
                $table->string('email');
                $table->string('address');
                $table->string('phone_number_1');
                $table->string('phone_number_2');
                $table->float('latitude');
                $table->float('longitude');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('contacts', function (Blueprint $table) {
                Schema::dropIfExists('contacts');
            });
        }
    };

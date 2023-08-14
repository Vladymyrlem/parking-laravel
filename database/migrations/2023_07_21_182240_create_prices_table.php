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
            Schema::create('prices', function (Blueprint $table) {
                $table->id();
                $table->integer('count_days')->default(0)->change();
                $table->decimal('standart_price', 8, 2);
                $table->decimal('promotional_price', 8, 2);
                $table->date('start_promotional_date');
                $table->date('end_promotional_date');
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
            Schema::dropIfExists('prices');
        }
    };

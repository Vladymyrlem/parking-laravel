<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('season_prices', function (Blueprint $table) {
            $table->id();
            $table->string('season');
            // Змінюємо тип колонки для кожного дня місяця (1-15) на string
            for ($i = 1; $i <= 15; $i++) {
                $table->string('day_'.$i.'_price')->nullable();
            }
            // Змінюємо тип колонки для ціни за більше ніж 15 днів на string
            $table->string('price_15_plus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('season_prices');
    }
};

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
            $table->integer('count_days')->default(0)->change();
            for ($i = 1; $i <= 12; $i++) {
                $previousColumn = $i - 1 > 0 ? 'month_'.($i-1) : null;
                $table->decimal('month_'.$i, 8, 2)->nullable();
            }
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
        Schema::dropIfExists('season_price');
    }
};

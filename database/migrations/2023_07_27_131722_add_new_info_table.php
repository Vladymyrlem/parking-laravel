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
            Schema::create('infovideo', function (Blueprint $table) {
                $table->id();
                $table->text('description')->nullable();
                $table->text('video')->nullable();
                $table->softDeletes();
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
            Schema::table('infovideo', function (Blueprint $table) {
                $table->dropIfExists('infovideo');
            });
        }
    };

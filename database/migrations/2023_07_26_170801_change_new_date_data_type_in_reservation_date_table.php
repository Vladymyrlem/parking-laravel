<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up()
        {
            Schema::table('reservation_date', function (Blueprint $table) {
                $table->string('new_date')->change();
                $table->dropColumn('user_id');
            });
        }

        public function down()
        {
            Schema::table('reservation_date', function (Blueprint $table) {
                // If you ever need to revert the change, you can use this method
                // However, this may lead to data loss if the column contained non-VARCHAR data before the change
                $table->date('new_date')->change();
                $table->integer('user_id');
            });
        }
    };

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
            if (!Schema::hasColumn('sections_title', 'subtitle')) {
                Schema::table('sections_title', function (Blueprint $table) {
                    $table->string('subtitle');
                });
            }
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('sections_title', function (Blueprint $table) {
                $table->dropColumn('subtitle');
            });
        }
    };

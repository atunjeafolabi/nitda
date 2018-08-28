<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->string('othername')->nullable($value = true);
            $table->string('sex');
            $table->date('dob');
            $table->string('phone',11);
            $table->string('origin_state');
            $table->string('origin_lga');
            $table->string('address_of_residence');
            $table->string('city_of_residence');
            $table->string('state_of_residence');
            $table->string('photo_path');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applicants', function (Blueprint $table) {
            $table->dropColumn('othername');
            $table->dropColumn('sex');
            $table->dropColumn('dob');
            $table->dropColumn('phone');
            $table->dropColumn('origin_state');
            $table->dropColumn('origin_lga');
            $table->dropColumn('address_of_residence');
            $table->dropColumn('city_of_residence');
            $table->dropColumn('state_of_residence');
            $table->dropColumn('photo_path');
        });
    }
}

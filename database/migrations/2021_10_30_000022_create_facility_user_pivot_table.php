<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('facility_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_5230226')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id', 'facility_id_fk_5230226')->references('id')->on('facilities')->onDelete('cascade');
        });
    }
}

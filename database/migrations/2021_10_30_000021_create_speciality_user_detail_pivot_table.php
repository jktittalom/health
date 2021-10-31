<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialityUserDetailPivotTable extends Migration
{
    public function up()
    {
        Schema::create('speciality_user_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('user_detail_id');
            $table->foreign('user_detail_id', 'user_detail_id_fk_5122898')->references('id')->on('user_details')->onDelete('cascade');
            $table->unsignedBigInteger('speciality_id');
            $table->foreign('speciality_id', 'speciality_id_fk_5122898')->references('id')->on('specialities')->onDelete('cascade');
        });
    }
}

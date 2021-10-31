<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSpecialityPivotTable extends Migration
{
    public function up()
    {
        Schema::create('job_speciality', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_id_fk_5122942')->references('id')->on('jobs')->onDelete('cascade');
            $table->unsignedBigInteger('speciality_id');
            $table->foreign('speciality_id', 'speciality_id_fk_5122942')->references('id')->on('specialities')->onDelete('cascade');
        });
    }
}

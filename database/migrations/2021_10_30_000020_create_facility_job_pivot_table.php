<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityJobPivotTable extends Migration
{
    public function up()
    {
        Schema::create('facility_job', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_id_fk_5230489')->references('id')->on('jobs')->onDelete('cascade');
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id', 'facility_id_fk_5230489')->references('id')->on('facilities')->onDelete('cascade');
        });
    }
}

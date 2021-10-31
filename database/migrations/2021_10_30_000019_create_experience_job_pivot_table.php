<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceJobPivotTable extends Migration
{
    public function up()
    {
        Schema::create('experience_job', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id', 'job_id_fk_5230556')->references('id')->on('jobs')->onDelete('cascade');
            $table->unsignedBigInteger('experience_id');
            $table->foreign('experience_id', 'experience_id_fk_5230556')->references('id')->on('experiences')->onDelete('cascade');
        });
    }
}

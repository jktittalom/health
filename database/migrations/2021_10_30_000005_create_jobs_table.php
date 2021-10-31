<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title');
            $table->string('job_description')->nullable();
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('job_type');
            $table->integer('is_hourly')->nullable();
            $table->integer('hour_rate')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_mobile')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('desigantion')->nullable();
            $table->string('attach_1')->nullable();
            $table->string('attach_2')->nullable();
            $table->string('budget')->nullable();
            $table->string('mall_practice')->nullable();
            $table->string('min_salary');
            $table->string('max_salart');
            $table->string('over_time')->nullable();
            $table->string('call_required')->nullable();
            $table->string('publish');
            $table->longText('notes')->nullable();
            $table->string('travel_expense');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

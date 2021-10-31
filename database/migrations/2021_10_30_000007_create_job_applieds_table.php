<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAppliedsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applieds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('applied_date_time');
            $table->datetime('contract_end_time')->nullable();
            $table->integer('is_cancelled')->nullable();
            $table->datetime('cancelled_date_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

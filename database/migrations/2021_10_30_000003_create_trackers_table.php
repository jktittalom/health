<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackersTable extends Migration
{
    public function up()
    {
        Schema::create('trackers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('view')->nullable();
            $table->longText('view_users')->nullable();
            $table->integer('click')->nullable();
            $table->longText('click_users')->nullable();
            $table->integer('applied')->nullable();
            $table->longText('applied_users')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

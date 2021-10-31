<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('notification_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('weekdays')->nullable();
            $table->integer('all_days')->nullable();
            $table->time('time');
            $table->string('timezone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

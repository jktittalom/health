<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('price');
            $table->integer('is_trial');
            $table->integer('is_paid');
            $table->integer('is_trial_expired')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

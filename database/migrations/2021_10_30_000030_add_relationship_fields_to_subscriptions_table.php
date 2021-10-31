<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id', 'provider_fk_5232836')->references('id')->on('users');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id', 'package_fk_5232837')->references('id')->on('packages');
        });
    }
}

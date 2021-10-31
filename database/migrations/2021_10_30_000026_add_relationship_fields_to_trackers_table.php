<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrackersTable extends Migration
{
    public function up()
    {
        Schema::table('trackers', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_fk_5232627')->references('id')->on('users');
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id', 'contract_fk_5232628')->references('id')->on('jobs');
        });
    }
}

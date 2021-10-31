<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobsTable extends Migration
{
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5122926')->references('id')->on('users');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id', 'profile_fk_5230358')->references('id')->on('profiles');
        });
    }
}

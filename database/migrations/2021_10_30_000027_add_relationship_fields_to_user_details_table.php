<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('facility_id')->nullable();
            $table->foreign('facility_id', 'facility_fk_5122896')->references('id')->on('facilities');
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id', 'profile_fk_5230235')->references('id')->on('profiles');
            $table->unsignedBigInteger('experience_id')->nullable();
            $table->foreign('experience_id', 'experience_fk_5232802')->references('id')->on('experiences');
        });
    }
}

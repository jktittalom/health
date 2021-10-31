<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobAppliedsTable extends Migration
{
    public function up()
    {
        Schema::table('job_applieds', function (Blueprint $table) {
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id', 'contract_fk_5232709')->references('id')->on('jobs');
            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id', 'provider_fk_5232710')->references('id')->on('users');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderTypesTable extends Migration
{
    public function up()
    {
        Schema::create('provider_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

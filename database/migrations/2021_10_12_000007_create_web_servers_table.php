<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebServersTable extends Migration
{
    public function up()
    {
        Schema::create('web_servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server_name')->unique();
            $table->string('ip_address')->unique();
            $table->string('operating_system')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

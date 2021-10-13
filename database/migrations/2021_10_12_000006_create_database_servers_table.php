<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseServersTable extends Migration
{
    public function up()
    {
        Schema::create('database_servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('server_name')->unique();
            $table->string('server_ip')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

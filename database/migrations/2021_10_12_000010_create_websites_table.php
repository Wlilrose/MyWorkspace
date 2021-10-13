<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_url')->unique();
            $table->longText('status')->nullable();
            $table->date('date_uploaded')->nullable();
            $table->longText('config_file_location')->nullable();
            $table->string('web_version')->nullable();
            $table->string('admin_url')->unique();
            $table->string('admin_password');
            $table->string('site_template')->nullable();
            $table->string('favicon')->nullable();
            $table->string('remarks')->nullable();
            $table->date('date_last_check')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

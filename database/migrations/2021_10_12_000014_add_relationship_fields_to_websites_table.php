<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWebsitesTable extends Migration
{
    public function up()
    {
        Schema::table('websites', function (Blueprint $table) {
            $table->unsignedBigInteger('office_id');
            $table->foreign('office_id', 'office_fk_5092471')->references('id')->on('offices');
            $table->unsignedBigInteger('hosting_server_id');
            $table->foreign('hosting_server_id', 'hosting_server_fk_5092474')->references('id')->on('web_servers');
            $table->unsignedBigInteger('database_server_id');
            $table->foreign('database_server_id', 'database_server_fk_5092476')->references('id')->on('database_servers');
            $table->unsignedBigInteger('platform_id')->nullable();
            $table->foreign('platform_id', 'platform_fk_5092477')->references('id')->on('technology_useds');
        });
    }
}

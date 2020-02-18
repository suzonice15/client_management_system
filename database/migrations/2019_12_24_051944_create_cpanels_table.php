<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCpanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpanels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cpanel_domain_name',255);
            $table->string('cpanel_url',255);
            $table->string('cpanel_user',255);
            $table->string('cpanel_password',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpanels');
    }
}

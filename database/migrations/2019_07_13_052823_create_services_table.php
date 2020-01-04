<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('service_id');
            $table->integer('customer_id');
            $table->integer('service_status');
            $table->integer('service_name');
            $table->string('service_present_price',255);
            $table->string('service_domain_name',255);
            $table->string('service_hosting_space',255);
            $table->string('service_renue_price',255);
            $table->dateTime('service_start_date');
            $table->dateTime('service_end_date');
            $table->dateTime('service_renue_start_date');
            $table->dateTime('service_renue_end_date');
            $table->string('service_remark',255);

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
        Schema::dropIfExists('services');
    }
}

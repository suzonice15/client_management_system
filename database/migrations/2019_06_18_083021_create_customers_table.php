<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name',255);
            $table->string('customer_mobile',255);
            $table->string('customer_email',255);
            $table->integer('devision_id');
            $table->integer('area_id');
            $table->integer('position_id');
            $table->integer('profession_id');
            $table->integer('type_id');
            $table->string('customer_remark',255);
            $table->string('customer_address',255);
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
        Schema::dropIfExists('customers');
    }
}

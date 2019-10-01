<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('adress')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('pin')->nullable();
            $table->integer('created_by')->unsigned()->nullable()->index();
            $table->integer('service_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}

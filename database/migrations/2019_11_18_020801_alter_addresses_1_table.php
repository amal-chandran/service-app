<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterAddresses1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function(Blueprint $table)
        {
            $table->string('address')->nullable();
            $table->dropColumn('adress');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table)
        {
            $table->dropColumn('address');
            $table->string('adress')->nullable();

        });
    }
}

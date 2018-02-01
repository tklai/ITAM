<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('machineName');
            $table->integer('asset_model_id')->unsigned();
            $table->string('serialNumber')->unique();
            $table->integer('vendor_id')->unsigned();
            $table->date('orderDate');
            $table->date('warrantyExpiryDate');
            $table->integer('location_id')->unsigned();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('assets');
    }
}

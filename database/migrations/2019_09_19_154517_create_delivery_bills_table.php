<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_bills', function (Blueprint $table) {
            $table->bigIncrements('id_bill_d');

            $table-> biginteger('id_pharm')->unsigned();

            $table->foreign('id_pharm')->references('id')->on('pharm_infos')->onDelete('cascade');


            $table-> decimal('price',5,2)->default(0);         
            $table-> string('note');   

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
        Schema::dropIfExists('delivery_bills');
    }
}

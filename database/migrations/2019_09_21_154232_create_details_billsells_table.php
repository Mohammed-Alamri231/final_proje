<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsBillsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_billsells', function (Blueprint $table) {
            $table->biginteger('id_billsell')->unsigned();

            $table->foreign('id_billsell')->references('id_bill')->on('head_billsells')->onDelete('cascade');

            $table-> biginteger('id_product')->unsigned();

            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
           
            $table-> string('name_pro');

            $table-> integer('quantity');

            $table-> decimal('orignal_price',5,2)->default(0);            

            $table-> decimal('price',5,2)->default(0);            

            $table-> string('date_end')->nullable();    

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
        Schema::dropIfExists('details_billsells');
    }
}

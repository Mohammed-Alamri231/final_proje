<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsBillprusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('details_billprus', function (Blueprint $table) {
            $table->biginteger('id_billpru')->unsigned();

            $table->foreign('id_billpru')->references('id_billpru')->on('head_billprus')->onDelete('cascade');

            $table-> biginteger('id_product')->unsigned();

            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
           
            $table-> string('name_pro');

            $table-> integer('quantity');

            $table-> decimal('price',5,2)->default(0);            
            

            $table-> string('date_end')->nullable();

            $table->timestamps();
        });
        */
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::dropIfExists('details_billprus');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
           // $table->integer('stock_number')->nullable();
            $table->string('stock_name')->nullable();
            $table->string('stock_address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('icon')->nullable();
            $table->biginteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('malls')->onDelete('cascade');
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
        Schema::dropIfExists('stocks');
    }
}

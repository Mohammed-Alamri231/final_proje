<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('title')->nullable();
        //     $table->integer('serial_number')->nullable();
        //     $table->string('photo')->nullable();
        //     $table->longText('content')->nullable();

        //     $table->biginteger('id_comp')->unsigned()->nullable();
        //     $table->foreign('id_comp')->references('company_id')->on('comp_infos')->onDelete('cascade');

        //     $table->biginteger('department_id')->unsigned()->nullable();
        //     $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

        //     $table->biginteger('trade_id')->unsigned()->nullable();
        //     $table->foreign('trade_id')->references('id')->on('trade_marks')->onDelete('cascade');

        //     $table->biginteger('manu_id')->unsigned()->nullable();
        //     $table->foreign('manu_id')->references('id')->on('manufacturers')->onDelete('cascade');

        //     $table->biginteger('mall_id')->unsigned()->nullable();
        //     $table->foreign('mall_id')->references('id')->on('malls')->onDelete('cascade');

        //     $table->biginteger('stock_id')->unsigned()->nullable();
        //     $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');

        //     $table->biginteger('color_id')->unsigned()->nullable();
        //     $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

        //     $table->string('size')->nullable();
        //     $table->biginteger('size_id')->unsigned()->nullable();
        //     $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

        //     $table->biginteger('currency_id')->unsigned()->nullable();
        //     $table->foreign('currency_id')->references('id')->on('countries');

        //     $table->decimal('price',5,2)->default(0);
        //    // $table->integer('stock')->default(0);
        //     $table->integer('quantity')->default(0);

        //     $table->date('start_at')->nullable();
        //     $table->date('end_at')->nullable();

        //     $table->date('start_offer_at')->nullable();
        //     $table->date('end_offer_at')->nullable();
        //     $table->decimal('price_offer',5,2)->default(0);

        //     $table->longText('other_data')->nullable();

        //     $table->string('weight')->nullable();
           
        //     $table->enum('status',['pending','refused','active'])->default('pending');
        //     $table->longText('reason')->nullable();

        //     $table->date('pro_start')->nullable();
        //     $table->date('pro_end')->nullable();

        //     $table->timestamps();
        // });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('products');
    }
}

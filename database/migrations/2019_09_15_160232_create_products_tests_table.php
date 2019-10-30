<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_tests', function (Blueprint $table) {
            $table-> bigIncrements('id');
            $table-> string("name", 255)->nullable();
            $table-> text("description")->nullable();
            $table-> string("photo", 255)->nullable();
            $table-> decimal("price", 6, 2);
            $table-> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_tests');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadBillsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_billsells', function (Blueprint $table) {
            $table-> bigIncrements('id_bill');

            $table-> biginteger ('id_comp')->unsigned();
            $table->foreign('id_comp')->references('company_id')->on('comp_infos')->onDelete('cascade');

            $table-> biginteger('no_pharm')->unsigned();
            $table->foreign('no_pharm')->references('id')->on('pharm_infos')->onDelete('cascade');

            $table-> string('email')->nullable();

            $table-> decimal('totale',5,2)->default(0);
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
        Schema::dropIfExists('head_billsells');
    }
}

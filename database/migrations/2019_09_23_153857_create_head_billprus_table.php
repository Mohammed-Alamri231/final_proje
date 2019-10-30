<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadBillprusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
     {Schema::create('head_billprus', function (Blueprint $table) {
        $table-> bigIncrements('id_billpru');

        $table-> biginteger('id_pharm')->unsigned();

        //$table->foreign('id_pharm')->references('id')->on('pharm_infos')->onDelete('cascade');

        $table-> string('pharm_name');

        $table-> string('email')->nullable();

        $table-> decimal('totale',10,2)->default(0);

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
        Schema::dropIfExists('head_billprus');
    }
}

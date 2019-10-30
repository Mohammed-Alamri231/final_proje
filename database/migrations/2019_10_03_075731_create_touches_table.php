<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTouchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('touches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> string('fname',255);
            $table-> string('lname',255);
            $table-> string('email');
            $table-> string('subject',255);
            $table-> longtext ('message');
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
        Schema::dropIfExists('touches');
    }
}

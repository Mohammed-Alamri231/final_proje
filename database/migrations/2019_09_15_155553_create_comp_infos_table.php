<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comp_infos', function (Blueprint $table) {
            $table->bigIncrements('company_id');
            $table-> string('company_name',255);
            $table-> integer('company_tel')->nullable();
            $table-> integer('company_phone');
            $table-> string('company_email')->unique();
            $table-> integer('company_account');
            $table-> text ('company_address'); 
            $table-> string('guarantee',255);
            $table-> string('med_permit',255);
            $table-> integer('owner_id')->nullable();
            $table-> string('company_icon', 255)->nullable();
            $table-> integer('count_parts')->nullable();
            $table-> string('company_type')->nullable();
            $table-> string('password');
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
        Schema::dropIfExists('comp_infos');
    }
}

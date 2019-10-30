<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharm_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> string ('pharm_name',255)->nullable();
            $table-> integer ('pharm_tel');
            $table-> integer ('pharm_phone')->nullable();
            $table-> string ('pharm_email')->unique();
            $table-> string ('pharm_address');
            $table-> integer ('pharm_acc');
            $table-> string ('med_permit')->nullable();
            $table-> string ('guarantee')->nullable();
            $table-> string  ('pharm_icon')->nullable();
            $table-> string ('pharm_type');
            $table-> integer ('id_center');
            $table-> integer ('distance');
            $table-> string ('password');
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
        Schema::dropIfExists('pharm_infos');
    }
}

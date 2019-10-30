<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> string('name',255)->nullable();
            $table-> integer('phone')->nullable();
            $table-> integer ('tel')->nullable();
            $table-> string('email')->unique()->nullable();
            $table-> integer('account')->nullable();
            $table-> text ('address')->nullable();
            $table-> text('guarantee')->nullable();
            $table-> string('permit',255)->nullable();
            $table-> integer('owner')->nullable();
            $table-> string('icon', 255)->nullable();
            $table-> integer('parts')->nullable();
            $table-> string('type')->nullable();
            $table-> string('it_as')->nullable();
            $table-> integer ('distance')->nullable();
            $table-> string('password')->nullable();

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
        Schema::dropIfExists('accepts');
    }
}

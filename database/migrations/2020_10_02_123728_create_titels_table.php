<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titels', function (Blueprint $table) {
            //$table->id();
            $table->integer('BuchNr');
            $table->string('sachgebiet');
            $table->string('autor');
            $table->string('titel');
            $table->string('ort');
            $table->integer('jahr');
            $table->string('vaerlag');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titels');
    }
}

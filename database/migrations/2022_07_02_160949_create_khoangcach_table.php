<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khoangcach', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_trg')->unsigned();
            $table->foreign('id_trg')->references('id')->on('truong');
            $table->bigInteger('id_kt')->unsigned();
            $table->foreign('id_kt')->references('id')->on('khutro');
            $table->double('khoangcach');
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
        Schema::dropIfExists('khoangcach');
    }
};

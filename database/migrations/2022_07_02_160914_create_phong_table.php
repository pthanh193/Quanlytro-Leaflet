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
        Schema::create('phong', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lp')->unsigned();
            $table->foreign('id_lp')->references('id')->on('loaiphong');
            $table->bigInteger('id_kt')->unsigned();
            $table->foreign('id_kt')->references('id')->on('khutro');
            $table->integer('stt');
            $table->string('tinhtrang');
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
        Schema::dropIfExists('phong');
    }
};

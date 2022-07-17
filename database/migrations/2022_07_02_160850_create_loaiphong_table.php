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
        Schema::create('loaiphong', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kt')->unsigned();
            $table->foreign('id_kt')->references('id')->on('khutro');
            $table->string('ten');
            $table->integer('songuoi');
            $table->integer('dientich');
            $table->integer('gia');
            $table->integer('soluong');
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
        Schema::dropIfExists('loaiphong');
    }
};

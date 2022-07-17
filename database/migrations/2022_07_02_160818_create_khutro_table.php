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
        Schema::create('khutro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ct')->unsigned();
            $table->string('ten');
            $table->string('diachi');
            $table->bigInteger('id_phuong')->unsigned();
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();

            $table->foreign('id_ct')->references('id')->on('chutro');
            $table->foreign('id_phuong')->references('id')->on('phuong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khutro');
    }
};

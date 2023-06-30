<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('peramalan', function (Blueprint $table) {
            $table->id();

            $table->string('peramalan_periode')->nullable();
            $table->string('peramalan_aktual')->nullable();
            $table->string('peramalan_ramal')->nullable();
            $table->string('peramalan_mape')->nullable();

            $table->unsignedBigInteger('barang_id')->nullable()->default(null);
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peramalan');
    }
};

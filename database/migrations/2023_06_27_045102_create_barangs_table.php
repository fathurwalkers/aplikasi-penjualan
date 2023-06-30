<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();

            $table->string('barang_kode')->nullable();
            $table->string('barang_nama')->nullable();
            $table->string('barang_kategori')->nullable();
            $table->string('barang_ukuran')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
};

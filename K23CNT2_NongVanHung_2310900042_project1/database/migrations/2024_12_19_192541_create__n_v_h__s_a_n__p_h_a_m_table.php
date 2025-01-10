<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nvh_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('nvhMaSanPham',255)->unique();
            $table->string('nvhTenSanPham',255);
            $table->string('nvhHinhAnh',255);
            $table->integer('nvhSoLuong');
            $table->float('nvhDonGia');
            $table->bigInteger('nvhMaLoai')->references('id')->on('nvh_LOAI_SAN_PHAM');
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvh_san_pham');
    }
};
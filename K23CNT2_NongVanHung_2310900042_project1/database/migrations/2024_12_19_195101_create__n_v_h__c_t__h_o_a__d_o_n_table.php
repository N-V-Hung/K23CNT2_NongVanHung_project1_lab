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
        Schema::create('nvh_ct_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nvhHoaDonID')->references('id')->on('nvh_hoa_don');
            $table->bigInteger('nvhSanPhamID')->references('id')->on('nvh_san_pham');
            $table->integer('nvhSoLuongMua');
            $table->decimal('nvhDonGiaMua', 10, 2);
            $table->decimal('nvhThanhTien', 10, 2)->nullable(); // Add this if required
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvh_ct_hoa_don');
    }
};
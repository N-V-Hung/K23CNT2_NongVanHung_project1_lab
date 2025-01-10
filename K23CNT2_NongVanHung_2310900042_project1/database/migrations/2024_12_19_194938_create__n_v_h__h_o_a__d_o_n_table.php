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
        Schema::create('nvh_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->string('nvhMaHoaDon',255)->unique();
            $table->bigInteger('nvhMaKhachHang')->references('id')->on('nvh_khach_hang');
            $table->dateTime('nvhNgayHoaDon');
            $table->dateTime('nvhNgayNhan');
            $table->string('nvhHoTenKhachHang',255);
            $table->string('nvhEmail',255);
            $table->string('nvhDienThoai',255);
            $table->string('nvhDiaChi',255);
            $table->float('nvhTongGiaTri');
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvh_hoa_don');
    }
};
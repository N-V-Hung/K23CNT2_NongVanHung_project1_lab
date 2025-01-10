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
        Schema::create('NVH_TIN_TUC', function (Blueprint $table) {
            $table->id();
            $table->string('nvhMaTT')->unique(); // Assuming 'nvhMaTT' is unique, add unique constraint if needed
            $table->string('nvhTieuDe');
            $table->text('nvhMoTa'); // 'text' type is better for longer descriptions
            $table->longText('nvhNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('nvhNgayDangTin'); // Store as datetime
            $table->dateTime('nvhNgayCapNhap'); // Store as datetime
            $table->string('nvhHinhAnh');
            $table->tinyInteger('nvhTrangThai'); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NVH_TIN_TUC');
    }
};

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
        Schema::create('nvh_loai_san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('nvhMaLoai',255)->unique();
            $table->string('nvhTenLoai',255);
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvh_loai_san_pham');
    }
};

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
        Schema::create('NVH_QUANTRI', function (Blueprint $table) {
            $table->id();
            $table->string('nvhTaiKhoan', 255)->unique(); // Corrected unique() syntax
            $table->string('nvhMatKhau', 255);
            $table->tinyInteger('nvhTrangThai');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('NVH_QUANTRI');
    }
};

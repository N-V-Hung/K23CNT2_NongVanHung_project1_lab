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
        Schema::create('nvhvattu', function (Blueprint $table) {
            //$table->id();
            $table->string('nvhMaVtu')->primary();
            $table->string('nvhTenVTu')->unique();
            $table->string('nvhDVTinh');
            $table->float('nvhphanTram');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhvattu');
    }
};

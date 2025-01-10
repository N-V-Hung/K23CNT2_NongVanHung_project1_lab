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
        Schema::create('nvhctPxuat', function (Blueprint $table) {
            //$table->id();
            //$table->timestamps();
            $table->string('nvhSoPx');
            $table->string('nvhMaVTu');
            $table->interger('nvhSLNhap');
            $table->float('nvhDGNhap');
            $table->primary(arry('nvhSoPx','nvhMaVTu'));
           //$table->primary(['nvhSoDH','nvhMaVTu']);
           $table->foreign('nvhSoPx')->references('nvhSoPn')->on('nvhpxuat');
           $table->foreign('nvhMaVTu')->references('nvhMaVTu')->on('nvhavattu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nvhctPxuat');
    }
};

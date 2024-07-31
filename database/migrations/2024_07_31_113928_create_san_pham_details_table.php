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
        Schema::create('san_pham_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_san_pham')->unique();            
            $table->unsignedBigInteger('id_mau_sac')->unique();
            $table->unsignedBigInteger('id_size')->unique();
            $table->unsignedInteger('gia');
            $table->unsignedInteger('so_luong');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_details');
    }
};

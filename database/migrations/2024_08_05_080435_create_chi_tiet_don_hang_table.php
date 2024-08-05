<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DonHang;   // Ensure you have the correct namespace for DonHang
use App\Models\Product; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->id();
            


            $table->double('don_gia');
            $table->unsignedInteger('so_luong');
            $table->double('thanh_tien');

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};

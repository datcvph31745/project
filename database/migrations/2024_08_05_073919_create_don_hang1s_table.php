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
        Schema::create('don_hang1s', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang')->unique();

            // $table ->foreignd

            $table->string('ten_nguoi_nhan');
            $table->string('email_nguoi_nhan');
            $table->string('so_dien_thoai_nguoi_nhan');
            $table->string('dia_chi_nguoi_nhan');
            $table->text('ghi_chu')->nullable();




            $table->string('trang_thai_don_hang')->default();
            $table->string('trang_thai_thanh_toan')->default();

            $table->double('tien_hang');
            $table->double('tien_ship');
            $table->double('tong_tien');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang1s');
    }
};

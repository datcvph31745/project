<?php
use App\Models\DonHang;  // Ensure correct namespace for DonHang
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// Ensure correct namespace for Product

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id');
            $table->unsignedBigInteger('product_id');
        
            $table->foreign('don_hang_id')->references('id')->on('don_hang1s')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('san_phams')->onDelete('cascade');
    
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
        Schema::dropIfExists('chi_tiet_don_hangs'); // Match the table name used in `up`
    }
};

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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('don_hang_id');
            $table->unsignedBigInteger('product_id');
        
            // Define foreign keys
            $table->foreign('don_hang_id')
                ->references('id')
                ->on('don_hang1s')
                ->onDelete('cascade'); // Ensures the related records are deleted if the parent is deleted
            
            $table->foreign('product_id')
                ->references('id')
                ->on('san_phams')
                ->onDelete('cascade'); // Ensures the related records are deleted if the parent is deleted
    
            // Other columns
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
        // Drop the foreign key constraints before dropping the table
        Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->dropForeign(['don_hang_id']);
            $table->dropForeign(['product_id']);
        });
        
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};

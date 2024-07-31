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
        Schema::create('gio_hangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_san_pham')->unique();
            $table->unsignedBigInteger('id_user')->unique();
            $table->string('image')->nullable();
            $table->unsignedInteger('so_luong');
            $table->unsignedInteger('gia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gio_hangs');
    }
};

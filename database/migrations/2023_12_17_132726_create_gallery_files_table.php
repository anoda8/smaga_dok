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
        Schema::create('gallery_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->string('photo_url');
            $table->decimal('size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_files');
    }
};

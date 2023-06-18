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
        Schema::create('notes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('folder_id')->nullable(true);
            $table->foreign('folder_id')->references('id')->on('folders')->cascadeOnDelete()->cascadeOnDelete();
            $table->string('title', 100);
            $table->text('content')->nullable(true);
            $table->boolean('is_archived')->default(false);
            $table->boolean('is_favorited')->default(false);
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};

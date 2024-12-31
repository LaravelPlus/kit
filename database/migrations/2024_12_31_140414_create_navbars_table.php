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
        Schema::create('navbar', function (Blueprint $table) {
            $table->id(); // Primary key (automatically indexed)
            $table->string('title'); // Title of the menu item
            $table->string('url')->nullable(); // URL of the menu item
            $table->string('icon')->nullable(); // Optional icon for the menu item
            $table->unsignedBigInteger('parent_id')->nullable(); // Parent menu item ID
            $table->integer('order')->default(0); // Order for display
            $table->boolean('is_active')->default(true); // Whether the menu item is active
            $table->timestamps();

            // Foreign key to reference parent menu items
            $table->foreign('parent_id')->references('id')->on('navbar')->onDelete('cascade');

            // Add indexes
            $table->index('parent_id'); // Index for hierarchical queries
            $table->index('order'); // Index for sorting
            $table->index('is_active'); // Index for filtering by active state
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbar');
    }
};

<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    private Blueprint $table;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table): void {
            $this->table = $table;
            $this->defineTableStructure();
            $this->applyIndexes();
            $this->applyForeignKeys();
        });
    }

    /**
     * Define the table structure.
     */
    private function defineTableStructure(): void
    {
        $this->table->id();
        $this->table->uuid('uuid')->unique()->comment('Globally unique identifier for the team');
        $this->table->string('name')->comment('The name of the team');
        $this->table->string('slug')->unique()->comment('Unique slug for the team, used in URLs');
        $this->table->string('description')->nullable()->default('No description provided.')->comment('Optional description of the team');
        $this->table->unsignedBigInteger('user_id')->index()->comment('Foreign key referencing the user who owns the team');
        $this->table->boolean('is_active')->default(true)->index()->comment('Whether the team is active');
        $this->table->unsignedBigInteger('created_by')->nullable()->comment('User who created the team');
        $this->table->unsignedBigInteger('updated_by')->nullable()->comment('User who last updated the team');
        $this->table->timestamps();
    }

    /**
     * Apply indexes to the table.
     */
    private function applyIndexes(): void
    {
        $this->table->index(['user_id', 'is_active']);
        $this->table->index(['slug', 'user_id']);
    }

    /**
     * Apply foreign key constraints to the table.
     */
    private function applyForeignKeys(): void
    {
        if (config('database.allowForeignKeys', true)) {
            $this->table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $this->table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $this->table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

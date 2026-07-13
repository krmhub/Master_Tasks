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
        Schema::create('tasks', function (Blueprint $table) {
            // Primary key
            $table->id();
            
            // Task title - required field
            $table->string('title');
            
            // Task description - optional field
            $table->text('description')->nullable();
            
            // Due date for the task - optional
            $table->date('due_date')->nullable();
            
            // Task completion status - defaults to false (not completed)
            $table->boolean('is_completed')->default(false);
            
            // Task importance level - defaults to 'medium'
            $table->enum('importance', ['low', 'medium', 'high'])->default('medium');
            
            // Foreign key linking to users table
            // onDelete('cascade') means when user is deleted, their tasks are also deleted
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Created at and updated at timestamps
            $table->timestamps();
            
            // Add indexes for better query performance
            $table->index('user_id');        // For filtering tasks by user
            $table->index('is_completed');   // For filtering completed/incomplete tasks
            $table->index('due_date');       // For sorting and filtering by date
            $table->index('importance');     // For filtering by importance level
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
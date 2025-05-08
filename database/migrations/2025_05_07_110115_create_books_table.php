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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
        $table->string('title'); // Column for the book title
        $table->unsignedBigInteger('author_id'); // Foreign key for the author
        $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade'); // Foreign key constraint
        $table->text('description')->nullable(); // Column for the book description
        $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

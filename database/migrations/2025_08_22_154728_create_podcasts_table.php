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
    Schema::create('podcasts', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->string('author');
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->enum('type', ['audio', 'video']);
        $table->enum('format', ['lien', 'fichier']);
        $table->string('link')->nullable();   // si format = lien
        $table->string('file_path')->nullable(); // si format = fichier
        $table->timestamps();
    });
 }

};

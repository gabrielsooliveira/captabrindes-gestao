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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codeXBZ')->unique();
            $table->string('name');
            $table->integer('min_quantity')->default(1);
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('source_url')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

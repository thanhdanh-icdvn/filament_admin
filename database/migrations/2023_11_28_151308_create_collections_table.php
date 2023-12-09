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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->enum('type', ['manual', 'auto'])->default('auto');
            $table->string('sort')->nullable(); //Nullable, potential values alpha_asc, alpha_desc, price_desc, price_asc, created_desc, created_asc
            $table->longText('description')->nullable();
            $table->enum('match_conditions', ['all', 'any'])->nullable();
            $table->dateTimeTz('published_at')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};

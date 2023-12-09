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
        Schema::create('collection_rules', function (Blueprint $table) {
            $table->id();
            $table->string('rule'); //current values product_title, product_price, compare_at_price, inventory_stock, product_brand, product_category
            $table->string('operator'); //current values equals_to, not_equals_to, less_than, greater_than, starts_with, ends_with, contains, not_contains
            $table->string('value');
            $table->foreignId('collection_id')->nullable()->constrained('collections', 'id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_rules');
    }
};

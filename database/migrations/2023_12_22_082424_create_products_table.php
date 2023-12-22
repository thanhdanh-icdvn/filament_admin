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
        Schema::disableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->char('SKU');
            $table->foreignId('category_id')->nullable()->constrained('product_categories', 'id')->nullOnDelete();
            $table->foreignId('inventory_id')->nullable()->constrained('product_inventories', 'id')->nullOnDelete();
            $table->decimal('price')->default(0);
            $table->foreignId('discount_id')->nullable()->constrained('discounts', 'id')->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

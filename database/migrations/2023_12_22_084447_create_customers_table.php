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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->char('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->char('email');
            $table->string('mobile_number')->default(null);
            $table->decimal('postal_code')->nullable();
            $table->string('street')->nullable();
            $table->foreignId('province_code')->nullable()->constrained('provinces', 'code')->nullOnDelete();
            $table->foreignId('district_code')->nullable()->constrained('districts', 'code')->nullOnDelete();
            $table->foreignId('ward_code')->nullable()->constrained('wards', 'code')->nullOnDelete();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

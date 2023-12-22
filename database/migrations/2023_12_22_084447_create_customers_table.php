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
            $table->string('first_name');
            $table->string('last_name');
            $table->char('username');
            $table->string('password');
            $table->char('email')->nullable();
            $table->string('mobile_number')->nullable();
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

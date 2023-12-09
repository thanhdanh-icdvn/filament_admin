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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('bank_id')->nullable()->constrained('banks', 'id')->nullOnDelete();
            $table->string('accountNo');
            $table->string('accountName');
            $table->unsignedBigInteger('amount')->nullable();
            $table->string('addInfo')->nullable();
            $table->string('format')->nullable();
            $table->enum('template', ['compact', 'compact2', 'qr_only', 'print'])->default('compact');
            $table->string('qr')->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

<?php

use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->enum('gender', ['name', 'female', 'other']);
            $table->string('email')->unique();
            $table->string('mobile_number')->unique();
            $table->foreignIdFor(Province::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(District::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Ward::class)->nullable()->constrained()->nullOnDelete();
            $table->string('street');
            $table->foreignIdFor(Department::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('iso3');
            $table->char('iso2');
            $table->char('numeric_code');
            $table->char('phone_code');
            $table->string('capital')->nullable();
            $table->string('currency');
            $table->string('currency_name');
            $table->char('currency_symbol');
            $table->char('tld');
            $table->string('native');
            $table->foreignId('region_id')->nullable()->constrained('regions', 'id')->nullOnDelete();
            $table->foreignId('subregion_id')->nullable()->constrained('sub_regions', 'id')->nullOnDelete();
            $table->string('nationality');
            $table->longText('timezones');
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->char('emoji');
            $table->char('emojiU');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};

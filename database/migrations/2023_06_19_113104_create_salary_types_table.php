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
        Schema::create('salary_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->decimal('daily_rate', $precision = 8, $scale = 2);
            $table->decimal('hourly_rate', $precision = 8, $scale = 2);
            $table->decimal('tax_bir', $precision = 8, $scale = 2);
            $table->decimal('tax_sss', $precision = 8, $scale = 2);
            $table->decimal('tax_phealth', $precision = 8, $scale = 2);
            $table->decimal('tax_pibig', $precision = 8, $scale = 2);
            $table->decimal('ot_rate', $precision = 8, $scale = 2);
            $table->decimal('allowance', $precision = 8, $scale = 2);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_types');
    }
};

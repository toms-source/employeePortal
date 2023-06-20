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
        Schema::create('payroll_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('cutoff_from');
            $table->date('cutoff_to');
            $table->integer('present_days_total'); //manggagaling sa sched
            $table->decimal('regular_hours_total', $precision = 8, $scale = 2);
            $table->decimal('gross_pay', $precision = 8, $scale = 2);
            $table->decimal('deductions', $precision = 8, $scale = 2);
            $table->decimal('allowance', $precision = 8, $scale = 2);
            $table->decimal('net_pay', $precision = 8, $scale = 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_lists');
    }
};

  


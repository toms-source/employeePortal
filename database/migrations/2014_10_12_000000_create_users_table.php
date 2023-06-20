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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('employee_number')->unique()->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('department')->nullable();
            $table->string('employee_status')->nullable();
            $table->string('role')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('civil_status')->nullable();
            $table->integer('number')->nullable()->default(0);
            $table->string('address')->nullable();
            $table->integer('sss')->nullable();
            $table->integer('tin')->nullable();
            $table->integer('philhealth')->nullable();
            $table->integer('pagibig')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_relationship')->nullable();
            $table->string('position')->nullable();
            $table->string('description')->nullable();
            $table->decimal('salary_rate', 8, 2)->nullable();
            $table->string('status')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('profile_picture')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users_benefits', function (Blueprint $table) {
            $table->id(); // Trường ID tự động tăng
            $table->string('benefit_name');
            $table->text('description')->nullable();
            $table->string('benefit_type');
            $table->string('applicable_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_benefits');
    }
};

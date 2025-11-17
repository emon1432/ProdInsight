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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->enum('type', ['Inclusive', 'Exclusive'])->default('Exclusive');
            $table->double('rate')->default(0);
            $table->enum('calculation_method', ['Percentage', 'Fixed'])->default('Percentage');
            $table->enum('scope', ['Product', 'Sales', 'Purchase'])->default('Product');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->longText('description')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->softDeletes();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxes');
    }
};

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
        Schema::create('raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->string('barcode')->nullable()->unique();
            $table->foreignId('raw_material_category_id')->constrained('raw_material_categories')->onDelete('cascade');
            $table->foreignId('purchase_unit_id')->constrained('units')->onDelete('cascade');
            $table->double('purchase_price')->default(0);
            $table->foreignId('consumption_unit_id')->constrained('units')->onDelete('cascade');
            $table->double('conversion_rate')->default(0);
            $table->double('consumption_price')->default(0);
            $table->double('stock')->default(0);
            $table->double('alert_stock')->default(0);
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_materials');
    }
};

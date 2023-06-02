<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->tinyInteger('type')->default(1)->comment('1:physical, 2:digital');
            $table->tinyInteger('status')->default(1)->comment('1:published, 2:drafted');
            $table->json('description')->nullable();

            // $table->unsignedFloat('price')->default(0);
            // $table->unsignedBigInteger('cost_price')->nullable();
            // $table->unsignedBigInteger('stock')->nullable();
            // $table->foreignId('unit_id')->nullable()->constrained('units')->nullOnDelete();

            // $table->tinyInteger('allow_order_quantity')->default(2)->comment('1:allowed, 2:notAllowed');
            // $table->unsignedInteger('min_order_quantity')->nullable();
            // $table->unsignedInteger('max_order_quantity')->nullable();

            // $table->boolean('has_feature')->default(0);

            // $table->unsignedBigInteger('sales_count')->default(0);
            // $table->json('sub_title')->nullable();
            // $table->json('marketing_title')->nullable();
            // $table->json('data')->nullable();
            // $table->json('meta')->nullable();
            // $table->json('custom_fields')->nullable();

            $table->foreignId('vendor_id')->constrained('vendors')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();

            // $table->unsignedBigInteger('discount_id')->nullable();
            // $table->foreign('discount_id')->references('id')->on('discounts');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
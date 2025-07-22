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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('products_code')->nullable();
            $table->string('products_name');
            $table->decimal('buying_price', 10, 2)->nullable();
            $table->decimal('selling_price', 10, 2);
            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('buying_date')->nullable();
            $table->foreignId('shop_id')->constrained()->onDelete('cascade');
            $table->string('unit')->nullable(); //  pcs, kg, liter
            $table->integer('stock_quantity')->default(0); // current stock
            $table->string('image')->nullable();
            $table->timestamps();
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

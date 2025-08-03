<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categories;
use App\Models\Stock;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100); // até 100 caracteres
            // $table->integer("quantity"); // até 1000 caracteres. mas nao pode colocar no sql
            $table->string("serial", 50)->unique(); // até 50 caracteres e campo pode ser nulo
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('stock_id')
                  ->nullable()
                  ->constrained('stocks')
                  ->nullOnDelete(); // se o stock for apagado, limpa o stock_id
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

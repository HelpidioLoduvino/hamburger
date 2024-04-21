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
        Schema::create('soft_drinks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("stock_id");
            $table->foreign("stock_id")->references("id")->on("stocks");
            $table->string("drink_name");
            $table->decimal("drink_price", 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soft_drinks');
    }
};

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
        Schema::create('hamburgers', function (Blueprint $table) {
            $table->id();
            $table->string('burger_name');
            $table->string('burger_descr');
            $table->decimal('burger_price', 8, 2);
            $table->string('burger_img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hamburgers');
    }
};

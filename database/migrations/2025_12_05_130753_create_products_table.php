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
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();

            // Price
            $table->unsignedBigInteger('price_vnd')->nullable()->comment('Numeric price in VND');
            $table->string('price_display')->nullable();

            // Performance / specs
            $table->string('power')->nullable();
            $table->integer('power_ps')->nullable();
            $table->integer('power_kw')->nullable();
            $table->integer('torque_nm')->nullable();
            $table->decimal('acceleration_sec', 5, 2)->nullable()->comment('0-100 km/h in seconds');
            $table->integer('top_speed_kmh')->nullable();
            $table->decimal('consumption_l_per_100km', 6, 2)->nullable();

            // Dimensions
            $table->integer('length_mm')->nullable();
            $table->integer('height_mm')->nullable();

            // Images
            $table->string('main_image')->nullable();
            $table->json('gallery')->nullable();

            // Inventory / flags
            $table->integer('stock')->default(0);
            $table->boolean('is_active')->default(true);

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

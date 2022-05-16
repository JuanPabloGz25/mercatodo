<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('code', 6);
            $table->tinyText('category');
            $table->tinyText('brand');
            $table->tinyText('line')->unique();
            $table->string('model');
            $table->tinyText('color');
            $table->tinyText('transmission');
            $table->decimal('kilometre');
            $table->tinyText('engine');
            $table->tinyText('fuel');
            $table->tinyText('torque');
            $table->tinyText('power');
            $table->float('price',8,2);
            $table->unsignedInteger('stock');
            $table->tinyText('description');
            $table->string('image')->nullable();
            $table->enum('status',['enable','disable'])->default('enable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}

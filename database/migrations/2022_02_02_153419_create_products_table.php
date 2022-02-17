<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->char('code', 6);
            $table->string('image');
            $table->tinyText('marca');
            $table->tinyText('linea');
            $table->tinyText('especificaciones');
            $table->BigInteger('price');
            $table->unsignedInteger('stock');
            $table->enum('status',['enable','disable'])->default('enable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

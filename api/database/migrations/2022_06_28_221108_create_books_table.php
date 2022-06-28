<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->text('short_description');
            $table->text('description')->nullable();
            $table->bigInteger('type');
            $table->bigInteger('price');
            $table->bigInteger('sale_price');
            $table->bigInteger('stock_qty');
            $table->bigInteger('category_id');
            $table->bigInteger('author_id');
            $table->boolean('is_active')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};

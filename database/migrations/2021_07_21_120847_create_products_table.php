<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('picture', 255)->nullable();
            $table->string('name', 255);
            $table->string('category', 255)->nullable();
            $table->string('subcategory', 255)->nullable();
            $table->string('subtype', 255)->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->string('stock_status', 255)->nullable();
            $table->string('description', 2550)->nullable();
            $table->string('rating', 255)->nullable();
            $table->string('product_url', 255);
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

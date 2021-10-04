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
            $table->integer('category_id', '11')->autoIncrement(false);
            $table->integer('sub_category_id', '11')->autoIncrement(false)->nullable();
            $table->integer('vendor_id', '11')->autoIncrement(false);
            $table->string('title', '150');
            $table->text('description');
            $table->bigInteger('qty')->unsigned();
            $table->bigInteger('current_price')->unsigned();
            $table->bigInteger('old_price')->unsigned()->nullable();
            $table->string('photo', '100')->nullable();
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
        Schema::dropIfExists('products');
    }
}

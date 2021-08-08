<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name', '150');
            $table->string('mobile', '50');
            $table->string('email', '100')->unique()->nullable();
            $table->string('address', '150');
            $table->integer('category_id', '11')->autoIncrement(false);
            $table->string('logo', '100')->nullable();
            $table->tinyInteger('active')->nullable()->comment = '0 => inactive, 1 => active';
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
        Schema::dropIfExists('vendors');
    }
}

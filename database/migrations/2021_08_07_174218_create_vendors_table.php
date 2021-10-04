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
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->string('name', '150');
            $table->string('slug', '150');
            $table->string('mobile', '50');
            $table->string('email', '100')->unique();
            $table->string('address', '150');
            $table->string('logo', '100')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('token', '32')->nullable();
            $table->string('password', '150')->nullable();
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
        Schema::dropIfExists('vendor');
    }
}

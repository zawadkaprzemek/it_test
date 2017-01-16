<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unigned();
            $table->integer('product_id')->unigned();
            $table->string('variant');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('page');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page_product');
    }
}

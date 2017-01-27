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
            //$table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('variant');
            $table->timestamps();
        });
        Schema::table('page_product', function(Blueprint $table) {
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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

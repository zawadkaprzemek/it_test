<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('domain_id')->unigned();
            $table->string('type');
            $table->string('status');
            $table->text('note');
            $table->timestamps();

            $table->foreign('domain_id')->references('id')->on('domain');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('page');
    }
}

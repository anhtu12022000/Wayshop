<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateAndProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image', 500);
            $table->string('description', 250);
            $table->integer('price')->unsigned();
            $table->integer('sale')->unsigned();
            $table->string('detail', 5000);
            $table->integer('quantity')->unsigned();
            $table->string('imageDetail', 500)->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('slide_id')->nullable();
            $table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade');
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('cate')->onDelete('cascade');
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
        Schema::dropIfExists('cate');
        Schema::dropIfExists('products');
    }
}
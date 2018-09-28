<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goodsName');
            $table->string('goodsImg');
            $table->string('marketPrice');
            $table->string('shopPrice');
            $table->integer('goodsStock');
            $table->integer('saleCount');
            $table->string('goodsUnit');
            $table->string('goodsDesc');
            $table->integer('goodsCatId');
            $table->tinyInteger('isSale');
            $table->tinyInteger('goodsStatus');
            $table->tinyInteger('goodsFlag');
            $table->integer('commission');
            $table->dateTime('saleTime');
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
        Schema::dropIfExists('goods');
    }
}

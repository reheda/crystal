<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('seo_title')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->string('image')->nullable();
            $table->text('image_slider')->nullable();
            $table->text('video')->nullable();
            $table->string('slug')->unique();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords');

            $table->string('address')->nullable(); //адрес
            $table->integer('district_id')->unsigned()->nullable(); //район
            $table->integer('floor')->nullable(); //этаж
            $table->integer('max_floor')->nullable(); //этажность
            $table->integer('total_area')->nullable(); //общая площадь
            $table->integer('residential_area')->nullable(); //жилая площадь
            $table->integer('kitchen_area')->nullable(); //площадь кухни
            $table->integer('rooms')->nullable(); //комнаты
            $table->integer('bathrooms')->nullable(); //санузлы
            $table->integer('parking')->nullable(); //парковки
            $table->integer('balconies')->nullable(); //балконы
            $table->integer('construction_year')->nullable(); //год постройки
            $table->integer('wall_type_id')->unsigned()->nullable(); //тип стен
            $table->integer('price')->nullable(); //цена
            $table->integer('currency_id')->unsigned(); //валюта

            $table->integer('views')->unsigned()->default(0);
            $table->boolean('exported')->default(false);
            $table->boolean('published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('delivered')->default(0);
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

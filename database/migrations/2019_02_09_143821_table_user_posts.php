<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUserPosts extends Migration
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
            $table->string('post_title');
            $table->string('post_description');
            $table->text('post_content');
            $table->integer('price')->default(0);
            $table->integer('price_org')->default(0);
            $table->integer('quantity')->default(1);
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });

        Schema::create('post_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name')->default('');
            $table->string('category_title')->default('');
            $table->text('category_content');
            $table->string('seo_title');
            $table->string('seo_description');
            $table->string('seo_keywords');
            $table->integer('created_by')->default(0);
            $table->timestamps();
        });

        //Using when define multi category
        Schema::create('cat_to_cats', function (Blueprint $table) {
            $table->integer('parent');
            $table->integer('child');
            $table->integer('depth')->default(0);
        });

        Schema::create('post_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->default(0);
            $table->integer('info_id')->default(0);//info defined in config file
            $table->integer('info_value')->default(0);//info defined in config file
            $table->text('data');//input anything here
            $table->integer('price')->default(0);
            $table->timestamps();
        });

        Schema::create('post_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->default(0);
            $table->string('title')->default('');
            $table->string('img')->default('');
            $table->string('data1')->default('');
            $table->string('data2')->default('');
            $table->string('data3')->default('');
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categorys');
        Schema::dropIfExists('cat_to_cats');
        Schema::dropIfExists('post_datas');
        Schema::dropIfExists('post_images');
    }
}

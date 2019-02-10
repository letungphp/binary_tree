<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUserBuy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_buy_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('package_id');
            $table->date('expired_at')->null();
            $table->integer('price');
            $table->integer('price_org');
            $table->integer('is_active')->default(0);
            $table->timestamps();
        });

        Schema::create('user_buy_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->date('expired_at')->null();
            $table->integer('price');
            $table->integer('price_org');
            $table->integer('is_active')->default(0);
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
        Schema::dropIfExists('user_buys');
    }
}

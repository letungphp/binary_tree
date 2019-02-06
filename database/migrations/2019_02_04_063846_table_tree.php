<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent');
            $table->integer('child');
            $table->timestamps();
        });

        Schema::create('binary_trees', function (Blueprint $table1) {
            $table1->increments('id');
            $table1->integer('parent');
            $table1->integer('child');
            $table1->text('path_to_parent');
            $table1->text('path_to_me');
            $table1->integer('depth_to_me');
            $table1->string('direction',1)->default('l');
            $table1->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trees');
        Schema::dropIfExists('binary_trees');
    }
}

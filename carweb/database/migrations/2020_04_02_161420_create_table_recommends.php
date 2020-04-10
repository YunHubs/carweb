<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRecommends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommends', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('imgurl');
            $table->string('detail');
            $table->string('gift_title');
            $table->boolean('is_hot');
            $table->boolean('is_show');
            $table->boolean('is_delete');
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
        Schema::dropIfExists('recommends');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id')->primary;
            $table->string('user_id');
            $table->string('category');
            $table->string('title');
            $table->string('meta_title');
            $table->string('slug');
            $table->longText('description');
            $table->string('show_homepage');
            $table->dateTime('published_date');
            $table->string('seo_title');
            $table->longText('seo_description');
            $table->string('thumbnail_img');
            $table->string('banner_img');
            $table->string('status');
            $table->softDeletes();
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
        Schema::dropIfExists('blogs');
    }
};

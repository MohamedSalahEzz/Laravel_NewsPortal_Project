<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('subdistrict_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('image');
            $table->text('details_en')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('tags_en')->nullable();
            $table->text('tags_ar')->nullable();
            $table->integer('headline')->nullable();
            $table->integer('bigthumbnail')->nullable();
            $table->integer('first_section')->nullable();
            $table->integer('first_section_thumbnail')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
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
    }
}

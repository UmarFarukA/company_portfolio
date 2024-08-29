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
            $table->uuid('id')->unique();
            $table->string('blog_title');
            $table->string('blog_description');
            $table->text('blog_content');
            $table->string('blog_image');
            // $table->uuid('categories_id');
            // $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreignId('categories_id')->constrained()->on('categories')->onUpdate('cascade')->onDelete('cascade');
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

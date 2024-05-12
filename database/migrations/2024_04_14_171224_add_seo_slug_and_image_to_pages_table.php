<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoSlugAndImageToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable(); // Path to the image file
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_description', 'slug', 'featured_image']);
        });
    }
}

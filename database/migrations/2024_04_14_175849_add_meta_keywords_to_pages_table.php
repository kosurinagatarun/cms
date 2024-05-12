<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMetaKeywordsToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            // Adding a JSON type field for meta_keywords
            $table->json('meta_keywords')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('meta_keywords');
        });
    }
}


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPagesTable extends Migration
{
    public function up()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('status')->default('draft'); // Default status is 'draft'
        });
    }

    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}


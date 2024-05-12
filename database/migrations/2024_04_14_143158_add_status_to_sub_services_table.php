<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToSubServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_services', function (Blueprint $table) {
            $table->string('status', 20)->default('active')->after('description'); // Adds a 'status' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_services', function (Blueprint $table) {
            $table->dropColumn('status'); // Removes the 'status' column if rolled back
        });
    }
}

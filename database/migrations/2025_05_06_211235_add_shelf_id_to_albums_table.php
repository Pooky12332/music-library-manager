<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShelfIdToAlbumsTable extends Migration
{
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            // Add a shelf_id column to the albums table
            $table->unsignedBigInteger('shelf_id')->nullable();

            // Create a foreign key constraint to shelves table
            $table->foreign('shelf_id')->references('id')->on('shelves')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            // Remove the foreign key and column
            $table->dropForeign(['shelf_id']);
            $table->dropColumn('shelf_id');
        });
    }
}
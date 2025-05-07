<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeReleaseYearNullableInAlbumsTable extends Migration
{
    public function up()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->integer('release_year')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('albums', function (Blueprint $table) {
            $table->integer('release_year')->nullable(false)->change();
        });
    }
}

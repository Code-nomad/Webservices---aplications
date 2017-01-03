<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIDToBestelling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bestelling', function (Blueprint $table) {
            $table->integer('u_id');
            $table->integer('d_id');
            $table->integer('fullfiledby');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bestelling', function (Blueprint $table) {
            //
        });
    }
}

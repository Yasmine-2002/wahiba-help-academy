<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('subjects', function (Blueprint $table) {
        $table->unsignedBigInteger('level_id')->after('name');
        $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
    });
}

    public function down()
{
    Schema::table('subjects', function (Blueprint $table) {
        $table->dropForeign(['level_id']);
        $table->dropColumn('level_id');
    });
}
}

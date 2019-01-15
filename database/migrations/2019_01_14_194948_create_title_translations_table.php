<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitleTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('lang_id')->unsigned();
            $table->integer('translatable_id');
            $table->string('translatable_type');
            $table->timestamps();
        });

        // Schema::table('title_translations', function (Blueprint $table) {
        //     $table->foreign('lang_id')
        //         ->references('id')->on('languages')
        //         ->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_translations');
    }
}

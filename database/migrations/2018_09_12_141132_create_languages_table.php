<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('language');
            $table->string('iso_code');
            $table->unsignedInteger('country_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->index('language');
            $table->index('iso_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}

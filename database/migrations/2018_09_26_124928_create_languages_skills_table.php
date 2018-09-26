<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('languages_id')->nullable();
            $table->string('speaking');
            $table->string('writing');
            $table->string('understanding');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('languages_id')
            ->references('id')->on('languages')
            ->onUpdate('cascade')
            ->onDelete('restrict');          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages_skills');
    }
}

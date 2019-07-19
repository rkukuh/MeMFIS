<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEOInstructionSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eo_instruction_skill', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('eo_instruction_id');
            $table->unsignedBigInteger('skill_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('eo_instruction_id')
                    ->references('id')->on('eo_instructions')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('skill_id')
                    ->references('id')->on('types')
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
        Schema::dropIfExists('eo_instruction_skill');
    }
}

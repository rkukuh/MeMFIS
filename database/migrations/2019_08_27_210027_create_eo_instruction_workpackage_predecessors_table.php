<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEOInstructionWorkPackagePredecessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eo_instruction_workpackage_predecessors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('eo_instruction_workpackage_id');
            $table->unsignedBigInteger('previous');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('eo_instruction_workpackage_id', 'eo_instruction_predecessor')
                    ->references('id')->on('eo_instruction_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');


            $table->foreign('previous')
                    ->references('id')->on('taskcards')
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
        Schema::dropIfExists('eo_instruction_workpackage_predecessors');
    }
}

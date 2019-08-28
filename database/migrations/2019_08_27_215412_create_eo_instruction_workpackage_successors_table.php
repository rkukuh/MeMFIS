<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEOInstructionWorkPackageSuccessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eo_instruction_workpackage_successors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('eo_instruction_workpackage_id');
            $table->unsignedBigInteger('next');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('eo_instruction_workpackage_id', 'eo_instruction_successor')
                    ->references('id')->on('eo_instruction_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');


            $table->foreign('next')
                    ->references('id')->on('eo_instructions')
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
        Schema::dropIfExists('eo_instruction_workpackage_successors');
    }
}

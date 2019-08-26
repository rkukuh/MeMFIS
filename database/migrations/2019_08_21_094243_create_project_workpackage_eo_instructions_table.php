<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectWorkPackageEOInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_workpackage_eo_instructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('project_workpackage_id');
            $table->unsignedBigInteger('eo_instruction_id');
            $table->integer('sequence')->nullable();
            $table->boolean('is_rii')->nullable();
            $table->boolean('is_mandatory')->default(false);
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_workpackage_id', 'prj_wp_eo_ins_project_workpackage_id')
                    ->references('id')->on('project_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('eo_instruction_id')
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
        Schema::dropIfExists('project_workpackage_eo_instructions');
    }
}

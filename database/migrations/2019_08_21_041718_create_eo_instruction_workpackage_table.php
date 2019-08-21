<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEOInstructionWorkPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eo_instruction_workpackage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('eo_instruction_id');
            $table->unsignedBigInteger('workpackage_id');
            $table->integer('sequence')->nullable();
            $table->boolean('is_mandatory')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('eo_instruction_id')
                    ->references('id')->on('eo_instructions')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('workpackage_id')
                    ->references('id')->on('workpackages')
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
        Schema::dropIfExists('eo_instruction_workpackage');
    }
}

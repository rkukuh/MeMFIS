<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefectcardProposeCorrectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectcard_propose_correction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('defectcard_id');
            $table->unsignedBigInteger('propose_correction_id');
            $table->string('propose_correction_text')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('defectcard_id')
                    ->references('id')->on('defectcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('propose_correction_id')
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
        Schema::dropIfExists('defectcard_propose_correction');
    }
}

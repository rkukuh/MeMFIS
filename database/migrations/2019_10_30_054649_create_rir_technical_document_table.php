<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRirTechnicalDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rir_technical_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rir_id')->nullable();
            $table->unsignedBigInteger('technical_document')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rir_id')
                ->references('id')->on('rir')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('technical_document')
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
        Schema::dropIfExists('rir_document_checks');
    }
}

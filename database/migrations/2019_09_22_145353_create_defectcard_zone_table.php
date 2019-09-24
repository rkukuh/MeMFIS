<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefectcardZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectcard_zone', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('defectcard_id');
            $table->unsignedBigInteger('zone_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('defectcard_id')
                    ->references('id')->on('defectcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('zone_id')
                    ->references('id')->on('zones')
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
        Schema::dropIfExists('defectcard_zone');
    }
}

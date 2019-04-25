<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationTaskcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_taskcard', function (Blueprint $table) {
            $table->unsignedInteger('taskcard_id');
            $table->unsignedInteger('station_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('station_id')
                    ->references('id')->on('stations')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('taskcard_id')
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
        Schema::dropIfExists('station_taskcard');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessTaskcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_taskcard', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('taskcard_id');
            $table->unsignedInteger('access_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('access_id')
                    ->references('id')->on('accesses')
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
        Schema::dropIfExists('access_taskcard');
    }
}

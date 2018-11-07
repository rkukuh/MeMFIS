<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTaskcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_taskcard', function (Blueprint $table) {
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('taskcard_id');
            $table->timestamps();

            $table->foreign('item_id')
                    ->references('id')->on('items')
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
        Schema::dropIfExists('item_taskcard');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefectcardItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectcard_item', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('defectcard_id');
            $table->unsignedInteger('item_id');
            $table->integer('quantity');
            $table->unsignedInteger('unit_id');
            $table->string('ipc_ref');
            $table->string('sn_on');
            $table->string('sn_off');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('defectcard_id')
                    ->references('id')->on('defectcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('unit_id')
                    ->references('id')->on('units')
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
        Schema::dropIfExists('defectcard_item');
    }
}

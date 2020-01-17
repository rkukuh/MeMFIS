<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGseItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gse_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('gse_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('serial_number')->nullable();
            $table->double('quantity');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gse_id')
                    ->references('id')->on('gse')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('item_id')
                    ->references('id')->on('items')
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
        Schema::dropIfExists('gse_item');
    }
}

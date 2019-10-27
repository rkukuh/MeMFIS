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
            $table->timestamps();
            $table->softDeletes();

            // TODO: General error: 1215 Cannot add foreign key constraint
            // $table->foreign('gse_id')
            //         ->references('id')->on('gse')
            //         ->onUpdate('cascade')
            //         ->onDelete('restrict');

            $table->foreign('item_id')
                    ->references('id')->on('items')
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

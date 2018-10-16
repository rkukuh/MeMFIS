<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_unit', function (Blueprint $table) {
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('unit1_id');
            $table->double('quantity1', 8, 2);
            $table->unsignedInteger('unit2_id');
            $table->double('quantity2', 8, 2);
            $table->timestamps();

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
        Schema::dropIfExists('item_unit');
    }
}

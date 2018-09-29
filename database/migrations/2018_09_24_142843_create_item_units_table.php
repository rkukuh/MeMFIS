<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_units', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code',50);
            $table->unsignedInteger('unit_id')->nullable();
            $table->integer('active');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('item_units');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFefoOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fefo_out', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('fefo_in_id');
            $table->timestamp('fefo_out_at');
            $table->double('quantity');
            $table->string('serial_no')->nullable();
            // refno inv out tapi kedepan bisa banyak
            // polymorp book item untuk project atau jobcard khusus
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('storage_id')
                    ->references('id')->on('storages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('fefo_in_id')
                    ->references('id')->on('fefo_in')
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
        Schema::dropIfExists('fefo_out');
    }
}

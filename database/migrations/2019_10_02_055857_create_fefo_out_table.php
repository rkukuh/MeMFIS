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
            $table->unsignedBigInteger('fefoin_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('inventoryout_id'); //?
            $table->timestamp('fefoout_at');
            $table->double('quantity');
            $table->double('used_quantity')->default(0);;
            $table->string('serial_number')->nullable();
            $table->unsignedBigInteger('grn_id');
            $table->double('price')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fefoin_id')
                    ->references('id')->on('fefo_in')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('storage_id')
                    ->references('id')->on('storages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('inventoryout_id')
                    ->references('id')->on('inventory_in')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('grn_id')
                    ->references('id')->on('goods_received')
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

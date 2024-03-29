<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsReceivedItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_received_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('goods_received_id');
            $table->unsignedBigInteger('item_id');
            $table->string('serial_number')->nullable();
            $table->double('quantity');
            $table->double('quantity_unit');
            $table->unsignedBigInteger('unit_id');
            $table->double('price')->nullable();;
            $table->string('location')->nullable();;
            $table->string('note')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('goods_received_id')
                    ->references('id')->on('goods_received')
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
        Schema::dropIfExists('goods_received_item');
    }
}

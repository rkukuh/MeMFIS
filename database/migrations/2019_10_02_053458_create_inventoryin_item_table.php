<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryinItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventoryin_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inventoryin_id');
            $table->unsignedBigInteger('item_id');
            $table->string('serial_number')->nullable();
            $table->double('quantity');
            $table->double('quantity_in_primary_unit');
            $table->unsignedBigInteger('unit_id');
            $table->double('purchased_price')->nullable();
            $table->double('total')->nullable()
            ;
            $table->string('description')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('inventoryin_id')
                    ->references('id')->on('inventory_in')
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
        Schema::dropIfExists('inventoryin_item');
    }
}

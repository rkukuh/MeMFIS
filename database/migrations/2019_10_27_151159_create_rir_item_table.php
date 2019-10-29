<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRirItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rir_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rir_id');
            $table->unsignedBigInteger('item_id');
            $table->string('serial_number')->nullable();
            $table->double('quantity');
            $table->double('quantity_unit');
            $table->unsignedBigInteger('unit_id');
            $table->double('price')->nullable();;
            $table->double('already_received_amount')->nullable();;
            $table->string('note')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rir_id')
                    ->references('id')->on('rir')
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
        Schema::dropIfExists('rir_item');
    }
}

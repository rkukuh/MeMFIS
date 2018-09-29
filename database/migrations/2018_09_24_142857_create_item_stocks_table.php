<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code',50);
            $table->unsignedInteger('warehouse_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('warehouse_id')
            ->references('id')->on('warehouses')
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
        Schema::dropIfExists('item_stocks');
    }
}

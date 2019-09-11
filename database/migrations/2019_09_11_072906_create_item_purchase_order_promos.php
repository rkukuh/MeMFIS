<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemPurchaseOrderPromos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_purchase_order_promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('item_purchase_order_id');
            $table->unsignedBigInteger('promo_id');
            $table->double('amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_purchase_order_id')
                    ->references('id')->on('item_purchase_order')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('promo_id')
                    ->references('id')->on('promos')
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
        Schema::dropIfExists('item_purchase_order_promos');
    }
}

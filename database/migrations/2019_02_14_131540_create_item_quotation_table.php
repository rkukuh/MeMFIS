<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_quotation', function (Blueprint $table) {
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('quotation_id');
            $table->unsignedInteger('taskcard_id');
            $table->unsignedInteger('pricelist_unit');
            $table->double('pricelist_price');
            $table->double('subtotal');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('quotation_id')
                    ->references('id')->on('quotations')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('taskcard_id')
                    ->references('id')->on('taskcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('pricelist_unit')
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
        Schema::dropIfExists('item_quotation');
    }
}
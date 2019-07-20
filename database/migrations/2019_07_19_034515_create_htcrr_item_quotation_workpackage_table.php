<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtcrrItemQuotationWorkpackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htcrr_item_quotation_workpackage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('quotation_id')->nullable();
            $table->unsignedBigInteger('workpackage_id')->nullable();
            $table->unsignedBigInteger('htcrr_id')->nullable();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->double('quantity');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            $table->double('price_amount')->nullable();
            $table->double('subtotal')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quotation_id')
                ->references('id')->on('quotations')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('workpackage_id')
                ->references('id')->on('workpackages')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('htcrr_id')
                ->references('id')->on('htcrr')
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

            $table->foreign('price_id')
                ->references('id')->on('prices')
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
        Schema::dropIfExists('htcrr_item_quotation_workpackage');
    }
}

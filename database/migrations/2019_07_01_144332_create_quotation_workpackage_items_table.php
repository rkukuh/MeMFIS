<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationWorkpackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_workpackage_items', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('quotation_workpackage_id');
            $table->unsignedInteger('item_id');
            $table->double('quantity');
            $table->unsignedInteger('unit_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quotation_workpackage_id')
                    ->references('id')->on('quotation_workpackage')
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
        Schema::dropIfExists('quotation_workpackage_items');
    }
}

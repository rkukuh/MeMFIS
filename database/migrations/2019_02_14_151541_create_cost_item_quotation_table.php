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
        Schema::create('cost_item_quotation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_quotation_id');
            $table->unsignedBigInteger('type_id');
            $table->double('tat')->nullable();
            $table->unsignedDecimal('performance_factor', 8, 2)->nullable();
            $table->double('manhour_total')->nullable();
            $table->unsignedDecimal('total_manhours_with_performance_factor', 8, 2)->nullable();
            $table->unsignedBigInteger('manhour_rate_id')->nullable();
            $table->double('manhour_rate_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('item_quotation_id')
            //         ->references('id')->on('item_quotation')
            //         ->onUpdate('cascade')
            //         ->onDelete('restrict');

            $table->foreign('type_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('manhour_rate_id')
                    ->references('id')->on('manhours')
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

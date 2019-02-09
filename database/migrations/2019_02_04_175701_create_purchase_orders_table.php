<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->timestamp('ordered_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->timestamp('ship_at')->nullable();
            $table->double('exchange_rate');
            $table->double('total_before_tax');
            $table->double('tax_amount');
            $table->double('total_after_tax');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('purchase_request_id');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('purchase_request_id')
                    ->references('id')->on('purchase_requests')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_orders');
    }
}

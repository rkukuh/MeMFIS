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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number')->nullable();
            $table->unsignedBigInteger('purchase_request_id');
            $table->unsignedBigInteger('vendor_id');
            $table->timestamp('ordered_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->timestamp('valid_at')->nullable();
            $table->text('shipping_address');
            $table->timestamp('ship_at')->nullable();
            $table->unsignedBigInteger('currency_id');
            $table->double('exchange_rate')->nullable();
            $table->double('subtotal')->nullable();
            $table->double('total_before_tax')->nullable();
            $table->double('total_after_tax')->nullable();
            $table->unsignedBigInteger('top_type');
            $table->integer('top_day_amount')->nullable();
            $table->timestamp('top_start_at')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('vendor_id')
                    ->references('id')->on('vendors')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('purchase_request_id')
                    ->references('id')->on('purchase_requests')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('currency_id')
                    ->references('id')->on('currencies')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('top_type')
                    ->references('id')->on('types')
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

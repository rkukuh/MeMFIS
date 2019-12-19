<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseRequestServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_request_service', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('purchase_request_id');
            $table->unsignedBigInteger('service_id');
            $table->double('quantity_requirement')->nullable();
            $table->double('quantity');
            $table->double('quantity_unit');
            $table->unsignedBigInteger('unit_id');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('purchase_request_id')
                    ->references('id')->on('purchase_requests')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('service_id')
                    ->references('id')->on('services')
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
        Schema::dropIfExists('purchaserequestservices');
    }
}

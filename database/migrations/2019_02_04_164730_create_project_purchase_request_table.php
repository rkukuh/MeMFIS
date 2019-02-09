<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPurchaseRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_purchase_request', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('purchase_request_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('purchase_request_id')
                    ->references('id')->on('purchase_requests')
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
        Schema::dropIfExists('project_purchase_request');
    }
}

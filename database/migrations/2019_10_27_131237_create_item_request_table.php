<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_request', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('request_id');
            $table->unsignedBigInteger('item_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('request_id')
                    ->references('id')->on('requests')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('item_id')
                    ->references('id')->on('items')
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
        Schema::dropIfExists('item_request');
    }
}

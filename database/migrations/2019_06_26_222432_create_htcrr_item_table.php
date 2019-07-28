<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtcrrItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htcrr_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('htcrr_id');
            $table->unsignedBigInteger('item_id');
            $table->double('quantity');
            $table->unsignedBigInteger('unit_id');
            $table->string('note')->nullable();

            $table->json('origin_htcrr')->nullable();
            $table->json('origin_item')->nullable();
            $table->json('origin_unit')->nullable();
            $table->json('origin_project')->nullable();
            $table->json('origin_htcrr_items')->nullable();
            $table->json('origin_htcrr_skills')->nullable();
            $table->json('origin_htcrr_helpers')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htcrr_item');
    }
}

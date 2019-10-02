<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFefoInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fefo_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('storage_id');
            $table->timestamp('fefo_in_at');
            $table->double('quantity');
            $table->double('used_quantity')->default(0);;
            $table->string('serial_no')->nullable();
            $table->timestamp('expired_at');
            // refno inv in tapi kedepan bisa banyak
            // polymorp book item untuk project atau jobcard khusus
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('storage_id')
                    ->references('id')->on('storages')
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
        Schema::dropIfExists('fefo_in');
    }
}

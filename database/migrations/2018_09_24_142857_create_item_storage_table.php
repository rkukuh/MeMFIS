<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStorageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_storage', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('storage_id')->nullable();
            $table->double('min', 8, 2);
            $table->double('max', 8, 2);
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
        Schema::dropIfExists('item_storage');
    }
}

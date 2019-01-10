<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTaskcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_taskcard', function (Blueprint $table) {
            $table->morphs('taskcardable');
            $table->unsignedInteger('item_id');
            $table->double('quantity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            // TODO: Untuk mengakomodir kebutuhan tabel taskcard_eo's required tools, tabel ini harus jadi polymorph
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_taskcard');
    }
}

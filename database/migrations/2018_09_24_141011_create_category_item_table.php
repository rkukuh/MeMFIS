<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_item', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('item_id');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
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
        Schema::dropIfExists('category_item');
    }
}

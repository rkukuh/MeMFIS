<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code');
            $table->string('name');
            $table->string('barcode');
            $table->unsignedInteger('category_id')->nullable();
            $table->text('description');
            $table->integer('active');
            $table->integer('isppn');
            $table->integer('istock');
            $table->unsignedInteger('account_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('account_code')
                  ->references('id')->on('journals')
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
        Schema::dropIfExists('items');
    }
}

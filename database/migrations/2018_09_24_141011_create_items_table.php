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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->string('barcode')->nullable();
            $table->boolean('is_ppn')->nullable();
            $table->integer('ppn_amount')->nullable();
            $table->boolean('is_stock')->nullable();
            $table->unsignedBigInteger('account_code')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_code')
                    ->references('id')->on('journals')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('manufacturer_id')
                    ->references('id')->on('manufacturers')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('unit_id')
                    ->references('id')->on('units')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('code');
            $table->index('name');
            $table->index('barcode');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('storage_id');
            $table->timestamp('inventoried_at');
            $table->text('description');
            $table->morphs('inventoryinable');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('branch_id')
                ->references('id')->on('branches')
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
        Schema::dropIfExists('inventory_in');
    }
}

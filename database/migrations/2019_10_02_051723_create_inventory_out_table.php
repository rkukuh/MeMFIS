<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_out', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->unsignedBigInteger('storage_id');
            $table->timestamp('inventoried_at');
            $table->nullableMorphs('inventoryoutable');
            $table->unsignedBigInteger('received_by');
            $table->json('additional')->nullable();
            $table->string('section')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('storage_id')
                ->references('id')->on('storages')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('received_by')
                ->references('id')->on('employees')
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
        Schema::dropIfExists('inventory_out');
    }
}

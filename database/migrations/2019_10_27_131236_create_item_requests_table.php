<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->unsignedBigInteger('type_id');
            $table->nullableMorphs('requestable');
            $table->timestamp('requested_at');
            $table->unsignedBigInteger('storage_id');
            $table->unsignedBigInteger('received_by');
            $table->string('section')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

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
        Schema::dropIfExists('item_requests');
    }
}

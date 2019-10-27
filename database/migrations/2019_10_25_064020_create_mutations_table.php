<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->unsignedBigInteger('storage_out');
            $table->unsignedBigInteger('storage_in');
            $table->timestamp('mutated_at');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('storage_out')
                    ->references('id')->on('storages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                
            $table->foreign('storage_in')
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
        Schema::dropIfExists('mutations');
    }
}

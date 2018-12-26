<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('threshold_type');
            $table->integer('threshold_amount');
            $table->unsignedInteger('repeat_type');
            $table->integer('repeat_amount');
            $table->string('maintenance_cycleable_type');
            $table->unsignedInteger('maintenance_cycleable_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('threshold_type')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('repeat_type')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index([
                'maintenance_cycleable_type',
                'maintenance_cycleable_id'
            ], 'maintenance_cycleables_morphs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_cycles');
    }
}

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
            $table->unsignedInteger('maintenance_cycleable_id');
            $table->string('maintenance_cycleable_type');
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

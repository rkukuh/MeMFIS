<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('project_id');
            $table->unsignedDecimal('aircraft_total_time', 8, 2)->nullable();
            $table->text('work_performed')->nullable();
            $table->text('work_data')->nullable();
            $table->text('exception')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')
                    ->references('id')->on('projects')
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
        Schema::dropIfExists('rtss');
    }
}

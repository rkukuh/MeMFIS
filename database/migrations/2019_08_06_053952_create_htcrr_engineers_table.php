<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtcrrEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htcrr_engineers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('htcrr_id');
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('htcrr_id')
                    ->references('id')->on('htcrr')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('skill_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('employee_id')
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
        Schema::dropIfExists('htcrr_engineers');
    }
}

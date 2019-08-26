<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeProvisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_provisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->bigInteger('maximum_overtime');
            $table->bigInteger('minimum_overtime');
            $table->bigInteger('holiday_overtime');
            $table->bigInteger('pph');
            $table->bigInteger('late_tolerance');
            $table->bigInteger('late_punishment');
            $table->bigInteger('absence_punishment');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
            ->references('id')->on('employe')
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
        Schema::dropIfExists('employee_provisions');
    }
}

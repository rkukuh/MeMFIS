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
            $table->bigInteger('maximum_overtime')->nullable();
            $table->bigInteger('minimum_overtime')->nullable();
            $table->bigInteger('holiday_overtime')->nullable();
            $table->string('pph')->nullable();
            $table->bigInteger('late_tolerance')->nullable();
            $table->bigInteger('late_punishment')->nullable();
            $table->bigInteger('absence_punishment')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('employee_provisions');
    }
}

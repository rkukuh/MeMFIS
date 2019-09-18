<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeAttendances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('employee_id');
            $table->date('date');
            $table->time('in')->nullable();
            $table->time('out')->nullable();
            $table->bigInteger('late_in')->nullable();
            $table->bigInteger('earlier_out')->nullable();
            $table->bigInteger('overtime')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('employee_attendances');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->date('date');
            $table->time('in');
            $table->time('out');
            $table->bigInteger('late_in')->nullable();
            $table->bigInteger('earlier_out')->nullable();
            $table->bigInteger('overtime')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                    ->references('id')->on('attendances')
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
        Schema::dropIfExists('attendances');
    }
}

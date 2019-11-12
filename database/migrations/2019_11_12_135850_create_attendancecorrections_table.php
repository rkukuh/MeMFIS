<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancecorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendancecorrections', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('employee_id');
            $table->date('correction_date');
            $table->time('correction_time');
            $table->unsignedBigInteger('type_id')->nullable(); //correctin time type
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
            ->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('type_id')
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
        Schema::dropIfExists('attendancecorrections');
    }
}

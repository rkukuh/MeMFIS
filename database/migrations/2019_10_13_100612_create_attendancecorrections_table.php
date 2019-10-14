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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('employee_id')->index();
            $table->unsignedBigInteger('statuses_id')->index();
            $table->date("date");
            $table->time('time');
            $table->text('desc');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
            ->references('id')->on('employee_attendances')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('statuses_id')
            ->references('id')->on('statuses')
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

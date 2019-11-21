<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('employee_id')->index();
            $table->unsignedBigInteger('status_id')->index();
            $table->unsignedBigInteger('attendance_id')->nullable();
            $table->unsignedBigInteger('type_id')->nullable(); //correctin time type
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
            ->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('status_id')
            ->references('id')->on('statuses')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('attendance_id')
            ->references('id')->on('employee_attendances')
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
        Schema::dropIfExists('leaves');
    }
}

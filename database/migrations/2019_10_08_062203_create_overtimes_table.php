<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('employee_id')->index();
            // $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->unsignedBigInteger('statuses_id')->index();
            $table->date("date");
            $table->time('start');
            $table->time('end');
            $table->time("total");
            $table->text('desc');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
            ->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            // $table->foreign('approved_by_id')
            // ->references('id')->on('employees')
            // ->onUpdate('cascade')
            // ->onDelete('restrict');

            $table->foreign('status_id')
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
        Schema::dropIfExists('overtimes');
    }
}

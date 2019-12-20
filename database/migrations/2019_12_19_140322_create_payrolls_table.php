<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->date('start_period');
            $table->date('end_period');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->unsignedBigInteger('conducted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')
                ->references('id')->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('employee_id')
                ->references('id')->on('employees')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('conducted_by')
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
        Schema::dropIfExists('payrolls');
    }
}

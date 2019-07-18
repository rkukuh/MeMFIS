<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeJobcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_jobcard', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobcard_id');
            $table->unsignedBigInteger('employee_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jobcard_id')
                    ->references('id')->on('jobcards')
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
        Schema::dropIfExists('employee_jobcard');
    }
}

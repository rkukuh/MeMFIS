<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefectcardEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectcard_employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('defectcard_id');
            $table->unsignedBigInteger('employee_id');            
            $table->string('additionals')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('defectcard_id')
                    ->references('id')->on('defectcards')
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
        Schema::dropIfExists('defectcard_employee');
    }
}

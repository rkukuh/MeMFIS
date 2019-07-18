<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeNationalityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_nationality', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('nationality_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('nationality_id')
                    ->references('id')->on('nationalities')
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
        Schema::dropIfExists('employee_nationality');
    }
}

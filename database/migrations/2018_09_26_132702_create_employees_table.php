<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_number',10);
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->unsignedInteger('nationality_id')->nullable();
            $table->date('date_of_birth');
            $table->char('gender',1);
            $table->unsignedInteger('job_title_id')->nullable();
            $table->unsignedInteger('employment_status_id')->nullable();
            $table->unsignedInteger('pay_grade_id')->nullable();
            $table->string('address');
            $table->unsignedInteger('city_id')->nullable();
            $table->date('joined_date');
            $table->date('termination_date');
            $table->unsignedInteger('department_id')->nullable();
            $table->string('descriptions')->nullabke();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('nationality_id')
            ->references('id')->on('nationalities')
            ->onUpdate('cascade')
            ->onDelete('restrict');          
            $table->foreign('job_title_id')
            ->references('id')->on('job_titles')
            ->onUpdate('cascade')
            ->onDelete('restrict');          
            $table->foreign('employment_status_id')
            ->references('id')->on('employment_statuses')
            ->onUpdate('cascade')
            ->onDelete('restrict');          
            $table->foreign('pay_grade_id')
            ->references('id')->on('pay_grades')
            ->onUpdate('cascade')
            ->onDelete('restrict');          
            $table->foreign('city_id')
            ->references('id')->on('cities')
            ->onUpdate('cascade')
            ->onDelete('restrict');          
            $table->foreign('department_id')
            ->references('id')->on('departments')
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
        Schema::dropIfExists('employees');
    }
}

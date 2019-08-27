<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->string('code');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('dob_place')->nullable();
            $table->enum('gender', ['all','f', 'm']);
            $table->string('religion');
            $table->string('marital_status');
            $table->string('nationality');
            $table->string('country');
            $table->string('city');
            $table->string('zip')->nullable();
            $table->date('joined_date');
            $table->unsignedBigInteger('job_tittle_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('statuses_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('indirect_supervisor_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('first_name');
            $table->index('last_name');

            $table->foreign('employee_id')
            ->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('employee_histories');
    }
}

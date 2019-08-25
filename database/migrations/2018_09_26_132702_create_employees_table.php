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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
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

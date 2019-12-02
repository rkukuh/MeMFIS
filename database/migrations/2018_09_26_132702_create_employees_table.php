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
            $table->date('dob')->nullable();
            $table->string('dob_place')->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->unsignedBigInteger('marital_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->timestamp('joined_date');
            $table->unsignedBigInteger('job_tittle_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();
            $table->unsignedBigInteger('statuses_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('indirect_supervisor_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('gender_id')
                ->references('id')->on('types')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            
            $table->foreign('marital_id')
                ->references('id')->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('religion_id')
                ->references('id')->on('religions')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->index('code');
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

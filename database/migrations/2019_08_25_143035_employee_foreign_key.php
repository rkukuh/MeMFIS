<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function(Blueprint $table){
        $table->foreign('job_tittle_id')
                    ->references('id')->on('jobtittles')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('position_id')
                    ->references('id')->on('positions')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('statuses_id')
                    ->references('id')->on('statuses')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('department_id')
                    ->references('id')->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
                    
            $table->foreign('indirect_supervisor_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('supervisor_id')
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
        Schema::table('employees', function(Blueprint $table){
            $table->foreign('job_tittle_id');
            $table->foreign('position_id');
            $table->foreign('statuses_id');
            $table->foreign('department_id');
            $table->foreign('indirect_supervisor_id');
            $table->foreign('supervisor_id');
            });
    }
}

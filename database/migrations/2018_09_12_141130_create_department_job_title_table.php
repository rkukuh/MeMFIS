<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentJobTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_job_title', function (Blueprint $table) {
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('job_title_id');
            $table->timestamps();

            $table->foreign('department_id')
                    ->references('id')->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('job_title_id')
                    ->references('id')->on('job_titles')
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
        Schema::dropIfExists('department_job_title');
    }
}

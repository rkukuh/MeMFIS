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
        Schema::create('department_jobtitle', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('department_id');
            $table->unsignedInteger('jobtitle_id');
            $table->timestamps();

            $table->foreign('department_id')
                    ->references('id')->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('jobtitle_id')
                    ->references('id')->on('jobtitles')
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
        Schema::dropIfExists('department_jobtitle');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectWorkPackageEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_workpackage_engineers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('project_workpackage_id');
            $table->unsignedInteger('skill_id');
            $table->unsignedInteger('engineer_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_workpackage_id')
                    ->references('id')->on('project_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('skill_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('engineer_id')
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
        Schema::dropIfExists('project_workpackage_engineers');
    }
}

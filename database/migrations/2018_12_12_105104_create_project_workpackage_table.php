<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectWorkpackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_workpackage', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('workpackage_id');
            $table->unsignedDecimal('performance_factor', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('workpackage_id')
                    ->references('id')->on('workpackages')
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
        Schema::dropIfExists('project_workpackage');
    }
}

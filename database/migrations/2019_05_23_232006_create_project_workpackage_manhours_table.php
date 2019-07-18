<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectworkpackagemanhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_workpackage_manhours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('project_workpackage_id');
            $table->unsignedBigInteger('engineer_type_id');
            $table->integer('proportion_amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_workpackage_id')
                    ->references('id')->on('project_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('engineer_type_id')
                    ->references('id')->on('types')
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
        Schema::dropIfExists('projectworkpackagemanhours');
    }
}

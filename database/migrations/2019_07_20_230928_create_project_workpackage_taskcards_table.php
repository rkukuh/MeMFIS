<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectWorkPackageTaskCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_workpackage_taskcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('project_workpackage_id');
            $table->unsignedBigInteger('taskcard_id');
            $table->integer('sequence')->nullable();
            $table->boolean('is_mandatory')->default(false);
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_workpackage_id')
                    ->references('id')->on('project_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('taskcard_id')
                    ->references('id')->on('taskcards')
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
        Schema::dropIfExists('project_workpackage_taskcards');
    }
}

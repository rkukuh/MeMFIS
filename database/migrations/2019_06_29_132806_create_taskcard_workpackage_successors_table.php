<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskCardWorkPackageSuccessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskcard_workpackage_successors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('taskcard_workpackage_id');
            $table->unsignedBigInteger('next');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('taskcard_workpackage_id', 'taskcard_successor')
                    ->references('id')->on('taskcard_workpackage')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');


            $table->foreign('next')
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
        Schema::dropIfExists('taskcard_workpackage_successors');
    }
}

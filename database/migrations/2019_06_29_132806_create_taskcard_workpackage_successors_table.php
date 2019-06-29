<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskcardworkpackagesuccessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskcard_workpackage_successors', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('taskcard_workpackage_id');
            $table->unsignedInteger('next');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('taskcard_workpackage_id')
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

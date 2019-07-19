<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobcardSuccessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcard_successor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobcard_id');
            $table->unsignedBigInteger('next');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jobcard_id')
                    ->references('id')->on('jobcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('next')
                    ->references('id')->on('jobcards')
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
        Schema::dropIfExists('jobcard_successor');
    }
}

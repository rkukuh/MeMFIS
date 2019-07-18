<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobcardPredecessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcard_predecessor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jobcard_id');
            $table->unsignedBigInteger('previous');
            $table->integer('order');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jobcard_id')
                    ->references('id')->on('jobcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('previous')
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
        Schema::dropIfExists('jobcard_predecessor');
    }
}

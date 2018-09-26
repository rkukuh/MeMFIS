<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('qualification_id')->nullable();
            $table->string('institute');
            $table->date('start_date');
            $table->date('complate_on');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('qualification_id')
            ->references('id')->on('qualifications')
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
        Schema::dropIfExists('educations');
    }
}

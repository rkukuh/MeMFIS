<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('nationality');
            $table->unsignedBigInteger('country_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->index('nationality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationalities');
    }
}

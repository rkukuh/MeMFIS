<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_language', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('language_id');
            $table->string('reading_score')->nullable();
            $table->string('speaking_score')->nullable();
            $table->string('writing_score')->nullable();
            $table->string('understanding_score')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('language_id')
                    ->references('id')->on('languages')
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
        Schema::dropIfExists('employee_language');
    }
}

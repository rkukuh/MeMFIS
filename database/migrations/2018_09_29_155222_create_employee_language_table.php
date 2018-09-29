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
            $table->unsignedInteger('reading_level')->nullable();
            $table->unsignedInteger('speaking_level')->nullable();
            $table->unsignedInteger('writing_level')->nullable();
            $table->unsignedInteger('understanding_level')->nullable();
            $table->timestamps();

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('language_id')
                    ->references('id')->on('languages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('reading_level')
                  ->references('id')->on('types')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('speaking_level')
                  ->references('id')->on('types')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('writing_level')
                  ->references('id')->on('types')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('understanding_level')
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
        Schema::dropIfExists('employee_language');
    }
}

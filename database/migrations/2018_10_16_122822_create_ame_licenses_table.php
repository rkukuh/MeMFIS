<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmelicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ame_licenses', function (Blueprint $table) {
            $table->unsignedInteger('licensed_employee_id');
            $table->timestamps();

            $table->foreign('licensed_employee_id')
                    ->references('id')->on('employee_license')
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
        Schema::dropIfExists('ame_licenses');
    }
}

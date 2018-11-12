<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** The details of "Employee-License", for AME License */

        Schema::create('amels', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('employee_license_id');
            $table->unsignedInteger('amelable_id');
            $table->string('amelable_type');
            $table->timestamps();

            $table->foreign('employee_license_id')
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
        Schema::dropIfExists('amels');
    }
}

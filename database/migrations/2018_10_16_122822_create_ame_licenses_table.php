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
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('employee_license_id');
            $table->string('station');
            $table->string('stamp_no');
            // Scope        : Free text yg bisa di-master-kan
            // Category     : (Aviation Degree + Free text) --> master data AMEL's category
            // Rating       : AC + PartNo Komponen
            // Limitation   : Skills: Supporting Staff (Mechanic), Engineer, Inspector, RII Inspector
            // Remark       : Free text (optional)
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
        Schema::dropIfExists('ame_licenses');
    }
}

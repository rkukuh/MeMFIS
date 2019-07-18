<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** The details of "Employee-License", for General License */

        Schema::create('general_licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedBigInteger('employee_license_id');
            $table->unsignedBigInteger('aviation_degree');
            $table->string('aviation_degree_no');
            $table->string('exam_no')->nullable();
            $table->timestamp('exam_date')->nullable();
            $table->string('attendance_no')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_license_id')
                    ->references('id')->on('employee_license')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('aviation_degree')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('aviation_degree_no');
            $table->index('exam_no');
            $table->index('attendance_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general_licenses');
    }
}

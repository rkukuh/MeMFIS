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
        /** M-M: Employee and License, for General License */

        Schema::create('general_licenses', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('license_id');
            $table->string('code');
            $table->unsignedInteger('aviation_degree');
            $table->string('aviation_degree_code');
            $table->string('exam_no')->nullable();
            $table->timestamp('exam_date')->nullable();
            $table->string('attendance_no')->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('revoke_at')->nullable();

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('license_id')
                    ->references('id')->on('licenses')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('aviation_degree')
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
        Schema::dropIfExists('general_licenses');
    }
}

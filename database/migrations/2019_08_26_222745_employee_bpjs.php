<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeBpjs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_bpjs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('bpjs_id');
            $table->double('employee_paid')->nullable();
            $table->double('employee_min_value')->nullable();
            $table->double('employee_max_value')->nullable();
            $table->double('company_paid')->nullable();
            $table->double('company_min_value')->nullable();
            $table->double('company_max_value')->nullable();
            $table->dateTime('approved_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')
            ->references('id')->on('employees')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('bpjs_id')
            ->references('id')->on('bpjs')
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
        Schema::dropIfExists('employee_bpjs');
    }
}

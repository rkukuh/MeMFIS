<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('certification_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('number');
            $table->timestamp('issued_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('certification_id')
                    ->references('id')->on('certifications')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('employee_id')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certification_employee');
    }
}

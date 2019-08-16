<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpjssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->string('name');
            $table->double('employee_paid')->nullable();
            $table->double('employee_min_value')->nullable();
            $table->double('employee_max_value')->nullable();
            $table->double('company_paid')->nullable();
            $table->double('company_min_value')->nullable();
            $table->double('company_max_value')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('code');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpjs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['f', 'm'])->nullable();
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('first_name');
            $table->index('middle_name');
            $table->index('last_name');
            $table->index('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

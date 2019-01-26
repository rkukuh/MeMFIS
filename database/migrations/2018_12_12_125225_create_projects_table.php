<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code');
            $table->string('title');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('aircraft_id')->nullable();
            $table->string('no_wo');
            $table->string('aircraft_register');
            $table->string('aircraft_sn');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('aircraft_id')
                    ->references('id')->on('aircrafts')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('code');
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}

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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title');
            $table->string('no_wo');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('aircraft_id')->nullable();
            $table->string('aircraft_register');
            $table->string('aircraft_sn');
            $table->json('data_htcrr')->nullable();
            $table->json('origin_project')->nullable();
            $table->json('origin_project_workpackages')->nullable();
            $table->json('origin_project_workpackage_engineers')->nullable();
            $table->json('origin_project_workpackage_facilities')->nullable();
            $table->json('origin_project_workpackage_manhours')->nullable();
            $table->json('origin_project_workpackage_taskcards')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

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
            $table->index('no_wo');
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

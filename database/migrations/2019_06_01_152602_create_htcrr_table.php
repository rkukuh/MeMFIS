<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtcrrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htcrr', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code');
            $table->string('part_number');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('skill_id');
            $table->boolean('is_rii');
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->timestamp('removed_at')->nullable();
            $table->unsignedInteger('removed_by')->nullable();
            $table->unsignedDecimal('removal_manhour_estimation', 8, 2)->nullable();
            $table->timestamp('installed_at')->nullable();
            $table->unsignedInteger('installed_by')->nullable();
            $table->unsignedDecimal('installation_manhour_estimation', 8, 2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('skill_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('removed_by')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('installed_by')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('code');
            $table->index('part_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htcrrs');
    }
}

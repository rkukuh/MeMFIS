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
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('project_id');
            $table->string('position')->nullable();
            $table->string('sn_on');
            $table->string('sn_off');
            $table->string('pn_on');
            $table->string('pn_off');
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

            $table->foreign('removed_by')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('installed_by')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('code');
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

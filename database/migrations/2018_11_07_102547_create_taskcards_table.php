<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskcards', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('title');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('otr_certification_id');
            $table->unsignedInteger('work_area');
            $table->unsignedInteger('threshold_type');
            $table->integer('threshold_amount');
            $table->unsignedInteger('repeat_type');
            $table->integer('repeat_amount');
            $table->string('zone');
            $table->string('access');
            $table->boolean('rii');
            $table->string('applicability_airplane');
            $table->unsignedInteger('applicability_engine')->nullable();
            $table->boolean('applicability_engine_all')->nullable();
            $table->string('source')->nullabel();
            $table->string('effectifity')->nullabel();
            $table->longText('description')->nullabel();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('otr_certification_id')
                    ->references('id')->on('otr_certifications')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('work_area')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('threshold_type')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('repeat_type')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('applicability_engine')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

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
        Schema::dropIfExists('taskcards');
    }
}

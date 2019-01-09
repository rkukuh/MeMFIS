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

            /** BASIC / GENERAL */
            $table->string('number');
            $table->string('title');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('task_type_id')->nullable();
            $table->unsignedInteger('work_area')->nullable();
            $table->decimal('manhour', 8, 2)->nullable();
            $table->integer('helper_quantity')->nullable();
            $table->boolean('is_rii')->default(false);
            $table->string('source')->nullable();
            $table->string('effectivity')->nullable();
            $table->longText('description')->nullable();
            $table->json('version')->nullable();
            $table->unsignedDecimal('performance_factor', 8, 2)->default(1);
            $table->unsignedInteger('sequence')->nullable();

            /** EO */
            $table->string('revision')->nullable();
            $table->string('ref_no')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('scheduled_priority_id')->nullable();
            $table->integer('scheduled_priority_amount')->nullable();
            $table->string('scheduled_priority_type')->nullable();
            $table->unsignedInteger('recurrence_id')->nullable();
            $table->integer('recurrence_amount')->nullable();
            $table->string('recurrence_type')->nullable();
            $table->unsignedInteger('manual_affected_id')->nullable();
            $table->string('manual_affected')->nullable();

            /** SI */
            // Attributes
            // Fieldset #1 : SI No (r/1), Title (r/2), A/C Type (r/3), Skill (r/4), RII (r/5), Manhour (r/6), Helper Quantity (o/7)
            // Fieldset #2 : Work Area (o/8), Instruction (r/9), File (o/10), Tools (panel), Materials (panel)

            // TODO: 1-M tabel taskcard_eo
            // Columns: id, taskcard_id, work_area, instruction, skill, manhour, helper_quantity, req. RII, tools, materials, note

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('task_type_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('work_area')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('category_id')
                    ->references('id')->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('scheduled_priority_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('recurrence_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('manual_affected_id')
                    ->references('id')->on('types')
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

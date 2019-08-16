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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();

            /** BASIC / GENERAL */
            $table->string('number');
            $table->string('title');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->unsignedBigInteger('work_area')->nullable();
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->integer('engineer_quantity')->nullable();
            $table->integer('helper_quantity')->nullable();
            $table->boolean('is_rii')->nullable();
            $table->string('source')->nullable();
            $table->string('effectivity')->nullable();
            $table->unsignedDecimal('performance_factor', 8, 2)->nullable();
            $table->integer('sequence')->nullable();
            $table->json('stringer')->nullable(); // for CPCP only
            $table->json('version')->nullable();
            $table->json('document_library')->nullable();
            $table->string('ata')->nullable();
            $table->longText('description')->nullable();
            $table->json('additionals')->nullable();

            /** EO Header */
            $table->string('revision')->nullable();
            $table->string('reference')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('scheduled_priority_id')->nullable();
            $table->string('scheduled_priority_text')->nullable();
            $table->string('scheduled_priority_type')->nullable();
            $table->unsignedBigInteger('recurrence_id')->nullable();
            $table->integer('recurrence_amount')->nullable();
            $table->string('recurrence_type')->nullable();
            $table->unsignedBigInteger('manual_affected_id')->nullable();
            $table->string('manual_affected_text')->nullable();

            /** SI */
            // Fieldset #1 : SI No (req/1), Title (req/2), A/C Type (req/3), Skill (req/4), RII (req/5), Manhour (req/6), Helper Quantity (opt/7)
            // Fieldset #2 : Work Area (opt/8), Instruction (req/9), File (opt/10), Tools (panel), Materials (panel)

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('task_id')
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

            $table->index('number');
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

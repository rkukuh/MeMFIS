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

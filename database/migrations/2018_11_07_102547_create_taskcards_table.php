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
            $table->unsignedInteger('task_type_id');
            $table->unsignedInteger('work_area');
            $table->double('manhour');
            $table->integer('helper_quantity')->nullable();
            $table->boolean('is_rii')->default(false);
            $table->string('source')->nullable();
            $table->string('effectivity')->nullable();
            $table->longText('description')->nullable();
            $table->json('version')->nullable();

            /** EO */
            $table->string('revision')->nullable();
            $table->string('ref_no')->nullable();

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

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
            $table->unsignedInteger('type_id'); // NOTE: "Task" section on document
            $table->unsignedInteger('work_area');
            $table->string('zone')->nullable();
            $table->string('access')->nullable();
            $table->boolean('is_rii')->default(false);
            $table->boolean('is_applicability_airplane_all')->default(false);
            $table->boolean('is_applicability_engine_all')->default(false);
            $table->string('source')->nullable();
            $table->string('effectivity')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')
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

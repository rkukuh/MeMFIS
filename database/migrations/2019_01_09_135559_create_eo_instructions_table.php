<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEOInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eo_instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->unsignedInteger('taskcard_id')->nullable();
            $table->unsignedInteger('work_area')->nullable();
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->integer('engineer_quantity')->default(1);
            $table->integer('helper_quantity')->nullable();
            $table->boolean('is_rii')->default(false);
            $table->unsignedDecimal('performance_factor', 8, 2)->nullable();
            $table->unsignedInteger('sequence')->nullable();
            $table->longText('description')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('taskcard_id')
                    ->references('id')->on('taskcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('work_area')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eo_instructions');
    }
}

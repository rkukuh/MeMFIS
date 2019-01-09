<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskcardEoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskcard_eo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('taskcard_id')->nullable();
            $table->unsignedInteger('work_area')->nullable();
            $table->decimal('manhour', 8, 2)->nullable();
            $table->integer('helper_quantity')->nullable();
            $table->boolean('is_rii')->default(false);
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
        Schema::dropIfExists('taskcard_eo');
    }
}

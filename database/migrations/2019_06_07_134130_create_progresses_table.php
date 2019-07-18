<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->morphs('progressable');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('reason_id')->nullable();
            $table->string('reason_text')->nullable();
            $table->unsignedBigInteger('progressed_by');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')
                    ->references('id')->on('statuses')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('reason_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('progressed_by')
                    ->references('id')->on('employees')
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
        Schema::dropIfExists('progresses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefectcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defectcards', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->unsignedInteger('jobcard_id');
            $table->integer('engineer_quantity');
            $table->integer('helper_quantity');
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->boolean('is_rii');
            $table->text('complaint')->nullable();
            $table->text('description')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jobcard_id')
                    ->references('id')->on('jobcards')
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
        Schema::dropIfExists('defectcards');
    }
}

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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('jobcard_id');
            $table->unsignedBigInteger('project_additional_id')->nullable();
            $table->unsignedBigInteger('quotation_additional_id')->nullable();
            $table->integer('engineer_quantity');
            $table->integer('helper_quantity');
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->boolean('is_rii');
            $table->integer('sequence')->nullable();
            $table->string('ata')->nullable();
            $table->text('complaint')->nullable();
            $table->text('description')->nullable();
            $table->json('origin_jobcard')->nullable();
            $table->json('origin_project_additional')->nullable();
            $table->json('origin_quotation_additional')->nullable();
            $table->json('origin_defectcard_items')->nullable();
            $table->json('origin_defectcard_propose_corrections')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('jobcard_id')
                    ->references('id')->on('jobcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('project_additional_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('quotation_additional_id')
                    ->references('id')->on('quotations')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('code');
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

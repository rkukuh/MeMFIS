<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->morphs('jobcardable');
            $table->unsignedBigInteger('quotation_id');
            $table->boolean('is_rii')->default(false);
            $table->boolean('is_mandatory')->default(false);
            $table->unsignedBigInteger('station_id')->nullable();
            $table->unsignedBigInteger('entered_in')->nullable();
            $table->json('additionals')->nullable();
            $table->json('origin_quotation')->nullable();
            $table->json('origin_jobcardable')->nullable();
            $table->json('origin_jobcardable_items')->nullable();
            $table->json('origin_jobcard_helpers')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quotation_id')
                    ->references('id')->on('quotations')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('station_id')
                    ->references('id')->on('stations')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('entered_in')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobcards');
    }
}

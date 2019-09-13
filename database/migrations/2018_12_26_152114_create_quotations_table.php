<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->morphs('quotationable');
            $table->json('attention')->nullable();
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->unsignedBigInteger('currency_id');
            $table->double('exchange_rate');
            $table->double('subtotal')->nullable();
            $table->json('charge')->nullable();
            $table->double('grandtotal')->nullable();
            $table->unsignedBigInteger('scheduled_payment_type')->nullable();
            $table->json('scheduled_payment_amount')->nullable();
            $table->string('term_of_payment')->nullable();
            $table->text('term_of_condition')->nullable();
            $table->text('description')->nullable();
            $table->json('data_defectcard')->nullable();
            $table->json('data_htcrr')->nullable();
            $table->json('origin_project')->nullable();
            $table->json('origin_currency')->nullable();
            $table->json('origin_scheduled_payment_type')->nullable();
            $table->json('origin_quotation')->nullable();
            $table->json('origin_quotation_workpackages')->nullable();
            $table->json('origin_quotation_workpackage_items')->nullable();
            $table->json('origin_quotation_workpackage_taskcard_items')->nullable();
            $table->json('origin_quotation_htcrr_items')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('currency_id')
                    ->references('id')->on('currencies')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('scheduled_payment_type')
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
        Schema::dropIfExists('quotations');
    }
}

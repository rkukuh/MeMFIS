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
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('number')->nullable();
            $table->string('title')->nullable();
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('customer_id');
            $table->json('attention')->nullable();
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->unsignedInteger('currency_id');
            $table->double('exchange_rate');
            $table->double('subtotal')->nullable();
            $table->json('charge')->nullable();
            $table->double('grandtotal')->nullable();
            $table->unsignedInteger('scheduled_payment_type')->nullable();
            $table->json('scheduled_payment_amount')->nullable();
            $table->string('term_of_payment')->nullable();
            $table->text('term_of_condition')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('customer_id')
                    ->references('id')->on('customers')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

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

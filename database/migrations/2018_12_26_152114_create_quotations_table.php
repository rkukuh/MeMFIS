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
            $table->string('number');
            $table->timestamp('requested_at')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->double('exchange_rate');
            // $table->unsignedInteger('scheduled_payment_type')->nullable();
            // $table->double('scheduled_payment_amount');
            $table->double('total');
            $table->text('term_of_condition')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('scheduled_payment_type')
            //         ->references('id')->on('scheduled_payments')
            //         ->onUpdate('cascade')
            //         ->onDelete('restrict');

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
        Schema::dropIfExists('quotations');
    }
}

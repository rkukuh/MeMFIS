<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            // $table->unsignedInteger('quotation_id');
            $table->unsignedInteger('type_id');
            $table->integer('value');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('quotation_id')
            //         ->references('id')->on('quotations')
            //         ->onUpdate('cascade')
            //         ->onDelete('restrict');

            $table->foreign('type_id')
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
        Schema::dropIfExists('scheduled_payments');
    }
}

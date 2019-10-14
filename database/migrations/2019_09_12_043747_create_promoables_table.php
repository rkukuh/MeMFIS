<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('promo_id');
            $table->morphs('promoable');
            $table->double('value');
            $table->double('amount');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('promo_id')
                    ->references('id')->on('promos')
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
        Schema::dropIfExists('promoables');
    }
}

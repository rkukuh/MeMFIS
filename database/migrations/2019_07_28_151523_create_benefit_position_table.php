<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_position', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('benefit_id');
            $table->unsignedBigInteger('position_id');
            $table->double('min');
            $table->double('max');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('benefit_id')
                    ->references('id')->on('benefits')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('position_id')
                    ->references('id')->on('positions')
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
        Schema::dropIfExists('benefit_position');
    }
}

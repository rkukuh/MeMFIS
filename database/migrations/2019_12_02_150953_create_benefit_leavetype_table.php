<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitLeavetypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_leavetype', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('leavetype_id')->nullable();
            $table->unsignedBigInteger('benefit_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('benefit_id')
                    ->references('id')->on('benefits')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('leavetype_id')
                    ->references('id')->on('leavetypes')
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
        Schema::dropIfExists('benefit_leavetype');
    }
}

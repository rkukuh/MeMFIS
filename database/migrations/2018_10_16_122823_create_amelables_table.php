<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmelablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amelables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('amel_id');
            $table->morphs('amelable');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('amel_id')
                    ->references('id')->on('amels')
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
        Schema::dropIfExists('amelables');
    }
}

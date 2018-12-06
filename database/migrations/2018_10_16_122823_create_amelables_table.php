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
            $table->increments('id');
            $table->unsignedInteger('amel_id');
            $table->unsignedInteger('amelable_id');
            $table->string('amelable_type');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code',50);
            $table->string('name')->nullable();
            $table->unsignedInteger('type_id')->nullable();
            $table->integer('level')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('journals');
    }
}

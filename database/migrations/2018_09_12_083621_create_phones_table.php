<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->string('ext')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->boolean('is_active')->default(true);
            $table->morphs('phoneable');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('type_id')
                  ->references('id')->on('types')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

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
        Schema::dropIfExists('phones');
    }
}

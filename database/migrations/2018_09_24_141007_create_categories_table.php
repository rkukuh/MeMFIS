<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code',50);
            $table->string('name');
            $table->text('description');
            $table->unsignedInteger('account_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_code')
            ->references('id')->on('journals')
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
        Schema::dropIfExists('categories');
    }
}

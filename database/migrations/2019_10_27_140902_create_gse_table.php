<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gse', function (Blueprint $table) {

            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->nullableMorphs('gseable');
            $table->unsignedBigInteger('storage_id');
            $table->timestamp('returned_at')->nullable();
            $table->unsignedBigInteger('returned_by');
            $table->string('section')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('storage_id')
                    ->references('id')->on('storages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('returned_by')
                    ->references('id')->on('employees')
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
        Schema::dropIfExists('gse');
    }
}

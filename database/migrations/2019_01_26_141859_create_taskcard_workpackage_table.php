<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskcardWorkPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskcard_workpackage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('taskcard_id');
            $table->unsignedBigInteger('workpackage_id');
            $table->integer('sequence')->nullable();
            $table->boolean('is_mandatory')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('taskcard_id')
                    ->references('id')->on('taskcards')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('workpackage_id')
                    ->references('id')->on('workpackages')
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
        Schema::dropIfExists('taskcard_workpackage');
    }
}

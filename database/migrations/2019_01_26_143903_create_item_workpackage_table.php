<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemWorkPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_workpackage', function (Blueprint $table) {
            $table->unsignedInteger('workpackage_id');
            $table->unsignedInteger('item_id');
            $table->double('quantity');
            $table->unsignedInteger('unit_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('workpackage_id')
                    ->references('id')->on('workpackages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('item_id')
                    ->references('id')->on('items')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('unit_id')
                    ->references('id')->on('units')
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
        Schema::dropIfExists('item_workpackage');
    }
}

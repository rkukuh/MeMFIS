<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationWorkPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_workpackage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quotation_id');
            $table->unsignedBigInteger('workpackage_id');
            $table->double('manhour_total')->nullable();
            $table->double('manhour_rate')->nullable();
            $table->string('discount_type')->nullable();
            $table->double('discount_value')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('quotation_id')
                    ->references('id')->on('quotations')
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
        Schema::dropIfExists('quotation_workpackage');
    }
}

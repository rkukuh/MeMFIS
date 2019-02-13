<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkpackageQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workpackage_quotation', function (Blueprint $table) {
            $table->unsignedInteger('workpackage_id');
            $table->unsignedInteger('quotation_id');
            $table->double('manhour_total');
            $table->double('manhour_rate');
            $table->text('jc_description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('workpackage_id')
                    ->references('id')->on('workpackages')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('quotation_id')
                    ->references('id')->on('quotations')
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
        Schema::dropIfExists('workpackage_quotation');
    }
}

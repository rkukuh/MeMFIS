<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('number');
            $table->timestamp('rir_date');
            $table->string('delivery_document_number')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('purchase_order_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('packing_type')->nullable();
            $table->unsignedBigInteger('packing_condition')->nullable();
            $table->text('unsatisfactory_packing')->nullable();
            $table->unsignedBigInteger('preservation_check')->nullable();
            $table->text('unsatisfactory_preservation')->nullable();
            $table->unsignedBigInteger('material_condition')->nullable();
            $table->unsignedBigInteger('material_identification')->nullable();
            $table->unsignedBigInteger('material_quality')->nullable();
            $table->text('unsatisfactory_material')->nullable();
            $table->text('unsatisfactory_document')->nullable();
            $table->unsignedBigInteger('received_by')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->text('decision')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')
                    ->references('id')->on('statuses')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('purchase_order_id')
                    ->references('id')->on('purchase_orders')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('vendor_id')
                    ->references('id')->on('vendors')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('packing_type')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('packing_condition')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('preservation_check')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('material_condition')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('material_identification')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('material_quality')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('received_by')
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
        Schema::dropIfExists('rir');
    }
}

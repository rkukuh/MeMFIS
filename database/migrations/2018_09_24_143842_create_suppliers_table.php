<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code',50);
            $table->integer('city_id');
            $table->text('address');
            $table->string('npwp');
            $table->string('nppkp');
            $table->integer('top');
            $table->integer('active');
            $table->unsignedInteger('account_code')->nullable();
            $table->string('contact_person');
            $table->string('contact_person_position');
            $table->string('barcode');
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
        Schema::dropIfExists('suppliers');
    }
}

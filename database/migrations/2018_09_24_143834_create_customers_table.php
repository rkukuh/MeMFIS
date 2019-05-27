<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->string('name');
            $table->json('attention')->nullable();
            $table->integer('payment_term')->nullable();
            $table->unsignedInteger('account_code')->nullable();
            $table->timestamp('banned_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_code')
                  ->references('id')->on('journals')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->index('code');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

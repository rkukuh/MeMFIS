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
            $table->string('code');
            $table->string('name');
            // $table->string('leveling');
            $table->unsignedInteger('payment_term');
            $table->timestamp('banned_at')->nullable();
            $table->unsignedInteger('account_code')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('payment_term')
                  ->references('id')->on('types')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHtcrrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('htcrr', function (Blueprint $table) {
            $table->increments('id');
            $table->char('uuid', 36)->unique();
            $table->string('code');
            $table->string('part_number');
            $table->unsignedInteger('skill_id');
            $table->boolean('is_rii');
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->timestamp('removed_at')->nullable();
            $table->unsignedInteger('removed_by');
            $table->timestamp('installed_at')->nullable();
            $table->unsignedInteger('installed_by');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htcrrs');
    }
}

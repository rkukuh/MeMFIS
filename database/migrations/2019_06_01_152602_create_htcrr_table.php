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
            $table->bigIncrements('id');
            $table->char('uuid', 36)->unique();
            $table->string('code')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('project_id');
            $table->string('position')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('part_number')->nullable();
            $table->timestamp('conducted_at')->nullable();
            $table->unsignedBigInteger('conducted_by')->nullable();
            $table->unsignedDecimal('estimation_manhour', 8, 2)->nullable();
            $table->boolean('is_rii')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                    ->references('id')->on('htcrr')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('type_id')
                    ->references('id')->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('project_id')
                    ->references('id')->on('projects')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->foreign('conducted_by')
                    ->references('id')->on('employees')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htcrr');
    }
}

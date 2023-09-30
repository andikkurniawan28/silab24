<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posbrix_id')->unique()->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('cane_table');
            $table->float('Daduk')->nullable();
            $table->float('Akar')->nullable();
            $table->float('Tali_pucuk')->nullable();
            $table->float('Pucuk')->nullable();
            $table->float('Sogolan')->nullable();
            $table->float('Tebu_muda')->nullable();
            $table->float('Lelesan')->nullable();
            $table->float('Terbakar')->nullable();
            $table->float('value');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}

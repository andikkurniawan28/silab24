<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemicalcheckingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemicalcheckings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->float('Kapur')->nullable();
            $table->float('Belerang')->nullable();
            $table->float('Flocculant')->nullable();
            $table->float('NaOH')->nullable();
            $table->float('B894')->nullable();
            $table->float('B895')->nullable();
            $table->float('B210')->nullable();
            $table->float('Blotong')->nullable();
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
        Schema::dropIfExists('chemicalcheckings');
    }
}

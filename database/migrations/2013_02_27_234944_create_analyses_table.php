<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('volume')->nullable();
            $table->integer('pan')->nullable();
            $table->integer('reef')->nullable();
            $table->time('start')->nullable();
            $table->time('finish')->nullable();
            $table->float('%Brix')->nullable();
            $table->float('%Pol')->nullable();
            $table->float('Pol')->nullable();
            $table->float('HK')->nullable();
            $table->float('%R')->nullable();
            $table->float('IU')->nullable();
            $table->float('%Air')->nullable();
            $table->float('%Zk')->nullable();
            $table->float('CaO')->nullable();
            $table->float('pH')->nullable();
            $table->float('Turbidity')->nullable();
            $table->float('TDS')->nullable();
            $table->float('Sadah')->nullable();
            $table->float('P2O5')->nullable();
            $table->float('SO2')->nullable();
            $table->float('BJB')->nullable();
            $table->float('TSAI')->nullable();
            $table->float('Succrose')->nullable();
            $table->float('Glucose')->nullable();
            $table->float('Fructose')->nullable();
            $table->float('Suhu')->nullable();
            $table->float('PI')->nullable();
            $table->float('%Sabut')->nullable();
            $table->float('%Kapur')->nullable();
            $table->float('Pol_Ampas')->nullable();
            $table->boolean('is_verified', 0)->default(0);
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
        Schema::dropIfExists('analyses');
    }
}

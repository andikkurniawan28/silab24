<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKactivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kactivities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->float('Tekanan_Pre_Evaporator_1')->nullable();
            $table->float('Tekanan_Pre_Evaporator_2')->nullable();
            $table->float('Tekanan_Evaporator_1')->nullable();
            $table->float('Tekanan_Evaporator_2')->nullable();
            $table->float('Tekanan_Evaporator_3')->nullable();
            $table->float('Tekanan_Evaporator_4')->nullable();
            $table->float('Tekanan_Evaporator_5')->nullable();
            $table->float('Tekanan_Evaporator_6')->nullable();
            $table->float('Tekanan_Evaporator_7')->nullable();
            $table->float('Tekanan_Pan_1')->nullable();
            $table->float('Tekanan_Pan_2')->nullable();
            $table->float('Tekanan_Pan_3')->nullable();
            $table->float('Tekanan_Pan_4')->nullable();
            $table->float('Tekanan_Pan_5')->nullable();
            $table->float('Tekanan_Pan_6')->nullable();
            $table->float('Tekanan_Pan_7')->nullable();
            $table->float('Tekanan_Pan_8')->nullable();
            $table->float('Tekanan_Pan_9')->nullable();
            $table->float('Tekanan_Pan_10')->nullable();
            $table->float('Tekanan_Pan_11')->nullable();
            $table->float('Tekanan_Pan_12')->nullable();
            $table->float('Tekanan_Pan_13')->nullable();
            $table->float('Tekanan_Pan_14')->nullable();
            $table->float('Tekanan_Pan_15')->nullable();
            $table->float('Tekanan_Pan_16')->nullable();
            $table->float('Tekanan_Pan_17')->nullable();
            $table->float('Tekanan_Pan_18')->nullable();
            $table->float('Suhu_Pre_Evaporator_1')->nullable();
            $table->float('Suhu_Pre_Evaporator_2')->nullable();
            $table->float('Suhu_Evaporator_1')->nullable();
            $table->float('Suhu_Evaporator_2')->nullable();
            $table->float('Suhu_Evaporator_3')->nullable();
            $table->float('Suhu_Evaporator_4')->nullable();
            $table->float('Suhu_Evaporator_5')->nullable();
            $table->float('Suhu_Evaporator_6')->nullable();
            $table->float('Suhu_Evaporator_7')->nullable();
            $table->float('Suhu_Heater_1')->nullable();
            $table->float('Suhu_Heater_2')->nullable();
            $table->float('Suhu_Heater_3')->nullable();
            $table->float('Suhu_Air_Injeksi')->nullable();
            $table->float('Suhu_Air_Terjun')->nullable();
            $table->float('Tekanan_Pompa_Hampa')->nullable();
            $table->float('Tekanan_Uap_Baru')->nullable();
            $table->float('Tekanan_Uap_Bekas')->nullable();
            $table->float('Tekanan_Uap_3Ato')->nullable();
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
        Schema::dropIfExists('kactivities');
    }
}

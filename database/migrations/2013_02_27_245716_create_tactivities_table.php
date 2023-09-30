<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTactivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tactivities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->float('Peti_Nira_Mentah')->nullable();
            $table->float('Pemanas_Nira_Mentah')->nullable();
            $table->float('Reaction_Tank_Pemurnian')->nullable();
            $table->float('Defekator')->nullable();
            $table->float('Clarifier_ST')->nullable();
            $table->float('Pemanas_Nira_Encer')->nullable();
            $table->float('Evaporator_1')->nullable();
            $table->float('Evaporator_2')->nullable();
            $table->float('Evaporator_3')->nullable();
            $table->float('Evaporator_4')->nullable();
            $table->float('Evaporator_5')->nullable();
            $table->float('Evaporator_6')->nullable();
            $table->float('Evaporator_7')->nullable();
            $table->float('Evaporator_8')->nullable();
            $table->float('Evaporator_9')->nullable();
            $table->float('NK_Sebelum_Sulfitasi')->nullable();
            $table->float('NK_Setelah_Sulfitasi_Atas')->nullable();
            $table->float('NK_Setelah_Sulfitasi_Bawah')->nullable();
            $table->float('Klare_SHS_Atas')->nullable();
            $table->float('Klare_SHS_Bawah')->nullable();
            $table->float('Pan_1')->nullable();
            $table->float('Pan_2')->nullable();
            $table->float('Pan_3')->nullable();
            $table->float('Pan_4')->nullable();
            $table->float('Pan_5')->nullable();
            $table->float('Pan_6')->nullable();
            $table->float('Pan_7')->nullable();
            $table->float('Pan_8')->nullable();
            $table->float('Pan_9')->nullable();
            $table->float('Pan_10')->nullable();
            $table->float('Pan_11')->nullable();
            $table->float('Pan_12')->nullable();
            $table->float('Pan_13')->nullable();
            $table->float('Pan_14')->nullable();
            $table->float('Pan_15')->nullable();
            $table->float('Pan_16')->nullable();
            $table->float('Pan_17')->nullable();
            $table->float('Pan_18')->nullable();
            $table->float('Palung_1')->nullable();
            $table->float('Palung_2')->nullable();
            $table->float('Palung_3')->nullable();
            $table->float('Palung_4')->nullable();
            $table->float('Palung_5')->nullable();
            $table->float('Palung_6')->nullable();
            $table->float('Palung_7')->nullable();
            $table->float('Palung_8')->nullable();
            $table->float('Palung_9')->nullable();
            $table->float('Palung_10')->nullable();
            $table->float('CVP_C')->nullable();
            $table->float('Palung_CVP_C')->nullable();
            $table->float('CVP_D')->nullable();
            $table->float('Palung_CVP_D')->nullable();
            $table->float('Distributor_A_Utara')->nullable();
            $table->float('Distributor_A_Selatan')->nullable();
            $table->float('Distributor_C_Timur')->nullable();
            $table->float('Distributor_C_Barat')->nullable();
            $table->float('Distributor_D1')->nullable();
            $table->float('Distributor_D2')->nullable();
            $table->float('Vertical_Crystallizer_Timur')->nullable();
            $table->float('Vertical_Crystallizer_Barat')->nullable();
            $table->float('Stroop_A_Atas')->nullable();
            $table->float('Stroop_A_Bawah')->nullable();
            $table->float('Klare_D_Atas')->nullable();
            $table->float('Klare_D_Bawah')->nullable();
            $table->float('Einwuurf_C')->nullable();
            $table->float('Einwuurf_D')->nullable();
            $table->float('Clear_Liquor_1')->nullable();
            $table->float('Clear_Liquor_2')->nullable();
            $table->float('Remelt_A/NKL')->nullable();
            $table->float('R1_Mol_Bawah')->nullable();
            $table->float('R1_Mol_Atas')->nullable();
            $table->float('R2_Mol_Bawah')->nullable();
            $table->float('R2_Mol_Atas')->nullable();
            $table->float('Remelter_A1')->nullable();
            $table->float('Remelter_A2')->nullable();
            $table->float('Remelter_C/D')->nullable();
            $table->float('Mingler_Atas')->nullable();
            $table->float('Mingler_Bawah')->nullable();
            $table->float('Silo_Retail')->nullable();
            $table->float('Silo_2400')->nullable();
            $table->float('PP')->nullable();
            $table->float('Reaction_Tank_DRK')->nullable();
            $table->float('Talo_Phospatasi')->nullable();
            $table->float('Deep_Bad_Filter')->nullable();
            $table->float('CO2_Gas_Carbonator_1')->nullable();
            $table->float('CO2_Gas_Carbonator_2')->nullable();
            $table->float('First_Filtrat_Tank')->nullable();
            $table->float('Clear_Liquor_Tank_1')->nullable();
            $table->float('Clear_Liquor_Tank_2')->nullable();
            $table->float('Raw_Liquor_Tank_1')->nullable();
            $table->float('Raw_Liquor_Tank_2')->nullable();
            $table->float('Clarifier_Melt_Tank_1')->nullable();
            $table->float('Clarifier_Melt_Tank_2')->nullable();
            $table->float('Filtered_Melt_Tank_1')->nullable();
            $table->float('Filtered_Melt_Tank_2')->nullable();
            $table->float('Back_Wash_Tank_1')->nullable();
            $table->float('Back_Wash_Tank_2')->nullable();
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
        Schema::dropIfExists('tactivities');
    }
}

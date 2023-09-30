<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaPendahuluansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_pendahuluans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("kud_id")->constrained();
            $table->foreignId("user_id")->constrained();
            $table->string("register")->nullable();
            $table->float("berat_tebu")->nullable();
            $table->float("berat_nira")->nullable();
            $table->float("pbrix_atas")->nullable();
            $table->float("ppol_atas")->nullable();
            $table->float("pol_atas")->nullable();
            $table->float("rendemen_atas")->nullable();
            $table->float("pbrix_tengah")->nullable();
            $table->float("ppol_tengah")->nullable();
            $table->float("pol_tengah")->nullable();
            $table->float("rendemen_tengah")->nullable();
            $table->float("pbrix_bawah")->nullable();
            $table->float("ppol_bawah")->nullable();
            $table->float("pol_bawah")->nullable();
            $table->float("rendemen_bawah")->nullable();
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisa_pendahuluans');
    }
}

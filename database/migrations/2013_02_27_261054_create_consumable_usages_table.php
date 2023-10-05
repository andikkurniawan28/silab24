<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumableUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumable_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->float("Form_A")->nullable();
            $table->float("Form_B")->nullable();
            $table->float("Kieselguhr")->nullable();
            $table->float("Kertas_Merang")->nullable();
            $table->float("Kertas_Whatmann")->nullable();
            $table->float("Kertas_Thermal")->nullable();
            $table->float("Test_Kit_H-1")->nullable();
            $table->float("Test_Kit_H-2")->nullable();
            $table->float("Test_Kit_PO4-1")->nullable();
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
        Schema::dropIfExists('consumable_usages');
    }
}

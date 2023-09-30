<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoreSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_samples', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posbrix_id')->unique()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained();
            $table->float('pbrix')->nullable();
            $table->float('ppol')->nullable();
            $table->float('pol')->nullable();
            $table->float('rendemen')->nullable();
            $table->float('pbrix_riil')->nullable();
            $table->float('ppol_riil')->nullable();
            $table->float('pol_riil')->nullable();
            $table->float('rendemen_riil')->nullable();
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
        Schema::dropIfExists('core_samples');
    }
}

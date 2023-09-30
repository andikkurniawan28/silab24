<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosbrixesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posbrixes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('variety_id')->nullable()->constrained();
            $table->foreignId('kawalan_id')->nullable()->constrained();
            $table->foreignId('kud_id')->nullable()->constrained();
            $table->foreignId('pospantau_id')->nullable()->constrained();
            $table->foreignId('wilayah_id')->nullable()->constrained();
            $table->string('category');
            $table->string('spta')->unique();
            $table->string('barcode_antrian')->nullable()->unique();
            $table->string('rfid')->nullable();
            $table->string('register')->nullable();
            $table->string('nopol')->nullable();
            $table->string('nama_petani')->nullable();
            $table->integer('brix')->nullable();
            $table->boolean('is_accepted')->nullable();
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
        Schema::dropIfExists('posbrixes');
    }
}

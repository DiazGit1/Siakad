<?php
// database/migrations/xxxx_xx_xx_create_program_studis_table.php
// database/migrations/2024_07_09_042520_create_program_studis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramStudisTable extends Migration
{
    public function up()
    {
        Schema::create('program_studis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_prodi')->unique();
            $table->string('nama_prodi');
            $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade')->default(1); // Set default value here
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_studis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user')->unique();
            $table->enum('fakultas', ['Fakultas Informatika dan Komputer', 'Fakultas Ekonomi', 'Fakultas Hukum', 'Fakultas Teknik'])->default('Fakultas Ekonomi');
            $table->enum('prodi', ['Teknik Informatika', 'Teknik Sipil', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Kimia', 'Akuntansi', 'Manajemen', 'Hukum'])->default('Teknik Informatika');
            $table->text('reason');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusans');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->string('nim',10)->primary();
            $table->string('nama',255);
            $table->string('featured_image');
            $table->string('kelas',100);
            $table->string('jurusan',100);
            $table->string('no_handphone',30);
            $table->string('email');
            $table->date('tanggal_lahir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};

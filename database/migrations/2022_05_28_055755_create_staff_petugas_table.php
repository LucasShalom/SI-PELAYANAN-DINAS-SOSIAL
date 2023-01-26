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
        Schema::create('staff_petugas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_SERSOS')->constrained('service_sosials')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ID_SERKEJI')->constrained('service_kejiwaans')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('TANGGAL_PENANGANAN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_petugas');
    }
};

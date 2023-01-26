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
        Schema::create('data_pmks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_CUSTOMERS')->constrained('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('RIWAYAT_KEJADIAN');
            $table->string('JENIS_KASUS');
            $table->string('JUMLAH_ORANG');
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
        Schema::dropIfExists('data_pmks');
    }
};

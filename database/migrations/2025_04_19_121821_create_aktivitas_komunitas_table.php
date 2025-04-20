<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasKomunitasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aktivitas_komunitas', function (Blueprint $table) {
            // PK sebagai unsigned BIGINT auto-increment
            $table->bigIncrements('id_aktivitas');

            // FK yang tipenya match unsigned BIGINT di komunitas.id_kmnts
            $table->unsignedBigInteger('id_kmnts');

            $table->string('judul', 255);
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->decimal('paymentAmount', 10, 2)->default(0.00);
            $table->text('deskripsi')->nullable();

            $table->foreign('id_kmnts')
                  ->references('id_kmnts')
                  ->on('komunitas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aktivitas_komunitas');
    }
}

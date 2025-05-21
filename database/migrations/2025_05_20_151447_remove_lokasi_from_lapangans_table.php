<?php

// database/migrations/2025_xx_xx_xxxxxx_remove_lokasi_from_lapangans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveLokasiFromLapangansTable extends Migration
{
    public function up()
    {
        Schema::table('lapangans', function (Blueprint $table) {
            $table->dropColumn('lokasi');
        });
    }

    public function down()
    {
        Schema::table('lapangans', function (Blueprint $table) {
            $table->string('lokasi')->after('categori'); // letakkan setelah 'categori' sesuai struktur awal
        });
    }
}

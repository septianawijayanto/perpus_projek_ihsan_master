<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 191);
            $table->foreignId('anggota_id')->references('id')->on('anggota')->onDelete('cascade');
            $table->foreignId('buku_id')->references('id')->on('buku')->onDelete('cascade');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->enum('status', ['proses', 'tolak', 'rusak', 'hilang', 'pinjam', 'kembali']);
            $table->enum('status_ganti', ['belom', 'sudah'])->nullable();
            $table->enum('keterangan', ['rusak', 'hilang'])->nullable();
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
        Schema::dropIfExists('transaksi');
    }
}

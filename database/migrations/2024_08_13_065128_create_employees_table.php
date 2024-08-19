<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('no_tes')->unique();
            $table->date('tgl_tes');
            $table->date('tgl_tes_akhir');
            $table->tinyInteger('status');
            $table->string('nomor_ktp')->unique();
            $table->string('nama');
            $table->string('nama_ibu');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jk');
            $table->string('no_handphone');
            $table->string('no_whatsapp');
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pengalaman');
            $table->string('agama');
            $table->string('status_pernikahan');
            $table->string('jumlah_anak');
            $table->string('referensi');
            $table->string('no_ijazah');
            $table->string('jenjang_pendidikan');
            $table->string('perguruan_tinggi_sekolah');
            $table->string('jurusan');
            $table->char('akreditasi', 100);
            $table->string('fakultas')->nullable();
            $table->string('gelar')->nullable();
            $table->integer('tahun_masuk');
            $table->integer('tahun_lulus');
            $table->string('ipk');
            $table->text('alamat_ktp');
            $table->integer('rt_ktp');
            $table->integer('rw_ktp');
            $table->string('provinsi_ktp');
            $table->string('kota_ktp');
            $table->string('kecamatan_ktp');
            $table->string('kelurahan_ktp');
            $table->string('kode_pos_ktp');
            $table->text('alamat_domisili')->nullable();
            $table->integer('rt_domisili')->nullable();
            $table->integer('rw_domisili')->nullable();
            $table->string('provinsi_domisili')->nullable();
            $table->string('kota_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('kelurahan_domisili')->nullable();
            $table->string('kode_pos_domisili')->nullable();
            $table->string('cv')->nullable();
            $table->string('surat_lamaran')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('sim_c')->nullable();
            $table->string('skck')->nullable();
            $table->date('tgl_skck')->nullable();
            $table->string('bi_checking')->nullable();
            $table->string('referensi_kerja')->nullable();
            $table->string('buku_tabungan')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('posisi');
            $table->string('cabang_kode');
            $table->string('cabang_nama');
            $table->string('kota_nama');
            $table->string('area_kode');
            $table->string('area_nama');
            $table->string('regional_nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

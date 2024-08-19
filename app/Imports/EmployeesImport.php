<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon;

class EmployeesImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $employee = Employee::where('nomor_ktp', $row['nomor_ktp'])->first();
            if ($employee) {
                $employee->update([
                    'no_tes' => $row['no_tes'],
                    'tgl_tes' => $this->transformDate($row['tgl_tes']),
                    'tgl_tes_akhir' => $this->transformDate($row['tgl_tes_akhir']),
                    'status' => $row['status'],
                    'nomor_ktp' => $row['nomor_ktp'],
                    'nama' => $row['nama'],
                    'nama_ibu' => $row['nama_ibu'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tgl_lahir' => $this->transformDate($row['tgl_lahir']),
                    'jk' => $row['jk'],
                    'no_handphone' => $row['no_handphone'],
                    'no_whatsapp' => $row['no_whatsapp'],
                    'facebook' => $row['facebook'],
                    'instagram' => $row['instagram'],
                    'linkedin' => $row['linkedin'],
                    'agama' => $row['agama'],
                    'pengalaman' => $row['pengalaman'],
                    'status_pernikahan' => $row['status_pernikahan'],
                    'jumlah_anak' => $row['jumlah_anak'],
                    'referensi' => $row['referensi'],
                    'no_ijazah' => $row['no_ijazah'],
                    'jenjang_pendidikan' => $row['jenjang_pendidikan'],
                    'perguruan_tinggi_sekolah' => $row['perguruan_tinggi_sekolah'],
                    'jurusan' => $row['jurusan'],
                    'akreditasi' => $row['akreditasi'],
                    'fakultas' => $row['fakultas'],
                    'gelar' => $row['gelar'],
                    'tahun_masuk' => $row['tahun_masuk'],
                    'tahun_lulus' => $row['tahun_lulus'],
                    'ipk' => $row['ipk'],
                    'alamat_ktp' => $row['alamat_ktp'],
                    'rt_ktp' => $row['rt_ktp'],
                    'rw_ktp' => $row['rw_ktp'],
                    'provinsi_ktp' => $row['provinsi_ktp'],
                    'kota_ktp' => $row['kota_ktp'],
                    'kecamatan_ktp' => $row['kecamatan_ktp'],
                    'kelurahan_ktp' => $row['kelurahan_ktp'],
                    'kode_pos_ktp' => $row['kode_pos_ktp'],
                    'alamat_domisili' => $row['alamat_domisili'],
                    'rt_domisili' => $row['rt_domisili'],
                    'rw_domisili' => $row['rw_domisili'],
                    'provinsi_domisili' => $row['provinsi_domisili'],
                    'kota_domisili' => $row['kota_domisili'],
                    'kecamatan_domisili' => $row['kecamatan_domisili'],
                    'kelurahan_domisili' => $row['kelurahan_domisili'],
                    'kode_pos_domisili' => $row['kode_pos_domisili'],
                    'cv' => $row['cv'],
                    'surat_lamaran' => $row['surat_lamaran'],
                    'ktp' => $row['ktp'],
                    'kk' => $row['kk'],
                    'pas_foto' => $row['pas_foto'],
                    'ijazah' => $row['ijazah'],
                    'npwp' => $row['npwp'],
                    'no_npwp' => $row['no_npwp'],
                    'sim_c' => $row['sim_c'],
                    'skck' => $row['skck'],
                    'tgl_skck' => $this->transformDate($row['tgl_skck']),
                    'bi_checking' => $row['bi_checking'],
                    'referensi_kerja' => $row['referensi_kerja'],
                    'buku_tabungan' => $row['buku_tabungan'],
                    'no_rek' => $row['no_rek'],
                    'gol_darah' => $row['gol_darah'],
                    'posisi' => $row['posisi'],
                    'cabang_kode' => $row['cabang_kode'],
                    'cabang_nama' => $row['cabang_nama'],
                    'kota_nama' => $row['kota_nama'],
                    'area_kode' => $row['area_kode'],
                    'area_nama' => $row['area_nama'],
                    'regional_nama' => $row['regional_nama'],
                ]);
            } else {
                Employee::create([
                    'no_tes' => $row['no_tes'],
                    'tgl_tes' => $this->transformDate($row['tgl_tes']),
                    'tgl_tes_akhir' => $this->transformDate($row['tgl_tes_akhir']),
                    'status' => $row['status'],
                    'nomor_ktp' => $row['nomor_ktp'],
                    'nama' => $row['nama'],
                    'nama_ibu' => $row['nama_ibu'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tgl_lahir' => $this->transformDate($row['tgl_lahir']),
                    'jk' => $row['jk'],
                    'no_handphone' => $row['no_handphone'],
                    'no_whatsapp' => $row['no_whatsapp'],
                    'facebook' => $row['facebook'],
                    'instagram' => $row['instagram'],
                    'linkedin' => $row['linkedin'],
                    'agama' => $row['agama'],
                    'pengalaman' => $row['pengalaman'],
                    'status_pernikahan' => $row['status_pernikahan'],
                    'jumlah_anak' => $row['jumlah_anak'],
                    'referensi' => $row['referensi'],
                    'no_ijazah' => $row['no_ijazah'],
                    'jenjang_pendidikan' => $row['jenjang_pendidikan'],
                    'perguruan_tinggi_sekolah' => $row['perguruan_tinggi_sekolah'],
                    'jurusan' => $row['jurusan'],
                    'akreditasi' => $row['akreditasi'],
                    'fakultas' => $row['fakultas'],
                    'gelar' => $row['gelar'],
                    'tahun_masuk' => $row['tahun_masuk'],
                    'tahun_lulus' => $row['tahun_lulus'],
                    'ipk' => $row['ipk'],
                    'alamat_ktp' => $row['alamat_ktp'],
                    'rt_ktp' => $row['rt_ktp'],
                    'rw_ktp' => $row['rw_ktp'],
                    'provinsi_ktp' => $row['provinsi_ktp'],
                    'kota_ktp' => $row['kota_ktp'],
                    'kecamatan_ktp' => $row['kecamatan_ktp'],
                    'kelurahan_ktp' => $row['kelurahan_ktp'],
                    'kode_pos_ktp' => $row['kode_pos_ktp'],
                    'alamat_domisili' => $row['alamat_domisili'],
                    'rt_domisili' => $row['rt_domisili'],
                    'rw_domisili' => $row['rw_domisili'],
                    'provinsi_domisili' => $row['provinsi_domisili'],
                    'kota_domisili' => $row['kota_domisili'],
                    'kecamatan_domisili' => $row['kecamatan_domisili'],
                    'kelurahan_domisili' => $row['kelurahan_domisili'],
                    'kode_pos_domisili' => $row['kode_pos_domisili'],
                    'cv' => $row['cv'],
                    'surat_lamaran' => $row['surat_lamaran'],
                    'ktp' => $row['ktp'],
                    'kk' => $row['kk'],
                    'pas_foto' => $row['pas_foto'],
                    'ijazah' => $row['ijazah'],
                    'npwp' => $row['npwp'],
                    'no_npwp' => $row['no_npwp'],
                    'sim_c' => $row['sim_c'],
                    'skck' => $row['skck'],
                    'tgl_skck' => $this->transformDate($row['tgl_skck']),
                    'bi_checking' => $row['bi_checking'],
                    'referensi_kerja' => $row['referensi_kerja'],
                    'buku_tabungan' => $row['buku_tabungan'],
                    'no_rek' => $row['no_rek'],
                    'gol_darah' => $row['gol_darah'],
                    'posisi' => $row['posisi'],
                    'cabang_kode' => $row['cabang_kode'],
                    'cabang_nama' => $row['cabang_nama'],
                    'kota_nama' => $row['kota_nama'],
                    'area_kode' => $row['area_kode'],
                    'area_nama' => $row['area_nama'],
                    'regional_nama' => $row['regional_nama'],
                ]);
            }
        }
    }

    /**
     * Transform Excel date to Y-m-d format.
     *
     * @param string $value
     * @return string
     */
    private function transformDate($value)
    {
        return Date::excelToDateTimeObject($value)->format('Y-m-d');
    }
}


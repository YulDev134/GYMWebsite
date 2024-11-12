<?php

namespace App\Controllers;

use App\Models\PresensiModel;

class PresensiController extends BaseController
{
    public function lihatpresensi()
    {
        // Instance dari model PresensiModel
        $presensiModel = new PresensiModel();

        // Ambil semua data presensi
        $data = [
            'title' => 'Lihat Daftar Presensi',
            'presensiModel' => $presensiModel->getAllPresensiData() // Ambil semua data presensi
        ];

        // Tampilkan view dengan data presensi
        return view('AdminLihatPresensi', $data);
    }

    public function catatpresensi($idmember, $idadmin)
    {
        // Panggil PresensiModel untuk menyimpan data presensi
        $presensiModel = new PresensiModel();

        // Lakukan pencatatan presensi
        $data = [
            'idmember' => $idmember,
            'idadmin' => $idadmin, // Menyimpan ID admin yang melakukan presensi
            'jam_masuk' => date('Y-m-d H:i:s'), // Gunakan waktu saat ini
            'status' => 'Hadir' // Sesuaikan status presensi sesuai kebutuhan
        ];

        // Simpan data presensi ke dalam database
        $presensiModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to(base_url('lihatmember')); // Ganti dengan halaman yang sesuai
    }

    public function hapuspresensi($id)
    {
        $presensiModel = new PresensiModel();

        $presensi = $presensiModel->find($id);

        if ($presensi) {
            $presensiModel->delete($id);

            // Redirect atau tampilkan pesan sukses
            return redirect()->back();
            session()->setFlashdata('hpspresensi', 'Presensi Member Berhasil di Hapus');
        } else {
            session()->setFlashdata('gagalhapuspresensi', 'Gagal Menghapus');
            return redirect()->back()->with('error', 'Presensi tidak ditemukan.');
        }
    }
}

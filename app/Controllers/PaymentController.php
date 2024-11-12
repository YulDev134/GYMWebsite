<?php

namespace App\Controllers;

use App\Models\PackageModel;
use App\Models\OrderModel;
use App\Models\MemberModel;

class PaymentController extends BaseController
{
    public function pilihpaket()
    {
        $packageModel = new PackageModel();
        $data['package'] = $packageModel->findAll();
        return view('PilihPaket', $data);
    }
    public function processOrder()
    {
        // Ambil package_id dari form
        $packageId = $this->request->getPost('package_id');

        // Ambil idmember dari session
        $idmember = session()->get('idmember');

        // Generate unique code
        $uniqueCode = rand(100000, 999999); // Ini hanya sementara, gunakan metode yang lebih aman di produksi

        // Simpan order ke database menggunakan model
        $orderModel = new OrderModel();
        $orderModel->insert([
            'idmember' => $idmember,
            'idpackage' => $packageId, // Pastikan $packageId sesuai dengan nilai yang diharapkan dari form
            'order_date' => date('d-m-Y H:i:s'),
            'status' => 'pending',
            'unique_code' => $uniqueCode,
        ]);
        session()->setFlashdata('pemesanan', 'Pemesanan Berhasil Silahkan Meminta Kode Unik Pada Admin Untuk Konfirmasi Pemesanan');

        // Redirect to payment confirmation page
        return redirect()->to('payment/confirm')->with('unique_code', $uniqueCode);
    }

    public function validatePayment()
    {
        // Ambil unique code dari form submission
        $uniqueCode = $this->request->getPost('unique_code_input');

        // Ambil idmember dari sesi yang sedang login
        $idmember = session()->get('idmember');

        $orderModel = new OrderModel();

        // Validasi order berdasarkan idmember dan unique code
        $order = $orderModel->where('idmember', $idmember)->where('unique_code', $uniqueCode)->first();

        if ($order) {
            // Jika order valid, ambil detail paket dari database
            $packageModel = new PackageModel();
            $package = $packageModel->find($order['idpackage']);

            // Update status pesanan menjadi 'confirmed'
            $orderModel->update($order['id'], ['status' => 'confirmed']);

            // Lakukan pembaruan keanggotaan di model anggota (contoh)
            $memberModel = new MemberModel();
            $memberModel->updateMembership($idmember, $package['duration']);


            // Redirect dengan pesan sukses
            session()->setFlashdata('pemesanan2', 'Proses Pemesanan disetujui,Membership Berhasil di Perpanjang');

            return redirect()->to('/membershippesan')->with('message', 'Payment confirmed and membership extended!');
        } else {
            // Jika validasi gagal, redirect dengan pesan error
            return redirect()->to('/payment/confirm')->with('error', 'Invalid payment details.');
        }
    }

    public function confirmPayment()
    {
        return view('PilihPaket');
    }

    public function pendingOrders()
    {
        // Instance of OrderModel
        $orderModel = new OrderModel();

        // Get pending orders using the validateOrder method from the model
        $pendingOrders = $orderModel->getPendingOrders();

        // Pass data to the view
        $data['pendingOrders'] = $pendingOrders;

        // Load the view
        return view('ViewKode', $data);
    }
    public function laporanbulanan()
    {
        // Instance dari model OrderModel
        $orderModel = new OrderModel();

        // Mengambil semua laporan bulanan yang sudah dikonfirmasi
        $laporan = $orderModel->getlaporanbulanan();

        // Array untuk menyimpan total pendapatan per idpackage
        $totalPendapatan = [
            'idpackage_1' => 0,
            'idpackage_2' => 0,
            'idpackage_3' => 0,
            // Tambahkan sesuai dengan jumlah idpackage yang Anda miliki
        ];

        // Total keseluruhan pendapatan
        $totalPendapatanKeseluruhan = 0;

        // Iterasi semua laporan untuk menghitung total pendapatan per idpackage
        foreach ($laporan as $order) {
            switch ($order['idpackage']) {
                case 1:
                    $totalPendapatan['idpackage_1'] += 210000;
                    break;
                case 2:
                    $totalPendapatan['idpackage_2'] += 600000;
                    break;
                case 3:
                    $totalPendapatan['idpackage_3'] += 1100000;
                    break;
                    // Tambahkan kasus lain sesuai kebutuhan
                default:
                    // Handle unexpected idpackage values
                    break;
            }

            // Tambahkan ke total keseluruhan pendapatan
            $totalPendapatanKeseluruhan += $totalPendapatan['idpackage_' . $order['idpackage']];
        }

        // Mengirimkan data laporan dan total pendapatan per idpackage ke view
        $data['laporan'] = $laporan;
        $data['totalPendapatan'] = $totalPendapatan;
        $data['totalPendapatanKeseluruhan'] = $totalPendapatanKeseluruhan;

        // Load view 'ViewLaporanBulanan' dengan data
        return view('ViewLaporanBulanan', $data);
    }
}

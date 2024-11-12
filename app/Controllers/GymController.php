<?php

namespace App\Controllers;

class GymController extends BaseController
{
    public function Proses()
    {
        $data = [
            'title' => 'Bayar',
        ];
        return view('DashboardPemilik', $data);
    }
    public function pembayaran()
    {
        $data = [
            'title' => 'Bayar',
        ];
        return view('MenuPembayaran1', $data);
    }
}

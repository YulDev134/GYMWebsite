<?php

namespace App\Controllers;

use App\Models\MemberModel;

class InformasiController extends BaseController
{
    public function awalan()
    {

        $data = [
            'title' => 'Selamat Datang di gym go',
        ];
        return view('MenuInformasi', $data);
    }
}

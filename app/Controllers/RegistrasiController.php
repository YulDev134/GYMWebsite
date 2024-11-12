<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MemberModel;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Register');
    }

    public function submit()
    {
        $memberModel = new MemberModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'full_name' => $this->request->getPost('full_name'),
            'birth_date' => $this->request->getPost('birth_date'),
            'address' => $this->request->getPost('address'),
            'no_telepon' => $this->request->getPost('no_telepon'),
        ];

        if ($memberModel->register($data)) {
            return redirect()->to('login')->with('success', 'Registrasi berhasil, silakan login.');
        } else {
            return redirect()->back()->with('error', 'Registrasi gagal, silakan coba lagi.');
        }
    }
}

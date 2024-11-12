<?php

namespace App\Controllers;

use App\Models\MemberModel;

class MemberController extends BaseController
{
    protected $memberModel;


    public function __construct()
    {


        $validation = \Config\Services::validation();
        $this->memberModel = new MemberModel();
    }
    public function profilmember()
    {
        // $validation = \Config\Services::validation()
        $data = [
            'title' => 'profilmember',

        ];
        return view('ProfileMember', $data);
    }
    public function dashboard()
    {
        $data = [
            'title' => 'Dashboardmember',
        ];
        // Tampilkan halaman dashboard member
        return view('DashboardMember', $data);
    }

    //ini terbaru
    public function deleteMember($idmember)
    {
        $db = \Config\Database::connect();
        $db->transStart();  // Memulai transaksi

        // Hapus pesanan yang terkait dengan anggota
        $orderModel = new \App\Models\OrderModel();
        $orderModel->where('idmember', $idmember)->delete();

        // Hapus anggota
        $memberModel = new \App\Models\MemberModel();
        $memberModel->delete($idmember);

        $db->transComplete();  // Menyelesaikan transaksi

        if ($db->transStatus() === FALSE) {
            session()->setFlashdata('gagalhapus', 'Member Gagal Di Hapus Silahkan Coba Lagi!');
            return redirect()->back()->with('error', 'Gagal menghapus anggota.');
        } else {
            session()->setFlashdata('sukseshapus', 'Member Berhasil Di Hapus!');
            return redirect()->back()->with('success', 'Anggota berhasil dihapus.');
        }
    }

    public function listMembers()
    {
        // Instance dari model MemberModel
        $memberModel = new MemberModel();
        $limit = $this->request->getGet('limit') ?? 10;

        // Ambil data member dengan batasan limit
        $members = $memberModel->findAll($limit);


        // Ambil data member dengan field-field tertentu
        $members = $memberModel->select('idmember, username, full_name, membership_status, membership_end_date')
            ->findAll();

        // Kirim data ke view
        $data['members'] = $members;

        // Load view 'list_members' dengan data
        return view('AdminViewMember', $data, [
            'members' => $members,
            'limit' => $limit
        ]);
    }

    public function edit($id)
    {
        $data['member'] = $this->memberModel->getMember($id);
        return view('admin/member/edit', $data);
    }


    public function index()
    {
        $memberModel = new MemberModel();
        $data['members'] = $memberModel->getSelectedMembers; // Ambil semua data member
        $data['keyword'] = ''; // Inisialisasi keyword kosong

        return view('AdminViewMember', $data);
    }

    // public function index()
    // {
    //     $memberModel = new MemberModel();
    //     $data = [
    //         'members' => $memberModel->getMembers() // Ambil semua data member
    //     ];
    //     return view('AdminViewMember', $data);
    // }



    public function register()
    {
        // helper(['form']);
        if (!$this->validate([
            // // Validasi input
            // $validation->setRules([
            'username' => [
                'rules' => 'required|alpha_numeric|min_length[3]|is_unique[members.username]|not_in_list[admin,pemilik]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'alpha_numeric' => '{field} hanya boleh mengandung huruf dan angka.',
                    'min_length' => '{field} minimal 3 karakter.',
                    'is_unique' => '{field} sudah digunakan.',
                    'not_in_list' => 'Username tidak boleh "admin" atau "pemilik".'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[members.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'valid_email' => '{field} harus berupa email yang valid.',
                    'is_unique' => '{field} sudah digunakan.'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal 3 karakter.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*\d).+$/]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal 8 karakter.',
                    'regex_match' => '{field} harus kombinasi karakter besar, kecil, dan angka, minimal 8 karakter.'
                ]
            ],
            'UlangPsw' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'matches' => '{field} tidak sesuai dengan password.'
                ]
            ],
            'noTelp' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} harus berupa angka.'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ]
            ],
            'poto' => [
                'rules' => 'uploaded[poto]|max_size[poto,1024]|is_image[poto]|mime_in[poto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Harus upload gambar',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Harus upload gambar',
                    'mime_in' => 'Harus upload gambar dengan format jpg, jpeg, atau png'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/registrasiview')->withInput('validation', $validation);
            return redirect()->to('/registrasiview')->withInput();
        }
        $filepoto = $this->request->getFile('poto');
        $filepoto->move('gambar');
        $namapoto = $filepoto->getName();
        $this->memberModel->save(
            [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'full_name' => $this->request->getVar('nama'),
                'password' => $this->request->getVar('password'),
                'no_telepon' => $this->request->getVar('noTelp'),
                'birth_date' => $this->request->getVar('tanggal_lahir'),
                'adress' => $this->request->getVar('alamat'),
                'potoprofil' => $namapoto
            ]
        );
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/registrasiview'); // Redirect ke halaman login setelah registrasi sukses
        // } else {
        //     // Validasi gagal
        //     $data['validation'] = $validation;
        //     return view('Register', $data);
        // }
    }

    public function registrasiview()
    {
        // session();
        $data = [
            'title' => 'Registrasi Member',
            'validation' => \Config\Services::validation()
        ];
        // Tampilkan halaman dashboard member
        return view('Register', $data);
    }



    public function editMember($id)
    {
        $session = session();
        $validation = \Config\Services::validation();

        $rules = [
            'username'       => 'required|min_length[3]|max_length[50]',
            'email'          => 'required|valid_email',
            'nama'           => 'required|min_length[3]|max_length[100]',
            'password'       => 'permit_empty|min_length[8]',
            'UlangPsw'       => 'matches[password]',
            'noTelp'         => 'required|min_length[10]|max_length[15]',
            'tanggal_lahir'  => 'required|valid_date',
            'alamat'         => 'required',
            'poto'           => 'permit_empty|is_image[poto]|mime_in[poto,image/jpg,image/jpeg,image/png]',
        ];

        if ($this->request->getMethod() === 'post') {
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $validation);
            }

            $memberModel = new MemberModel();

            // Handle file upload
            $file = $this->request->getFile('potoprofil');
            if ($file->isValid() && !$file->hasMoved()) {
                $fileName = $file->getRandomName();
                $file->move('gambar', $fileName);
            } else {
                $fileName = $this->request->getPost('old_poto');
            }

            $data = [
                'username'      => $this->request->getVar('username'),
                'email'         => $this->request->getVar('email'),
                'full_name'          => $this->request->getVar('nama'),
                'no_telepon'        => $this->request->getVar('noTelp'),
                'birth_date' => $this->request->getVar('tanggal_lahir'),
                'adress'        => $this->request->getVar('alamat'),
                'potoprofil'          => $fileName,
            ];


            if ($memberModel->update($id, $data)) {
                return redirect()->to('/profile')->with('message', 'Profile updated successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to update profile');
            }
        }

        $data['validation'] = $validation;
        return view('ProfileMember', $data);
    }
}

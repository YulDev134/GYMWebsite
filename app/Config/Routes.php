<!-- <?php

        use App\Controllers\AdminController;
        use App\Controllers\MemberController;
        use App\Controllers\PemilikController;
        use CodeIgniter\Router\RouteCollection;

        /**
         * @var RouteCollection $routes
         */

        // $routes->get('/', 'Home::index');
        // Route untuk halaman utama (menuInformasi)
        $routes->get('/', 'InformasiController::awalan');


        $routes->get('/login', 'LoginController::index');
        $routes->post('/login', 'LoginController::index');

        // Route untuk proses login (POST)
        $routes->post('loginCek', 'LoginController::login');

        // Route untuk halaman registrasi (GET)
        // $routes->get('/register', 'LoginController::register');

        // Route untuk proses registrasi (POST)
        $routes->get('/logout', 'InformasiController::awalan');

        // R/ Route untuk admin
        $routes->group('admin', function ($routes) {
                $routes->add('dashboard', [AdminController::class, 'dashboard']);
                // Tambahkan route lain untuk fitur admin jika diperlukan
        });

        // Route untuk pemilik
        $routes->group('pemilik', function ($routes) {
                $routes->add('dashboard', [PemilikController::class, 'dashboard']);
                // Tambahkan route lain untuk fitur pemilik jika diperlukan
        });

        // Route untuk member
        $routes->group('member', function ($routes) {
                $routes->add('dashboard', [MemberController::class, 'dashboard']);
                // Tambahkan route lain untuk fitur member jika diperlukan
        });


        //routes untuk admin user
        $routes->get('/lihatpresensi', 'PresensiController::lihatpresensi');
        // $routes->get('/lihatmember', 'MemberController::listMembers');
        $routes->get('/profiladmin', 'AdminController::profiladmin');
        $routes->get('/dashboardadmin', 'AdminController::dashboard');

        // $routes->get('/register', 'LoginController::register');
        // $routes->post('/registercek', 'LoginController::registercek');

        $routes->get('membercontroller/detail/(:num)', 'MemberController::detail/$1');

        $routes->get('/admin/members', 'Admin\MemberController::index');
        $routes->get('/admin/search', 'Admin\MemberController::search'); // Untuk fitur pencarian
        $routes->get('/profile/editmember/(:segment)', 'MemberController::editMember/$1');
        $routes->post('/profile/editmember/(:segment)', 'MemberController::editMember/$1');

        //routes untuk member
        $routes->get('/profil', 'MemberController::profilmember');
        $routes->get('/dashboardmember', 'MemberController::dashboard');
        $routes->get('/dashboardmember', 'MemberController::dashboard');
        // $routes->get('/membership', 'PaymentController::choosePackage');
        $routes->get('/register', 'MemberController::register');
        $routes->post('/registermember', 'MemberController::register');
        $routes->get('/registrasiview', 'MemberController::registrasiview');


        // Routes file
        $routes->get('/membershippesan', 'PaymentController::pilihpaket');
        $routes->post('/membership/order', 'PaymentController::processOrder');
        $routes->get('/payment/confirm', 'PaymentController::confirmPayment');
        $routes->post('/payment/validate', 'PaymentController::validatePayment');


        //admin melihet kode unik member
        $routes->group('admin', function ($routes) {
                $routes->get('orders/pending', 'PaymentController::pendingOrders');
                $routes->get('admin/orders/pending', 'PaymentController::pendingOrders');
        });

        // $routes->group('pemilik', function ($routes) {
        // $routes->get('laporan/view', 'PaymentController::laporanbulanan');
        $routes->get('/pemiliklaporan', 'PaymentController::laporanbulanan');
        // });
        // $routes->group('admin', function ($routes) {
        $routes->get('lihatmember', 'MemberController::listMembers');
        // $routes->get('deleteMember/(:num)', 'MemberController::deleteMember/$1');
        $routes->get('/admin/deleteMember/(:num)', 'MemberController::deleteMember/$1');

        $routes->get('admin/catatpresensi/(:num)/(:num)', 'PresensiController::catatpresensi/$1/$2');
        $routes->get('presensi/hapus/(:num)', 'PresensiController::hapuspresensi/$1');
        // });

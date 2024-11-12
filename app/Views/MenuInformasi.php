<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GYM GO</title>
    <link href="<?= base_url('css/MenuInformasi.css') ?>" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: Poppins;
            background: url("/gambar/bgAwal.png") no-repeat center center/cover;
            padding: 50px 0;
            background-repeat: no-repeat;
            background-size: cover;
            /* Menyesuaikan ukuran gambar agar menutupi seluruh latar belakang */
            background-attachment: fixed;
            /* Membuat latar belakang tetap */
            background-position: center;
        }
    </style>
</head>

<body style="height:2000px">
    <nav class="navbar navbar-expand-sm bg-blue navbar-dark fixed-top">
        <a class="navbar-brand">
            <img src="<?= base_url('gambar/LogoGym.png') ?>" alt="logo">
        </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/registrasiview" style="color: black;">Register</a>
            </li>
            <li class="nav-login">
                <a class="nav-link" href="/login" style="color: black;">Login</a>
            </li>
        </ul>
    </nav>

    <div class="judul">
        <h1>Welcome To Gym-Go</h1>
    </div>
    <div class="container">

        <section class="info">
            <div class="logo">
                <img src="/gambar/LogoGym.png" alt="Gym GO Logo">
                <h2>GYM-GO</h2>
                <p>HEALTHY LIFE</p>
            </div>
            <div class="details">
                <header>
                    <h1 style="color: yellow;">Energy is for everyone!</h1>

                    <h3>GYM GO Untuk Pria dan Wanita</h3>
                    <p>Pusat Kebugaran Stamina Gym menyediakan pelatihan dan pengkondisian yang tepat bagi para anggota
                        yang
                        ingin meningkatkan dan mengubah tubuh mereka dengan program yang tergantung pada komposisi
                        tubuh.
                    </p>
                    <div class="hours">
                        <h4>07.00 /sd 21.00</h4>
                    </div>
                    <address>
                        <p>Alamat: Jalan Kaki Saja No.69</p>
                        <p>Email: gymgo@gmail.com</p>
                        <p>Contact Number: 080808080808</p>
                    </address>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
            </div>
        </section>

        <div class="foto">
            <img src="ffoto6.jpeg" class="float-left" alt="Paris" width="304" height="236">
            <img src="foto7.jpeg" class="float-center" alt="Paris" width="304" height="236">
        </div>


        <div class="announcement">
            <p>Pengumuman: Tanggal 17 Juni 2024 Gym tidak buka dikarenakan libur Idul Adha <i class="material-icons">&#xe85a;</i></p>
        </div>

        <div class="membership-options">
            <h4>Paket Membership</h4>

            <div class="bulan1" id="one-month">
                <i class="fas fa-user-shield fa-3x text-primary"></i>
                <h3>1 Bulan</h3>
            </div>
            <div class="bulan3" id="three-months">
                <i class="fas fa-crown fa-3x text-warning"></i>
                <h3>3 Bulan</h3>
            </div>
            <div class="bulan6" id="six-months">
                <i class="fas fa-crown fa-3x text-danger"></i>
                <h3>6 Bulan</h3>
            </div>
        </div>
        <div class="menu">
            <a href='/login'>Join Sekarang!!</a>
        </div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
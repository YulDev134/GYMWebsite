<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            transition: margin-left 0.3s ease-in-out;
        }

        .sidebar {
            background-color: hsl(235, 37%, 51%);
            width: 250px;
            height: 100vh;
            position: fleksix;
            top: 0;
            left: -250px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            padding-top: 20px;
            transition: left 0.3s ease-in-out;
        }

        .sidebar.open {
            left: 0;
        }

        .menu-icon {
            font-size: 24px;
            cursor: pointer;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }

        .sidebar img.user-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            margin: 10px 0;
            text-align: center;
            width: 100%;
            padding: 10px 0;
            border-radius: 5px;
        }

        .sidebar a:hover {
            background-color: #2292bd;
            color: #2b2d42;
        }

        .container {
            margin-left: 0;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        .container.shifted {
            margin-left: 250px;
        }

        .header {
            background-color: #2b2d42;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .form-container,
        .table-container {
            background-color: #bac3c7;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-container input {
            width: 150px;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            background-color: #2b2d42;
            color: white;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #8d99ae;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70%;
                left: -70%;
            }

            .sidebar.open {
                left: 0;
            }

            .menu-icon {
                display: block;
            }

            .container.shifted {
                margin-left: 70%;
            }
        }

        .header .header2 {
            width: 500px;
            background-color: #2292bd;
            text-align: center;
            border-radius: 30px;
        }

        .logout {
            width: 100%;
            padding: 130px;
        }
    </style>
</head>

<body>
    <i id="menu-icon" class="fas fa-bars menu-icon"></i>
    <div class="sidebar" id="sidebar">
        <img src="yul.jpg" alt="User Photo" class="user-photo">
        <h4>Nama Pemilik Gym</h4>
        <h5>Yulius3@gmail.com</h5>
        <a href="#dashboard" onclick="showSection('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#informasi-gym" onclick="showSection('informasi-gym')"><i class="fas fa-info-circle"></i> Informasi
            Gym</a>
        <a href="#laporan-bulanan" onclick="showSection('laporan-bulanan')"><i class="fas fa-calendar-alt"></i> Laporan
            Bulanan</a>
        <div class="logout">
            <a href="#logout" onclick="showSection('logout')"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    <div class="container" id="main-content">
        <div id="dashboard" class="content-section">
            <div class="header">
                <h1 class="ml-3">Dashboard</h1>
            </div>
            <!-- Dashboard content here -->
        </div>
        <div id="informasi-gym" class="content-section" style="display: none;">
            <div class="header">
                <h1 class="ml-3">Informasi Gym</h1>
            </div>
            <div class="form-container">
                <form>
                    <div class="form-group">
                        <label for="jenis-informasi">Jenis Informasi</label>
                        <select id="jenis-informasi" class="form-control">
                            <option value="promo">Promo</option>
                            <option value="jam-operasional">Jam Operasional</option>
                            <option value="registrasi">Registrasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="masukan-perubahan">Masukan Perubahan</label>
                        <input type="text" id="masukan-perubahan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="upload-gambar">Upload Gambar</label>
                        <input type="file" id="upload-gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <button type="button" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
            <div class="table-container">
                <h3>Daftar Informasi Gym</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Informasi</th>
                            <th>Jenis Informasi</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12345</td>
                            <td>Promo</td>
                            <td>10-01-2023</td>
                        </tr>
                        <tr>
                            <td>12346</td>
                            <td>Alat</td>
                            <td>10-01-2023</td>
                        </tr>
                        <tr>
                            <td>12347</td>
                            <td>Jam Operasional</td>
                            <td>10-01-2023</td>
                        </tr>
                        <tr>
                            <td>12348</td>
                            <td>Registrasi</td>
                            <td>10-01-2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="laporan-bulanan" class="content-section" style="display: none;">
            <div class="header">
                <h1 class="ml-3">Laporan Bulanan</h1>
            </div>
            <div class="form-container">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="from-date" class="mr-2">From Date</label>
                        <input type="date" class="form-control" id="from-date">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="to-date" class="mr-2">To Date</label>
                        <input type="date" class="form-control" id="to-date">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </form>
            </div>
            <div class="table-container">
                <h2>laporan Bulanan</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Member ID</th>
                            <th>Jenis Membership</th>
                            <th>Tanggal Transaksi</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MARULIS</td>
                            <td>SM320931</td>
                            <td>1 Month - PT</td>
                            <td>10-01-2023</td>
                            <td>6000</td>
                        </tr>
                        <tr>
                            <td>YULIANA</td>
                            <td>SM320932</td>
                            <td>6 Months - PT</td>
                            <td>11-01-2023</td>
                            <td>30000</td>
                        </tr>
                        <tr>
                            <td>YESSYA</td>
                            <td>SM320933</td>
                            <td>1 Month - M</td>
                            <td>12-01-2023</td>
                            <td>5000</td>
                        </tr>
                        <tr>
                            <td>DANIEL</td>
                            <td>SM320934</td>
                            <td>3 Months</td>
                            <td>15-01-2023</td>
                            <td>15000</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-warning" style="margin-right: 100px;">Kembali</button>
                <button class="btn btn-warning" style="margin-right: 100px;">Edit</button>
                <button class="btn btn-warning">Hapus</button>
            </div>
        </div>
        <div id="logout" class="content-section" style="display: none;">
            <div class="header">
                <h1 class="ml-3">Logout</h1>
            </div>
            <!-- Logout content here -->
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(function(section) {
                section.style.display = 'none';
            });
            // Show the selected section
            document.getElementById(sectionId).style.display = 'block';
        }

        document.getElementById('menu-icon').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('main-content').classList.toggle('shifted');
        });
    </script>
</body>

</html>
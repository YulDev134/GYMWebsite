<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="StylePemilik.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .sidebar {
            background-color: hsl(235, 37%, 51%);
            width: 20%;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: white;
            padding-top: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1000;
        }
        .sidebar img.logo {
            width: 200px;
            margin-bottom: 20px;
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
            width: 300px;
        }

        .container {
            margin-left: 20%;
            padding: 20px;
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

        .table th {
            color: rgb(1, 1, 1);
        }

        .form-row {
            margin-right: 200px;
        }

        .btn-warning {
            border: 2px solid black;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70%;
                transform: translateX(-100%);
            }

            .sidebar.hidden {
                transform: translateX(-100%);
            }

            .menu-icon {
                display: block;
            }

            .container {
                margin-left: 0;
            }
        }

        .header .header2 {
            width: 500px;
            background-color: #2292bd;
            align-items: 500px;
            text-align: center;
            border-radius: 30px;
        }

.cari {
    align-items: 400px;
}
</style>
</head>

<body>
<i id="menu-icon" class="fas fa-bars menu-icon"></i>
<div class="sidebar" id="sidebar">
<img src="yul.jpg" alt="User Photo" class="user-photo">
<h4>Admin</h4>
<h5>Yulius3@gmail.com</h5>
<a href="#dashboard" onclick="showSection('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
<a href="#admin-profile" onclick="showSection('admin-profile')"><i class="fas fa-info-circle"></i> Admin Profile</a>
<a href="#view-members" onclick="showSection('view-members')"><i class="fas fa-calendar-alt"></i> View Members</a>
<a href="#logout" onclick="showSection('logout')"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="container">

<div id="dashboard" class="content-section">
    <div class="header">
        <h1 class="ml-3">Dashboard</h1>
    </div>
    <!-- Dashboard content here -->
</div>
<div id="admin-profile" class="content-section" style="display: none;">
            <div class="header">
                <div class="header1">
                    <h1 class="ml-3">Admin Profile</h1>
                </div>
            </div>
            <div class="main-content">
                <header>
                    <h2>Admin Profile</h2>
                </header>
                <section class="info-form">
                    <div class="form-container">
                        <div class="button">
                            <button class="btn btn-primary">Tambah</button>
                            <button class="btn btn-danger">Hapus</button>
                            <button class="btn btn-warning">Edit</button>
                        </div>
                        <form>
                            <div class="jenisInfo">
                                <label for="jenis-informasi">Jenis Informasi</label>
                                <select id="jenis-informasi" class="form-select">
                                    <option value="promo">Promo</option>
                                    <option value="jam-operasional">Jam Operasional</option>
                                    <option value="registrasi">Registrasi</option>
                                </select>
                                <label for="masukan-perubahan">Masukan Perubahan</label>
                                <input type="text" id="masukan-perubahan" class="form-control">
                                <label for="upload-gambar">Upload Gambar</label>
                                <input type="file" id="upload-gambar" class="form-control">
                            </div>
                            <div class="form-actions mt-3">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                <button type="button" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="info-list mt-4">
                    <h3>DAFTAR Admin Profile</h3>
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
                </section>
            </div>
        </div>

        <div id="view-members" class="content-section" style="display: none;">
            <div class="header">
                <div class="header2">
                    <h1 class="ml-3">View Members</h1>
                </div>
            </div>
            <div class="form-container">
                <form class="row g-3">
                    <div class="col-auto">
                        <label for="from-date" class="visually-hidden">From Date</label>
                        <input type="date" class="form-control" id="from-date">
                        </div>
                    <div class="col-auto">
                        <label for="to-date" class="visually-hidden">To Date</label>
                        <input type="date" class="form-control" id="to-date">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>
            <div class="table-container mt-4">
                <h2>Catatan Transaksi</h2>
                <table class="table table-bordered">
                    <div class="jenisInfo">
                        <label for="jumlah-baris">Jumlah Baris</label>
                        <select id="jumlah-baris" class="form-select">
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
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
                <button class="btn btn-danger">Hapus</button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.min.js"></script>
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
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
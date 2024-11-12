<?= $this->extend('layout/TemplateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>
<link href="<?= base_url('css/ProfileMember.css') ?>" rel="stylesheet">

<style>
    .hidden {
        display: none;
    }
</style>

<body>
    <div class="container p-3">
        <h1 style="margin: auto; text-align: center;">Admin Profile</h1>
    </div>
    <div class="container p-3">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0 gray-background">
                    <div class="card-body profile-info">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0 text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile Picture" class="profile-image" style="border: 2px solid #000;">
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                    <h3 class="h2 mb-0">Santok Ganteng</h3>
                                    <span class="">
                                        <h4>Admin</h4>
                                    </span>
                                </div>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Tanggal Lahir:</span> <?= htmlspecialchars($birth_date) ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> <?= htmlspecialchars($email) ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Alamat:</span><?= htmlspecialchars($adress) ?></li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Akhir Masa Berlaku:</span> </span><?= htmlspecialchars($membership_end_date) ?></li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span></span><?= htmlspecialchars($no_telepon) ?></li>
                                    <li class="edit-button">
                                        <span>
                                            <button class="btn btn-primary" id="edit-profile-btn">Edit Profile</button>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="edit-profile-form" class="hidden" style="margin-top: 75px;">
                    <!-- Profile Edit Form -->
                    <div class="container p-5 gray-background form-edit">
                        <h2>Edit Profile Admin</h2>
                        <form action="/profile">
                            <div class="form-group">
                                <label for="name">Nama:</label>
                                <input type="text" class="form-control" id="name" placeholder="Masukkan nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Masukkan nomor telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat:</label>
                                <textarea class="form-control" id="address" rows="3" placeholder="Masukkan alamat" required></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="nomorTelp">Nomor Telepon:</label>
                                        <input type="text" class="form-control" id="nomorTelp" placeholder="Masukkan nomor telepon" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="dob">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="dob" required>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <div class="profile-pic">
                                    <div class="upload-button">
                                        <i class="fas fa-camera"></i>
                                        <input type="file" id="photo" accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center; margin-bottom: -20px;">
                                <button type="submit" class="btn btn-primary" style="text-align: center;">Simpan Perubahan</button>
                                <button type="button" class="btn" id="cancel-edit" style="text-align: center; background-color: red; color: white;">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('edit-profile-btn').addEventListener('click', function() {
            document.getElementById('edit-profile-form').classList.toggle('hidden');
        });

        document.getElementById('cancel-edit').addEventListener('click', function() {
            document.getElementById('edit-profile-form').classList.add('hidden');
        });
    </script>
    <?= $this->endSection(); ?>
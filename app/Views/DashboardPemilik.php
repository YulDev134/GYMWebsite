<?= $this->extend('layout/TemplatePemilik'); ?>

<?= $this->section('contentPemilik'); ?>
<?php
$session = session();
$userData = $session->get();
// print_r($userData);
?>
<link href="<?= base_url('css/DashboardPemilik.css') ?>" rel="stylesheet">
<div class="container-dashboard">
    <div class="dashboard" style="border-radius: 5px; border: black;">
        <div class="header">
            <h2>Dashboard Gym-Go</h2>
        </div>
        <div class="informasi-pemilik">
            <h3>Informasi Pemilik</h3>
            <img src="foto2.jpeg" alt="Profile Picture" class="profile-picture">
            <h4>Contact Pemilik : <?= $session->get('no_telepon') ?></h4>
            <h4><?= $session->get('full_name') ?></h4>
        </div>
        <div class="membership-gym">
            <h3 style="color: white;">MEMBERSHIP GYM-GO</h3>
            <div class="membership-options">
                <div class="option">
                    <i class="fas fa-user-shield fa-3x text-primary"></i>
                    <p>1 Bulan</p>
                    <p>Harga: Rp 210.000</p>
                </div>
                <div class="option">
                    <i class="fas fa-crown fa-3x text-warning"></i>
                    <p>3 Bulan</p>
                    <p>Harga: Rp 600.000</p>
                </div>
                <div class="option">
                    <i class="fas fa-crown fa-3x text-warning"></i>
                    <p>6 Bulan</p>
                    <p>Harga: Rp 1.100.000</p>
                </div>
            </div>

            <div class="informasi-gym">
                <div class="card">
                    <h3>Data Member</h3>
                    <p>Jumlah Member terjual: <span id="keanggotaan-terjual">500</span></p>
                    <p>Pendapatan Penjualan member: <span id="pendapatan-keanggotaan">Rp 10.000.000</span></p>
                </div>
                <div class="pelanggan">
                    <h3>Data Member</h3>
                    <p>Jumlah Member aktif: <span id="pelanggan-aktif">1000</span></p>
                    <p>Tren Member tidak aktif : <span id="tren-pertumbuhan">10%</span></p>
                </div>

            </div>
        </div>
        <?= $this->endSection(); ?>
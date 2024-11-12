<!DOCTYPE html>
<html lang="en">
<?php
$session = session();
$userData = $session->get();
// print_r($userData);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="<?= base_url('css/StylePemilik.css') ?>" rel="stylesheet">
    <?php $session = session(); ?>
</head>

<body>
    <i id="menu-icon" class="fas fa-bars menu-icon"></i>
    <div class="sidebar" id="sidebar">
        <img src="yul.jpg" alt="User Photo" class="user-photo">

        <h3><?= $session->get('username') ?></h3>
        <h4><?= $session->get('email') ?></h4>
        <a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="#informasi-gym"><i class="fas fa-info-circle"></i> Informasi Gym</a>
        <a href="<?= site_url('/pemiliklaporan'); ?>"><i class="fas fa-calendar-alt"></i> Laporan Bulanan</a>
        <a href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>
    <?= $this->renderSection('contentPemilik'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content-section').forEach(function(section) {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }

        document.getElementById('menu-icon').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('main-content').classList.toggle('shifted');
        });

        function ShowSidebar(nSection) {
            document.querySelectorAll('.menu-icon').forEach(function(section) {
                section.style.display = 'none';
            });
            document.getElementById(nSection).style.display = 'block';
        }

        document.getElementById('sidebar').addEventListener('click', function() {
            document.getElementById('main-content').classList.toggle('open');
            document.getElementById('sidebar').classList.toggle('shifted');
        });
    </script>
</body>

</html>
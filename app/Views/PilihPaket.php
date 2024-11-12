<?= $this->extend('layout/TemplateMember'); ?>

<?= $this->section('contentMember'); ?>
<link href="<?= base_url('css/MenuPembayaran1.css') ?>" rel="stylesheet">

<!DOCTYPE html>
<html>

<head>
    <title>Choose Package</title>
</head>

<body>
    <div class="header">
        <h1>PILIHAN MEMBERSHIP GYM-GO</h1>
    </div>
    <div class="container-fluid" id="main-content">
        <div class="main">
            <?php if (session()->getFlashdata('pemesanan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pemesanan'); ?>
                </div>
            <?php endif; ?>
            <div class="membership-options">
                <div class="bulan1">
                    <div class="membership-option" id="one-month"><i class="fas fa-user-shield fa-3x text-primary"></i>
                        <h3>1 Bulan</h3>
                        <p><b>Harga: Rp 210000</b></p>
                    </div>
                </div>
                <div class="bulan3">
                    <div class="membership-option selected" id="three-months"><i class="fas fa-crown fa-3x text-warning"></i>
                        <h3>3 Bulan</h3>
                        <p><b>Harga: Rp 600000</b></p>
                    </div>
                </div>
                <div class="bulan6">
                    <div class="membership-option" id="six-months"><i class="fas fa-crown fa-3x text-danger"></i>
                        <h3>6 Bulan</h3>
                        <p><b>Harga: Rp 1100000</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="membership-options">
            <form id="membership-form" action="/membership/order" method="post">
                <?= csrf_field() ?>
                <label for="package">Select Package:</label>
                <select name="package_id" id="package">
                    <option value="1">1 Bulan - Rp 210000</option>
                    <option value="2">3 Bulan - Rp 600000</option>
                    <option value="3">6 Bulan - Rp 1100000</option>
                </select>
                <div class="details">
                    <p id="purchase-detail"><b>Pembelian: Paket 3 Bulan</b></p>
                    <p id="price-detail"><b> Rp 600000</b></p>
                </div>
                <div class="code" id="code-container" style="display:none;">
                    <input type="hidden" id="unique_code" name="unique_code">
                </div>
                <div class="buttons">
                    <button type="button" id="proceed-button" class="btn btn-primary">Proses Order Membership</button>
                    <!-- onclick="return confirm('apakah anda yakin ingin memesan paket membership tersebut?'); -->
                </div>
            </form>
        </div>

        <?php if (session()->getFlashdata('pemesanan2')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pemesanan2'); ?>
            </div>
        <?php endif; ?>
        <form class="membership-options" id="validation-form" action="/payment/validate" method="post">
            <?= csrf_field() ?>
            <div class="container-fluid">
                <h5>Setelah Process Order selesai, Silahkan Meminta Kode Unik Kepada Admin di Gym</h5>
                <label for="unique_code_input">Masukin Kode Unik:</label>
                <input type="text" id="unique_code_input" name="unique_code_input" required>
                <button type="submit">Validasi pembayaran</button>
                <!-- <button type="submit" class="btn btn-success">Konfirmasi Kode</button> -->
            </div>
        </form>
    </div>
    </div>

    <script>
        // Add interactivity to the membership options
        const options = document.querySelectorAll('.membership-option');
        const packageSelect = document.getElementById('package');
        const purchaseDetail = document.getElementById('purchase-detail');
        const priceDetail = document.getElementById('price-detail');
        const proceedButton = document.getElementById('proceed-button');
        const codeContainer = document.getElementById('code-container');
        const uniqueCodeInput = document.getElementById('unique_code');

        options.forEach(option => {
            option.addEventListener('click', () => {
                options.forEach(opt => opt.classList.remove('selected'));
                option.classList.add('selected');
                updateDetails(option.id);
            });
        });

        function updateDetails(selection) {
            switch (selection) {
                case 'one-month':
                    packageSelect.value = "1";
                    purchaseDetail.innerText = 'Pembelian: Paket 1 Bulan';
                    priceDetail.innerText = 'Harga: Rp 210000';
                    break;
                case 'three-months':
                    packageSelect.value = "2";
                    purchaseDetail.innerText = 'Pembelian: Paket 3 Bulan';
                    priceDetail.innerText = 'Harga: Rp 600000';
                    break;
                case 'six-months':
                    packageSelect.value = "3";
                    purchaseDetail.innerText = 'Pembelian: Paket 6 Bulan';
                    priceDetail.innerText = 'Harga: Rp 1100000';
                    break;
                default:
                    break;
            }
        }

        proceedButton.addEventListener('click', () => {
            // Simpan data order ke database
            document.getElementById('membership-form').submit();

            // Generate a unique code for the payment
            const code = Math.floor(100000 + Math.random() * 900000).toString();
            uniqueCodeInput.value = code;

            // Show the validation form
            document.getElementById('validation-form').style.display = 'block';
        });
    </script>
</body>

</html>

<?= $this->endSection(); ?>
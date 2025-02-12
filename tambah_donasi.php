<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Tambah Donasi</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a href="index.php" class="navbar-brand text-white fw-bold">UMS Peduli</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </nav>
    <div class="container">
        <center>
            <h1>Tambah Data Donasi</h1>
        </center>

        <form action="" method="post">
            <label for="tbNamaPengirim">Nama Pengirim</label>
            <input type="text" id="tbNamaPengirim" name="nama" class="form-control">
            <label for="tbNominal">Nominal</label>
            <input type="number" id="tbNominal" name="nominal" class="form-control">
            <!-- : sebagai type, . sebagai class # sebagai id -->
            <label>Metode Pembayaran</label>
            <div class="form-check">
                <label for="tbShopee" class="form-label">Shopeepay</label>
                <input type="radio" name="metode" id="tbShopee" class="form-check-input" value="Shopeepay">
            </div>
            <div class="form-check">
                <label for="tbQris" class="form-label">Qris</label>
                <input type="radio" name="metode" id="tbQris" class="form-check-input" value="Qris">
            </div>
            <div class="form-check">
                <label for="tbGopay" class="form-label">Gopay</labe1>
                    <input type="radio" name="metode" id="tbGopay" class="form-check-input" value="Gopay">
            </div>
            <div class="form-check">
                <label for="tbTransfer" class="form-label">Transfer</label>
                <input type="radio" name="metode" id="tbTransfer" class="form-check-input" value="Transfer">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-secondary">Reset Form</button>
        </form>

        <script src="js/bootstrap.min.js"></script>
    </div>
</body>

</html>

<?php
session_start();
if ($_SESSION['is_login'] != true) {
    header("Location:login.php?pesan=Silakan Login terlebih dahulu");
}
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    $query = "INSERT INTO donasi(nama, nominal, metode) VALUES ('$nama', $nominal, '$metode')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location:data_donasi.php");
    }
}

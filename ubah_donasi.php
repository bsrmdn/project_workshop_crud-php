<?php
session_start();
if ($_SESSION['is_login'] != true) {
    header("Location:login.php?pesan=Silakan Login terlebih dahulu");
}
include 'koneksi.php';
$id = $_GET['id'];

$query = "SELECT * FROM donasi WHERE id=$id";
$result = mysqli_query($conn, $query);
$data_donasi = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset-"UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Donasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
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

        <form action="" method="POST">
            <label for="tbNamaPengirim">Nama Pengirim</label>
            <input type="text" id="tbNamaPengirim" name="nama" class="form-control" value=" <?= $data_donasi['nama'] ?>">
            <label for="tbNominal">Nominal</label>
            <input type="number" id="tbNominal" name="nominal" class="form-control" value=" <?= $data_donasi['nominal'] ?>">
            <label>Metode Pembayaran</label>
            <div class="form-check">
                <label for="tbShopee" class="form-label">Shopeepay</label>
                <input type="radio" name="metode" id="tbShopee" class="form-check-input" value="Shopeepay"
                    <?php if ($data_donasi['metode'] == 'Shopeepay') {
                        echo 'checked';
                    } ?>>
            </div>
            <div class="form-check">
                <label for="tbQris" class="form-label">Qris</label>
                <input type="radio" name="metode" id="tbQris" class="form-check-input" value="Qris"
                    <?php if ($data_donasi['metode'] == 'Qris') {
                        echo 'checked';
                    } ?>>
            </div>
            <div class="form-check">
                <label for="tbGopay" class="form-label">Gopay</label>
                <input type="radio" name="metode" id="tbGopay" class="form-check-input" value="Gopay"
                    <?php if ($data_donasi['metode'] == 'Gopay') {
                        echo 'checked';
                    } ?>>
            </div>
            <div class="form-check">
                <label for="tbTransfer" class="form-label">Transfer</label>
                <input type="radio" name="metode" id="tbTransfer" class="form-check-input" value="Transfer"
                    <?php if ($data_donasi['metode'] == 'Transfer') {
                        echo 'checked';
                    } ?>>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
            <button type="reset" class="btn btn-secondary">Reset Form</button>
        </form>

        <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    $query = "UPDATE donasi SET nama='$nama', nominal=$nominal, metode='$metode' WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location:data_donasi.php");
    }
}
?>
<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Donasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>

<body class="d-flex flex-column vh-100">
    <nav class="navbar navbar-expand-1g bg-dark sticky-top text-white">
        <div class="container">
            <a href="index.php" class="navbar-brand text-white fw-bold">UMS Peduli</a>
            <?php
            session_start();
            if ($_SESSION['is_login'] != true) {
            ?>
                <a href="login.php" class="btn btn-primary">Login</a>
            <?php } else { ?>
                <div>
                    <a href="data_donasi.php" class="btn btn-primary">Dashboard</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            <?php } ?>
        </div>
    </nav>

    <div class="text-white text-center py-5" style="background: url('images/donate.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <h1 class="fw-bold">UMS Peduli</h1>
            <p class="py-2">Yuk, bantu Saudara kita agar dapat mewujudkan mimpinya !</p>

            <div class="row bg-dark border border-light py-2 mt-5">
                <div class="col-md-4">
                    <?php
                    $query = "SELECT SUM(nominal) AS total_donasi FROM donasi";
                    $result = mysqli_query($conn, $query);
                    $total_donasi = mysqli_fetch_array($result);
                    ?>
                    <h3 class="fw-bold">Rp. <?= $total_donasi['total_donasi'] ?></h3>
                    <p class="text-uppercase">Dana Terkumpul</p>
                </div>
                <div class="col-md-4">
                    <?php
                    $query = "SELECT COUNT(*) AS total_donatur FROM donasi";
                    $result = mysqli_query($conn, $query);
                    $total_donatur = mysqli_fetch_array($result);
                    ?>
                    <h3 class="fw-bold"> <?= $total_donatur['total_donatur'] ?></h3>
                    <p class="text-uppercase">donatur tergabung</p>
                </div>
                <div class="col-md-4">
                    <?php
                    $query = "SELECT tgl_diterima FROM donasi ORDER BY tgl_diterima DESC LIMIT 1";
                    $result = mysqli_query($conn, $query);
                    $tgl_diterima = mysqli_fetch_array($result);
                    ?>
                    <h3 class="fw-bold"> <?= $tgl_diterima['tgl_diterima'] ?></h3>
                    <p class="text-uppercase">tgl donasi terakhir</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h1 class="text-center fw-bold">Daftar donatur yang bergabung</h1>
        <table class="table table-dark text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Donatur</th>
                    <th>Nominal</th>
                    <th>Metode Pembayaran</th>
                    <th>Tgl Diterima</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $query = "SELECT * FROM donasi";
                $result = mysqli_query($conn, $query);

                $no = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $no++; ?>
                    <tr>
                        <td> <?= $no ?></td>
                        <td> <?= $row['nama'] ?></td>
                        <td>Rp. <?= $row['nominal'] ?></td>
                        <td> <?= $row['metode'] ?></td>
                        <td> <?= $row['tgl_diterima'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="bg-dark text-white text-center py-5 mt-auto">
        <h3 class="fw-bold">Terima kasih sudah berdonasi!</h3>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
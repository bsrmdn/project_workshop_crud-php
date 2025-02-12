<?php
session_start();
if ($_SESSION['is_login'] != true) {
    header("Location:login.php?pesan=Silakan.Login terlebih dahulu");
}
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM donasi WHERE id=$id";
$result = mysqli_query($conn, $query);
if ($result) {
    header("Location:data_donasi.php");
}

<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM beritadonor WHERE id=$id";
mysqli_query($conn, $query);

header("Location: dashboard.php?page=berita-donor&status=$status");
?>

<!-- header section start -->
<?php include 'header.php'; ?>
<!-- header section end -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Darah</title>

    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/stokdarah.css">

</head>
<body>

<?php
// Impor file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tabel stokdarah
$sql = "SELECT golongan_darah, jumlah_stok, tanggal_pembaruan FROM stokdarah ORDER BY tanggal_pembaruan DESC";
$result = $conn->query($sql);

// Buat array untuk menyimpan stok darah berdasarkan golongan darah
$stok_darah = [
    'A+' => 0, 'A-' => 0, 'B+' => 0, 'B-' => 0, 
    'AB+' => 0, 'AB-' => 0, 'O+' => 0, 'O-' => 0
];
$tanggal_pembaruan = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $golongan = $row['golongan_darah'];
        $stok_darah[$golongan] = $row['jumlah_stok'];
        $tanggal_pembaruan = $row['tanggal_pembaruan']; // Gunakan tanggal pembaruan terbaru
    }
}
?>

<div class="stokdarah-container">
    <div class="card">
        <h2>Stok Darah</h2>
        <p><strong>Tanggal:</strong> <?php echo date("d F Y", strtotime($tanggal_pembaruan)); ?></p>
        <p><strong>Stok tersedia:</strong></p>
        <p>Golongan Darah A+ : <?php echo $stok_darah['A+']; ?> kantong</p>
        <p>Golongan Darah A- : <?php echo $stok_darah['A-']; ?> kantong</p>
        <p>Golongan Darah B+ : <?php echo $stok_darah['B+']; ?> kantong</p>
        <p>Golongan Darah B- : <?php echo $stok_darah['B-']; ?> kantong</p>
        <p>Golongan Darah AB+: <?php echo $stok_darah['AB+']; ?> kantong</p>
        <p>Golongan Darah AB-: <?php echo $stok_darah['AB-']; ?> kantong</p>
        <p>Golongan Darah O+ : <?php echo $stok_darah['O+']; ?> kantong</p>
        <p>Golongan Darah O- : <?php echo $stok_darah['O-']; ?> kantong</p>
    </div>
</div>



<!-- footer section start -->

<link rel="stylesheet" href="css/footer.css">

<?php include 'footer.php'; ?>

<!-- footer section end -->

<!-- Swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="js/homepage.js"></script>
</body>
</html>

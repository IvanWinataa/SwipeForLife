<?php
include 'koneksi.php'; // File koneksi ke database
?>

<!-- Header Section -->
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Donor Darah</title>
    
    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <!-- CSS Utama untuk berita -->
    <link rel="stylesheet" href="css/berita.css"> <!-- File CSS khusus untuk berita -->
</head>
<body>

<!-- Kontainer utama untuk halaman berita -->
<div class="news-page">
    <h1 class="heading-title">Berita Donor Darah</h1>
    <div class="news-container">
        <?php
        // Query untuk mengambil data dari tabel beritadonor
        $query = "SELECT * FROM beritadonor ORDER BY tanggal DESC";
        $result = mysqli_query($conn, $query);

        // Looping data untuk menampilkan berita
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="news-item">
                <img src="uploads/<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>" style="width: 100%; height: auto;">
                <h2><?= $row['judul']; ?></h2>
                <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($row['tanggal'])); ?></p>
                <p><strong>Lokasi:</strong> <?= $row['lokasi']; ?></p>
                <p><strong>Jumlah Kantong:</strong> <?= $row['jumlah_kantong']; ?></p>
                <p><?= $row['deskripsi']; ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer Section -->
<?php include 'footer.php'; ?>

</body>
</html>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Donor</title>

    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/infodonor.css">

    
</head>

<body>

    <section class="info-donor">
        <h1 class="heading-title">Informasi Donor</h1>

        <div class="donor-container">
            <?php
            // Sertakan file koneksi
            include 'koneksi.php';

            // Query untuk mengambil data dari tabel permohonan_donor
            $sql = "SELECT * FROM permohonan_donor";
            $result = $conn->query($sql);

            // Cek apakah ada data yang ditemukan
            if ($result->num_rows > 0) {
                // Looping data hasil query
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="donor-info">
                        <h2>Detail Permohonan</h2>
                        <p><strong>Nama Pasien:</strong> ' . htmlspecialchars($row['nama_pasien']) . '</p>
                        <p><strong>Rumah Sakit:</strong> ' . htmlspecialchars($row['nama_rumah_sakit']) . '</p>
                        <p><strong>Jenis Darah:</strong> ' . htmlspecialchars($row['golongan_darah']) . '</p>
                        <p><strong>Rhesus:</strong> ' . (isset($row['rhesus']) ? htmlspecialchars($row['rhesus']) : '-') . '</p>
                        <p><strong>Jumlah Pendonor:</strong> ' . htmlspecialchars($row['jumlah_pendonor']) . '</p>
                        <p><strong>Jenis Donasi:</strong> ' . htmlspecialchars($row['jenis_donor']) . '</p>
                        <h2>Kontak Person</h2>
                        <p><strong>Nama:</strong> ' . htmlspecialchars($row['nama_kontak']) . '</p>
                        <p><strong>Telepon:</strong> ' . htmlspecialchars($row['no_telepon_kontak']) . '</p>
                        <p><strong>Email:</strong> ' . htmlspecialchars($row['email_kontak']) . '</p>
                    </div>';
                }
            } else {
                echo '<p>Tidak ada data permohonan donor.</p>';
            }

            // Tutup koneksi
            $conn->close();
            ?>
        </div>
    </section>

    <!-- footer section start -->

    <?php include 'footer.php'; ?>
    <!-- footer section end -->

    <!-- Swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- <script src="js/homepage.js"></script> -->
</body>

</html>

<?php

session_start();
if (!isset($_SESSION['sesion']) && $_SESSION['sesion'] != 'user') {
    header("location:login.php");

} else {


?>

<?php
// Sertakan pemeriksaan sesi
include 'session_check.php';
// Sertakan header
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/homepage.css">

</head>
<body>

<!-- home section starts -->
<section class="home">

    <div class="swiper home-slider">

    <div class="swiper-wrapper">

    <div class="swiper-slide" style="background:url(image/gambar1.jpg) no-repeat">
        <div class="content">
        <span>Kunjungi</span>
        <h3>Donor Darah</h3>
        <a href ="beritadonor.php" class="btn">Jelajahi Lagi</a>
        </div>
    </div>

    <div class="swiper-slide" style="background:url(image/gambar2.jpg) no-repeat">
        <div class="content">
        <span>Kunjungi</span>
        <h3>Donor Darah</h3>
        <a href ="beritadonor.php" class="btn">Jelajahi Lagi</a>
        </div>
    </div>

    <div class="swiper-slide" style="background:url(image/gambar3.jpg) no-repeat">
        <div class="content">
        <span>Kunjungi</span>
        <h3>Donor Darah</h3>
        <a href ="beritadonor.php" class="btn">Jelajahi Lagi</a>
        </div>
    </div>

    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    </div>

</section>

<!-- home section end -->

<div class="urgent">
        <p>Apakah Anda membutuhkan darah dengan segera? Isi pengajuan melalui formulir berikut</p>
        <a href ="permohonan.php" class="btn">Ajukan Permohonan</a>
    </div>


<!-- section pelayanan kami mulai -->
<section class="services">
    <h1 class="heading-title"> Pelayanan kami</h1>

    <div class="box-container">
    <div class="box">
        <img src="image/request.png" alt="">
        <a href="permohonan.php">
            <h3>Permohonan</h3>
        </a>

    </div>

    <div class="box">
        <img src="image/icon-1.png" alt="">
        <a href="infodonor.php">
            <h3>Informasi Donor</h3>
        </a>
    </div>

    <div class="box">
        <img src="image/medical.png" alt="">
        <a href="stokdarah.php">
            <h3>Stok Darah</h3>
        </a>
    </div>

    <div class="box">
        <img src="image/contact.png" alt="">
        <a href="kontakpmi.php">
            <h3>Kontak PMI</h3>
        </a>
    </div>

    <div class="box">
        <img src="image/faq.png" alt="">
        <a href="faq.php">
            <h3>FAQ</h3>
        </a>
    </div>
</section>


<!-- section pelayanan kami end -->

<section class="info-container">
        <h1 class="heading">INFORMASI DONOR DARAH</h1>

        <div class="box">
            <h3>Syarat Umum Donor Darah</h3>
            <ul>
                <li>Berusia 17-60 tahun</li>
                <li>Berat badan minimal 45 kg</li>
                <li>Kondisi tubuh sehat (tidak sedang demam, batuk, pilek)</li>
                <li>Tidak sedang menstruasi, hamil, atau menyusui</li>
                <li>Interval donor darah minimal 12 minggu</li>
            </ul>
        </div>

        <div class="box">
            <h3>Manfaat Donor Darah</h3>
            <ul>
                <li>Meningkatkan produksi sel darah baru</li>
                <li>Membantu menjaga kesehatan jantung</li>
                <li>Mendeteksi penyakit serius secara dini</li>
                <li>Membantu mengontrol berat badan</li>
            </ul>
        </div>

        <div class="box">
            <h3>Prosedur Donor Darah</h3>
            <ol>
                <li>Mengisi formulir pendaftaran dan riwayat kesehatan</li>
                <li>Melakukan pemeriksaan kesehatan oleh petugas medis</li>
                <li>Pengambilan darah (sekitar 10 menit)</li>
                <li>Istirahat sejenak setelah proses donor selesai</li>
            </ol>
        </div>
    </section>



<!-- section tentang kami start -->
<section class="about">
    <h1 class="heading-title"> Tentang Kami</h1>
    <p>Swipe For Life adalah platform yang menghubungkan para pendonor sukarela dengan individu yang
    membutuhkan darah, guna membantu menyelamatkan nyawa. bertujuan untuk memudahkan dan meningkatkan kesadaran akan pentingnya donor darah. Kami percaya bahwa setiap tetes darah dapat menyelamatkan nyawa, dan melalui teknologi, kami ingin menciptakan komunitas yang peduli dan aktif dalam membantu sesama. Kami adalah organisasi yang berfokus pada penyuluhan dan pelayanan terkait donor darah. Kami berkomitmen untuk meningkatkan kesadaran akan pentingnya donor darah dan menyediakan informasi yang akurat kepada masyarakat.</p>

    <h2>Visi</h2>
    <p>Menjadi platform terdepan dalam mempertemukan kebutuhan darah dengan pendonor sukarela secara cepat, mudah, dan aman, guna menyelamatkan nyawa dan meningkatkan kesehatan masyarakat.</p>

    <h2>Misi</h2>
    <p>Memfasilitasi Konektivitas: Menghubungkan pendonor darah dengan individu yang membutuhkan secara real-time melalui teknologi yang inovatif dan ramah pengguna.</p>
    <p>Meningkatkan Kesadaran: Mengedukasi masyarakat tentang pentingnya donor darah melalui kampanye sosial, penyuluhan, dan kolaborasi dengan berbagai komunitas.</p>
    <p>Memperluas Jangkauan: Memperluas jaringan pendonor dan penerima darah untuk menciptakan akses yang lebih luas dan merata di seluruh wilayah.</p>
    <p>Menyediakan Informasi Akurat: Menyediakan data yang transparan, akurat, dan mudah diakses mengenai kebutuhan darah dan proses donor.</p>
</section>

<div class="urgent">
        <p>Apakah Anda ingin Menjadi Admin PMI? Isi pengajuan melalui formulir berikut</p>
        <a href ="permohonan_admin.php" class="btn">Admin Request</a>
    </div>

<link rel="stylesheet" href="css/footer.css">

<?php include 'footer.php'; ?>
<!-- footer section end -->

<!-- Swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="js/homepage.js"></script>
</body>
</html>
<?php
}
?>
<?php
// Sertakan pemeriksaan sesi
include 'session_check.php';
?>

<link rel="stylesheet" href="css/header.css">

<!-- header section start -->
<section class="header"> 
    <a href="homepage.php" class="logo">SwipeForLife.</a>
    <nav class="navbar">
        <a href="homepage.php">Home</a>
        <a href="permohonan.php">Permohonan</a>
        <a href="infodonor.php">Info Donor</a>
        <a href="stokdarah.php">Stok Darah</a>
        <a href="beritadonor.php">Berita Donor</a>
        <a href="kontakpmi.php">Kontak PMI</a>
        <a href="faq.php">FAQ</a>
        
        <!-- Tampilkan menu tambahan untuk superadmin dan admin -->
        <?php if ($isSuperAdmin || $_SESSION['sesion'] == 'admin'): ?>
            <a href="dashboard.php">Dashboard</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['sesion'])): ?>
            <!-- Tampilkan tombol logout jika login -->
            <form action="logout.php" method="post" style="display:inline;">
                <button type="submit" class="logout-btn">Log Out</button>
            </form>
        <?php else: ?>
            <!-- Tampilkan tombol login jika belum login -->
            <a href="login.php" class="login-btn">Log In</a>
        <?php endif; ?>
    </nav>
    <div id="menu-btn" class="fas fa-bars"></div>
</section> 
<!-- header section end -->

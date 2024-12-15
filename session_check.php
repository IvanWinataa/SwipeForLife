<?php
// Mulai sesi hanya jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect ke halaman login jika belum login
if (!isset($_SESSION['sesion'])) {
    header("location: login.php");
    exit();
}

// Cek role dan buat variabel untuk digunakan pada header
$role = $_SESSION['sesion'];
$isSuperAdmin = ($role === 'superadmin');
?>

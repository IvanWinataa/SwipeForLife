<?php
session_start();
if (!isset($_SESSION['sesion'])) {
    header("location:login.php");
    exit;
}

// Periksa role pengguna
$role = $_SESSION['sesion'];

// Ambil id_user dari sesi
$id_user = $_SESSION['id_user'];

// Koneksi ke database
include('koneksi.php');

// Query untuk mendapatkan data pengguna
$query = "SELECT username, email FROM tb_user WHERE id_user = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'i', $id_user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $username = $user['username'];
        $email = $user['email'];
    } else {
        $username = 'Unknown User';
        $email = 'No email found';
    }

    mysqli_stmt_close($stmt);
} else {
    $username = 'Error';
    $email = 'Unable to fetch data';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="icon" href="path/to/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Sidebar menu -->
    <nav>
        <div class="profile">
            <h3>Swipe For Life</h3>
            <p>Website Donor Darah Terpercaya</p>
            <div class="user-info">
                <p><i class="fas fa-user"></i> <?= htmlspecialchars($username); ?></p>
                <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($email); ?></p>
            </div>
        </div>
        <ul>
            <!-- Menu untuk Superadmin -->
            <?php if ($role == 'superadmin'): ?>
                <li class="<?= ($_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
                    <a href="dashboard.php?page=dashboard">Dashboard</a>
                </li>
                <li class="<?= ($_GET['page'] == 'daftar-akun') ? 'active' : ''; ?>">
                    <a href="dashboard.php?page=daftar-akun">Daftar Akun</a>
                </li>
            <?php endif; ?>

            <!-- Menu untuk Admin dan Superadmin -->
            <li class="<?= ($_GET['page'] == 'info-donor') ? 'active' : ''; ?>">
                <a href="dashboard.php?page=info-donor">Info Donor</a>
            </li>
            <li class="<?= ($_GET['page'] == 'berita-donor') ? 'active' : ''; ?>">
                <a href="dashboard.php?page=berita-donor">Berita Donor</a>
            </li>
            <li class="<?= ($_GET['page'] == 'stok-darah') ? 'active' : ''; ?>">
                <a href="dashboard.php?page=stok-darah">Stok Darah</a>
            </li>

            <li><a href="homepage.php">HomePage</a></li>
        </ul>

        <div class="footer">
            <ul>
                <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main content -->
    <div class="content">
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                case 'homepage':
                    include 'homepage.php';
                    break;
                case 'info-donor':
                    include 'info-donor.php';
                    break;
                case 'berita-donor':
                    include 'berita-donor.php';
                    break;
                case 'stok-darah':
                    include 'stok-darah.php';
                    break;
                case 'daftar-akun':
                    include 'daftar-akun.php';
                    break;
                default:
                    echo '<h1>Selamat Datang di Dashboard</h1>';
            }
        } else {
            echo '<h1>Selamat Datang di Dashboard</h1>';
        }
        ?>
    </div>
</body>
</html>

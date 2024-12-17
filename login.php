<?php
session_start();

// Redirect jika sudah login
if (isset($_SESSION['sesion']) && ($_SESSION['sesion'] == 'superadmin' || $_SESSION['sesion'] == 'user' || $_SESSION['sesion'] == 'admin')) {
    header("location: homepage.php"); // Sesuaikan halaman redirect
    exit();
}

include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password']; // Ambil password tanpa hashing

    // Gunakan prepared statement untuk menghindari SQL Injection
    $query = "SELECT * FROM tb_user WHERE email = ? AND is_deleted = 0"; // Tambahkan filter is_deleted
    $stmt = mysqli_prepare($conn, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $data['password'])) {
                $_SESSION['id_user'] = $data['id_user'];
                if ($data['role'] === 'user') {
                    $_SESSION['sesion'] = 'user';
                    header("location: homepage.php");
                    exit();
                } elseif ($data['role'] === 'superadmin') {
                    $_SESSION['sesion'] = 'superadmin';
                    $_SESSION['id_admin'] = $data['id_user'];
                    header("location: dashboard.php");
                    exit();
                } elseif ($data['role'] === 'admin') {
                    $_SESSION['sesion'] = 'admin';
                    $_SESSION['id_admin'] = $data['id_user'];
                    header("location: dashboard.php");
                    exit();
                } else {
                    $error_message = "Role tidak dikenali!";
                }
            } else {
                $error_message = "Email atau password salah!";
            }
        } else {
            $error_message = "Email tidak ditemukan atau akun telah dinonaktifkan!";
        }

        mysqli_stmt_close($stmt);
    } else {
        $error_message = "Terjadi kesalahan dalam query!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css"> <!-- Pastikan file CSS ada -->
</head>
<body>
    <div class="input">
        <h1>LOGIN</h1>
        <form method="POST" action="">
            <div class="box-input">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login" class="btn-input">Login</button>
            <?php if (isset($error_message)) { ?>
                <p style="color: red; text-align: center;"><?= $error_message ?></p>
            <?php } ?>
        </form>
        <div class="bottom">
            <p>Belum punya akun? <a href="register.php">Register disini</a></p>
        </div>
    </div>
</body>
</html>

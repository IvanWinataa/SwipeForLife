<?php
// Memastikan form dikirim dengan method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menyertakan file koneksi database
    require 'koneksi.php';

    // Mengambil data dari form dan melakukan sanitasi input
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Hashing password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memasukkan data ke tabel
    // Role set default menjadi 'superadmin'
    $query_sql = "INSERT INTO tb_user (nama, username, email, password, role) 
                VALUES ('$nama', '$username', '$email', '$hashed_password', 'superadmin')";

    // Menjalankan query dan cek apakah berhasil
    if (mysqli_query($conn, $query_sql)) {
        header("Location: login.php"); 
        exit(); // Pastikan exit setelah header redirect
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Register Page</title>
</head>

<body>
    <div class="input">
        <h1>REGISTER ADMIN</h1>
        <form action="register.php" method="POST">
            <div class="box-input">
                <i class="fas fa-user"></i>
                <input type="text" name="nama" placeholder="Full Name" required>
            </div>
            <div class="box-input">
                <i class="fas fa-address-book"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="register" class="btn-input">Register</button>
            <div class="bottom">
                <p>Sudah punya akun?
                    <a href="login.php">Login disini</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>

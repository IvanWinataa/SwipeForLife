<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    $role = $_POST['role'];

    $query = "INSERT INTO tb_user (nama, username, email, password, role) VALUES ('$nama', '$username', '$email', '$password', '$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: dashboard.php?page=daftar-akun");
    } else {
        echo "Gagal menambahkan data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
</head>
<body>
    <h1>Tambah Data Pengguna</h1>
    <form action="" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Role:</label>
        <select name="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>
</html>

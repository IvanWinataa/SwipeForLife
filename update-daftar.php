<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_user WHERE id_user = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $query = "UPDATE tb_user SET nama = '$nama', username = '$username', email = '$email', role = '$role' WHERE id_user = $id";
    $update = mysqli_query($conn, $query);

    if ($update) {
        header("Location: dashboard.php?page=daftar-akun");
    } else {
        echo "Gagal mengubah data!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Data Pengguna</h1>
    <form action="" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br>
        <label>Username:</label>
        <input type="text" name="username" value="<?= $data['username']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $data['email']; ?>" required><br>
        <label>Role:</label>
        <select name="role" required>
            <option value="user" <?= $data['role'] == 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
        </select><br>
        <button type="submit" name="update">Simpan</button>
    </form>
</body>
</html>

<?php
include 'koneksi.php';

// Ambil data user berdasarkan id_user
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Ambil data user
    $query = "SELECT * FROM user WHERE id_user = $id_user";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

// Update data user
if (isset($_POST['update'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $profil = $_POST['profil'];
    $role = $_POST['role'];

    // Query update
    $update_query = "UPDATE user SET 
                    nama = '$nama', 
                    username = '$username', 
                    email = '$email', 
                    password = '$password', 
                    profil = '$profil',
                    role = '$role' 
                    WHERE id_user = $id_user";

    if (mysqli_query($conn, $update_query)) {
        echo "Data berhasil diupdate!";
        header("Location: tampil_user.php"); // Redirect ke halaman daftar user
        exit;
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!-- Form Edit Data -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST" action="edit_user.php">
        <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo $data['username']; ?>"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $data['email']; ?>"><br>

        <label>Password:</label><br>
        <input type="text" name="password" value="<?php echo $data['password']; ?>"><br>

        <label>Profil:</label><br>
        <input type="text" name="profil" value="<?php echo $data['profil']; ?>"><br>

        <label>Role:</label><br>
        <select name="role">
            <option value="admin" <?php if($data['role'] == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="user" <?php if($data['role'] == 'user') echo 'selected'; ?>>User</option>
            <option value="superadmin" <?php if($data['role'] == 'superadmin') echo 'selected'; ?>>Superadmin</option>
        </select><br><br>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>

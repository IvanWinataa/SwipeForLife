<?php
include 'koneksi.php';

// Ambil data dari tabel dengan filter role 'user' dan 'admin'
$query = "SELECT * FROM tb_user WHERE role IN ('user', 'admin')";
$result = mysqli_query($conn, $query);

// Cek jika query gagal
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Role Admin & User</title>
    <link rel="stylesheet" href="css/daftar-akun.css">
</head>
<body>
    <h1>Manajemen Pengguna</h1>
    <a href="tambah-daftar.php">Tambah Pengguna</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['username']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['role']); ?></td>
                    <td>
    <!-- Ikon Hapus dengan Tempat Sampah -->
    <a href="delete-user.php?id_user=<?= $row['id_user']; ?>" 
        onclick="return confirm('Yakin ingin menghapus data ini?')" 
        title="Hapus">
        <i class="fas fa-trash-alt"></i>
    </a>
</td>


                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

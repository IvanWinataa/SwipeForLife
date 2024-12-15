<?php
include 'koneksi.php';

// CREATE
if (isset($_POST['create'])) {
    $golongan_darah = $_POST['golongan_darah'];
    $jumlah_stok = $_POST['jumlah_stok'];

    $query = "INSERT INTO stokdarah (golongan_darah, jumlah_stok) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $golongan_darah, $jumlah_stok);
    $stmt->execute();
    $stmt->close();
}

// READ
$query = "SELECT * FROM stokdarah";
$result = $conn->query($query);

// UPDATE
if (isset($_POST['update'])) {
    $id_stok = $_POST['id_stok'];
    $golongan_darah = $_POST['golongan_darah'];
    $jumlah_stok = $_POST['jumlah_stok'];

    $query = "UPDATE stokdarah SET golongan_darah = ?, jumlah_stok = ?, tanggal_pembaruan = CURRENT_TIMESTAMP WHERE id_stok = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $golongan_darah, $jumlah_stok, $id_stok);
    $stmt->execute();
    $stmt->close();
}

// DELETE
if (isset($_POST['delete'])) {
    $id_stok = $_POST['id_stok'];
    $query = "DELETE FROM stokdarah WHERE id_stok = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_stok);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Stok Darah</title>
    <link rel="stylesheet" href="css/stok-darah.css">
</head>
<body>
    <h1>CRUD Stok Darah</h1>

    <!-- Form Create -->
    <form method="POST">
        <h3>Tambah Data</h3>
        <label>Golongan Darah:</label>
        <input type="text" name="golongan_darah" required maxlength="3">
        <label>Jumlah Stok:</label>
        <input type="number" name="jumlah_stok" required>
        <button type="submit" name="create">Tambah</button>
    </form>

    <!-- Table Read -->
    <h3>Data Stok Darah</h3>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Golongan Darah</th>
                    <th>Jumlah Stok</th>
                    <th>Tanggal Pembaruan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_stok'] ?></td>
                        <td><?= $row['golongan_darah'] ?></td>
                        <td><?= $row['jumlah_stok'] ?></td>
                        <td><?= $row['tanggal_pembaruan'] ?></td>
                        <td>
                            <!-- Form Update -->
                            <form method="POST">
                                <input type="hidden" name="id_stok" value="<?= $row['id_stok'] ?>">
                                <input type="text" name="golongan_darah" value="<?= $row['golongan_darah'] ?>" required maxlength="3">
                                <input type="number" name="jumlah_stok" value="<?= $row['jumlah_stok'] ?>" required>
                                <button type="submit" name="update">Update</button>
                            </form>

                            <!-- Form Delete -->
                            <form method="POST">
                                <input type="hidden" name="id_stok" value="<?= $row['id_stok'] ?>">
                                <button type="submit" name="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

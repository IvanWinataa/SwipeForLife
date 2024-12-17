<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM beritadonor WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$status = ''; // Variabel untuk status

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $jumlah_kantong = $_POST['jumlah_kantong'];
    $deskripsi = $_POST['deskripsi'];

    // Mengecek jika ada gambar yang diupload
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $target = "uploads/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $query = "UPDATE beritadonor SET judul='$judul', tanggal='$tanggal', lokasi='$lokasi',
                jumlah_kantong='$jumlah_kantong', gambar='$gambar', deskripsi='$deskripsi' WHERE id=$id";
    } else {
        $query = "UPDATE beritadonor SET judul='$judul', tanggal='$tanggal', lokasi='$lokasi',
                jumlah_kantong='$jumlah_kantong', deskripsi='$deskripsi' WHERE id=$id";
    }

    // Mengeksekusi query update
    if (mysqli_query($conn, $query)) {
        $status = 'success'; // Data berhasil diubah
        // Redirect ke halaman berita donor setelah update berhasil
        header("Location: dashboard.php?page=berita-donor&status=$status");
        exit(); // Menghentikan eksekusi setelah redirect
    } else {
        $status = 'error'; // Terjadi kesalahan saat mengubah data
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="css/update-berita.css">
    <script>
        // Menampilkan pop-up jika status 'success'
        window.onload = function() {
            var status = new URLSearchParams(window.location.search).get('status');
            if (status === 'success') {
                alert('Data Berhasil Diubah');
            }
        };
    </script>
</head>

<body>
    <h1>Edit Berita</h1>
    <form action="update-berita.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?= $row['judul'] ?>" required><br><br>

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" required><br><br>

        <label>Lokasi:</label>
        <input type="text" name="lokasi" value="<?= $row['lokasi'] ?>" required><br><br>

        <label>Jumlah Kantong:</label>
        <input type="number" name="jumlah_kantong" value="<?= $row['jumlah_kantong'] ?>" required><br><br>

        <label>Gambar:</label>
        <input type="file" name="gambar"><br><br>
        <img src="uploads/<?= $row['gambar'] ?>" alt="Gambar Lama" width="100"><br><br>

        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="5" required><?= $row['deskripsi'] ?></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>

<?php
include 'koneksi.php';

$status = ''; // Variabel untuk menyimpan status

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $jumlah_kantong = $_POST['jumlah_kantong'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $target = "uploads/" . basename($gambar);

    // Cek apakah upload berhasil
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        // Query untuk memasukkan data ke database
        $query = "INSERT INTO beritadonor (judul, tanggal, lokasi, jumlah_kantong, gambar, deskripsi)
                VALUES ('$judul', '$tanggal', '$lokasi', '$jumlah_kantong', '$gambar', '$deskripsi')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            $status = 'success'; // Data berhasil disimpan
            // Redirect ke halaman berita donor
            header("Location: dashboard.php?page=berita-donor");
            exit; // Hentikan eksekusi setelah redirect
        } else {
            $status = 'error'; // Kesalahan pada query
        }
    } else {
        $status = 'upload_error'; // Kesalahan saat upload gambar
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="css/tambah-berita.css">
    <script>
        // Fungsi untuk menampilkan pesan pop-up
        function showAlert(message) {
            alert(message);
        }
    </script>
</head>

<body>
    <?php
    // Tampilkan pesan pop-up berdasarkan status
    if ($status === 'success') {
        echo "<script>showAlert('Data berhasil ditambahkan!');</script>";
    } elseif ($status === 'error') {
        echo "<script>showAlert('Terjadi kesalahan saat menyimpan data ke database.');</script>";
    } elseif ($status === 'upload_error') {
        echo "<script>showAlert('Gagal mengunggah gambar.');</script>";
    }
    ?>

    <h1>Tambah Berita</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="judul" required><br><br>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required><br><br>
        <label>Lokasi:</label>
        <input type="text" name="lokasi" required><br><br>
        <label>Jumlah Kantong:</label>
        <input type="number" name="jumlah_kantong" required><br><br>
        <label>Gambar:</label>
        <input type="file" name="gambar" required><br><br>
        <label>Deskripsi:</label>
        <textarea name="deskripsi" rows="5" required></textarea><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>

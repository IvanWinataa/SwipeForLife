<?php
// Mengimpor file koneksi
include 'koneksi.php';

$status = ''; // Variabel status untuk memeriksa jika data berhasil ditambahkan

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama_pasien = $_POST['nama_pasien'];
    $nama_rumah_sakit = $_POST['nama_rumah_sakit'];
    $golongan_darah = $_POST['golongan_darah'];
    $jumlah_pendonor = $_POST['jumlah_pendonor'];
    $jenis_donor = $_POST['jenis_donor'];
    $file_surat_permohonan = $_FILES['file_surat_permohonan']['name'];
    $nama_kontak = $_POST['nama_kontak'];
    $no_telepon_kontak = $_POST['no_telepon_kontak'];
    $email_kontak = $_POST['email_kontak'];

    // Upload file surat permohonan
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file_surat_permohonan);

    if (move_uploaded_file($_FILES['file_surat_permohonan']['tmp_name'], $target_file)) {
        // Query untuk memasukkan data ke tabel
        $query = "INSERT INTO permohonan_donor (
            nama_pasien, 
            nama_rumah_sakit, 
            golongan_darah, 
            jumlah_pendonor, 
            jenis_donor, 
            file_surat_permohonan, 
            nama_kontak, 
            no_telepon_kontak, 
            email_kontak
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Persiapan query menggunakan prepared statement
        $stmt = $conn->prepare($query);
        $stmt->bind_param(
            "sssisssss", 
            $nama_pasien, 
            $nama_rumah_sakit, 
            $golongan_darah, 
            $jumlah_pendonor, 
            $jenis_donor, 
            $file_surat_permohonan, 
            $nama_kontak, 
            $no_telepon_kontak, 
            $email_kontak
        );

        // Eksekusi query
        if ($stmt->execute()) {
            $status = 'success'; // Set status jika berhasil menambahkan data
            // Redirect ke halaman info-donor dengan status
            header("Location: dashboard.php?page=info-donor");
            exit(); // Menghentikan eksekusi lebih lanjut setelah redirect
        } else {
            $status = 'error'; // Set status jika gagal
        }

        $stmt->close();
    } else {
        echo "Gagal mengunggah file surat permohonan.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Permohonan Donor</title>
    <link rel="stylesheet" href="css/tambah-permohonan.css">
    <script>
        // Fungsi untuk menampilkan pop-up jika status berhasil
        window.onload = function() {
            var status = new URLSearchParams(window.location.search).get('status');
            if (status === 'success') {
                alert('Data Berhasil Ditambahkan');
            }
        };
    </script>
</head>
<body>
    <h1>Form Tambah Data Permohonan Donor</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama_pasien">Nama Pasien:</label>
        <input type="text" name="nama_pasien" id="nama_pasien" required><br>

        <label for="nama_rumah_sakit">Nama Rumah Sakit:</label>
        <input type="text" name="nama_rumah_sakit" id="nama_rumah_sakit" required><br>

        <label for="golongan_darah">Golongan Darah:</label>
        <input type="text" name="golongan_darah" id="golongan_darah" required><br>

        <label for="jumlah_pendonor">Jumlah Pendonor:</label>
        <input type="number" name="jumlah_pendonor" id="jumlah_pendonor" required><br>

        <label for="jenis_donor">Jenis Donor:</label>
        <input type="text" name="jenis_donor" id="jenis_donor" required><br>

        <label for="file_surat_permohonan">File Surat Permohonan:</label>
        <input type="file" name="file_surat_permohonan" id="file_surat_permohonan" required><br>

        <label for="nama_kontak">Nama Kontak:</label>
        <input type="text" name="nama_kontak" id="nama_kontak" required><br>

        <label for="no_telepon_kontak">No Telepon Kontak:</label>
        <input type="text" name="no_telepon_kontak" id="no_telepon_kontak" required><br>

        <label for="email_kontak">Email Kontak:</label>
        <input type="email" name="email_kontak" id="email_kontak" required><br>

        <button type="submit">Tambah Data</button>
    </form>
</body>
</html>

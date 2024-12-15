<?php
include 'koneksi.php';

// Cek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Menghindari SQL Injection
} else {
    die("ID tidak ditemukan");
}

// Ambil data untuk ditampilkan di form
$query = "SELECT * FROM permohonan_donor WHERE id = $id";
$result = $conn->query($query);

// Pastikan data ditemukan untuk ID yang diberikan
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
} else {
    die("Data tidak ditemukan");
}

// Proses form jika ada request POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pasien = $_POST['nama_pasien'];
    $nama_rumah_sakit = $_POST['nama_rumah_sakit'];
    $golongan_darah = $_POST['golongan_darah'];
    $jumlah_pendonor = $_POST['jumlah_pendonor'];
    $jenis_donor = $_POST['jenis_donor'];
    $nama_kontak = $_POST['nama_kontak'];
    $no_telepon_kontak = $_POST['no_telepon_kontak'];
    $email_kontak = $_POST['email_kontak'];

    // Query update
    $query = "UPDATE permohonan_donor SET 
        nama_pasien = '$nama_pasien', 
        nama_rumah_sakit = '$nama_rumah_sakit', 
        golongan_darah = '$golongan_darah', 
        jumlah_pendonor = '$jumlah_pendonor', 
        jenis_donor = '$jenis_donor', 
        nama_kontak = '$nama_kontak', 
        no_telepon_kontak = '$no_telepon_kontak', 
        email_kontak = '$email_kontak' 
        WHERE id = $id";

    // Eksekusi query
    if ($conn->query($query)) {
        // Jika berhasil, tampilkan pesan menggunakan JavaScript dan redirect ke index.php
        echo "<script>
            alert('Data telah diperbarui');
            window.location.href = 'dashboard.php?page=info-donor'; // Sesuaikan URL berdasarkan struktur sistem Anda
            </script>";
    
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/update-donor.css">
</head>
<body>
    <h1>Edit Data Permohonan Donor</h1>
    <form method="post">
        <label>Nama Pasien: <input type="text" name="nama_pasien" value="<?= htmlspecialchars($data['nama_pasien']); ?>" required></label><br>
        <label>Nama Rumah Sakit: <input type="text" name="nama_rumah_sakit" value="<?= htmlspecialchars($data['nama_rumah_sakit']); ?>" required></label><br>
        <label>Golongan Darah: <input type="text" name="golongan_darah" value="<?= htmlspecialchars($data['golongan_darah']); ?>" required></label><br>
        <label>Jumlah Pendonor: <input type="number" name="jumlah_pendonor" value="<?= htmlspecialchars($data['jumlah_pendonor']); ?>" required></label><br>
        <label>Jenis Donor: <input type="text" name="jenis_donor" value="<?= htmlspecialchars($data['jenis_donor']); ?>" required></label><br>
        <label>Nama Kontak: <input type="text" name="nama_kontak" value="<?= htmlspecialchars($data['nama_kontak']); ?>" required></label><br>
        <label>Nomor Kontak: <input type="text" name="no_telepon_kontak" value="<?= htmlspecialchars($data['no_telepon_kontak']); ?>" required></label><br>
        <label>Email Kontak: <input type="email" name="email_kontak" value="<?= htmlspecialchars($data['email_kontak']); ?>" required></label><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

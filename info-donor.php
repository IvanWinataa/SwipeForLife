<?php
include 'koneksi.php'; // Include file koneksi

$query = "SELECT * FROM permohonan_donor";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Permohonan Donor</title>
    <link rel="stylesheet" href="css/info-donor.css">
    <script>
        function deleteRow(rowId) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                const row = document.getElementById('row-' + rowId);
                row.classList.add('hidden');
            }
        }
    </script>
</head>
<body>
    <h1>Data Permohonan Donor</h1>
    <a href="tambah-permohonan.php">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Nama Rumah Sakit</th>
                <th>Golongan Darah</th>
                <th>Jumlah Pendonor</th>
                <th>Jenis Donor</th>
                <th>File Surat Permohonan</th>
                <th>Nama Kontak</th>
                <th>Nomor Kontak</th>
                <th>Email Kontak</th>
                <th>Dibuat Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr id="row-<?= $row['id']; ?>">
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama_pasien']; ?></td>
                    <td><?= $row['nama_rumah_sakit']; ?></td>
                    <td><?= $row['golongan_darah']; ?></td>
                    <td><?= $row['jumlah_pendonor']; ?></td>
                    <td><?= $row['jenis_donor']; ?></td>
                    <td><a href="<?= $row['file_surat_permohonan']; ?>" target="_blank">Lihat File</a></td>
                    <td><?= $row['nama_kontak']; ?></td>
                    <td><?= $row['no_telepon_kontak']; ?></td>
                    <td><?= $row['email_kontak']; ?></td>
                    <td><?= $row['dibuat_pada']; ?></td>
                    <td>
                        <!-- Ikon Edit dengan Pensil
                        <a href="update-donor.php?id=<?= $row['id']; ?>" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a> | -->

                        <!-- Tombol Hapus -->
                        <button onclick="deleteRow(<?= $row['id']; ?>)" title="Terima">
                            <i class="fas fa-check"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

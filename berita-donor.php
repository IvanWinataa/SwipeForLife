<?php
include 'koneksi.php';

// Fetch data
$query = "SELECT * FROM beritadonor";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Donor</title>
    <link rel="stylesheet" href="css/berita-donor.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <h1>Berita Donor</h1>
    <a href="tambah-berita.php">Tambah Berita</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Jumlah Kantong</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr id="row-<?= $row['id'] ?>">
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['judul'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td><?= $row['lokasi'] ?></td>
                    <td><?= $row['jumlah_kantong'] ?></td>
                    <td><img src="uploads/<?= $row['gambar'] ?>" alt="Gambar" width="100"></td>
                    <td>
                        <span class="truncate" id="desc-<?= $row['id'] ?>">
                            <?= substr($row['deskripsi'], 0, 100) ?>...
                        </span>
                        <button onclick="toggleDescription(<?= $row['id'] ?>)">See More</button>
                    </td>
                    <td>
                        <!-- Ikon Edit dengan Pensil -->
                        <a href="update-donor.php?id=<?= $row['id']; ?>" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a> |

                        <!-- Ikon Hapus dengan Tempat Sampah -->
                        <button onclick="deleteRow(<?= $row['id'] ?>)" title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        // Fungsi untuk menampilkan/menghapus deskripsi lengkap
        function toggleDescription(id) {
            const desc = document.getElementById('desc-' + id);
            if (desc.classList.contains('truncate')) {
                desc.classList.remove('truncate');
                desc.innerHTML = '<?= addslashes($row['deskripsi'] ?? '') ?>';
            } else {
                desc.classList.add('truncate');
            }
        }

        // Fungsi untuk menghapus baris tabel dari tampilan
        function deleteRow(id) {
            const row = document.getElementById('row-' + id);
            if (confirm('Apakah Anda yakin ingin menghapus baris ini?')) {
                row.classList.add('hidden'); // Menyembunyikan baris dengan CSS
            }
        }
    </script>
</body>

</html>

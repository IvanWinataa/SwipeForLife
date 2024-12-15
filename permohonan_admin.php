<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Admin</title>

    <!-- Swiper CSS Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/permohonan.css">
</head>

<body>

    <!-- Header -->
    <?php include 'Header.php'; ?>

    <!-- Form Section Start -->
    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4 fw-bold">Form Permohonan Admin</h2>
        <form action="admin_request.php" method="POST" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
            <!-- Nama Lengkap -->
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-3">
                <label class="form-label fw-bold">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <!-- Alamat Domisili -->
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat Domisili:</label>
                <textarea name="alamat_domisili" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>

            <!-- Nomor Telepon -->
            <div class="mb-3">
                <label class="form-label fw-bold">Nomor Telepon:</label>
                <input type="text" name="nomor_telepon" class="form-control" placeholder="Contoh: 08123456789" required>
            </div>

            <!-- Alamat Email -->
            <div class="mb-3">
                <label class="form-label fw-bold">Alamat Email:</label>
                <input type="email" name="alamat_email" class="form-control" placeholder="Contoh: email@example.com" required>
            </div>

            <!-- Nomor Anggota PMI -->
            <div class="mb-3">
                <label class="form-label fw-bold">Nomor Anggota PMI:</label>
                <input type="text" name="nomor_anggota_pmi" class="form-control" placeholder="Masukkan nomor anggota" required>
            </div>

            <!-- Unit/Bagian PMI -->
            <div class="mb-3">
                <label class="form-label fw-bold">Unit/Bagian PMI:</label>
                <input type="text" name="unit_bagian_pmi" class="form-control" placeholder="Contoh: Unit A atau Bagian B" required>
            </div>

            <!-- Jabatan PMI -->
            <div class="mb-3">
                <label class="form-label fw-bold">Jabatan PMI:</label>
                <input type="text" name="jabatan_pmi" class="form-control" placeholder="Masukkan jabatan Anda" required>
            </div>

            <!-- KTP Identitas -->
            <div class="mb-3">
                <label class="form-label fw-bold">KTP Identitas:</label>
                <input type="file" name="ktp_identitas" class="form-control" required>
            </div>

            <!-- Surat Rekomendasi -->
            <div class="mb-3">
                <label class="form-label fw-bold">Surat Rekomendasi:</label>
                <input type="file" name="surat_rekomendasi" class="form-control" required>
            </div>

            <!-- Pas Foto -->
            <div class="mb-3">
                <label class="form-label fw-bold">Pas Foto:</label>
                <input type="file" name="pas_foto" class="form-control" required>
            </div>

            <!-- Username yang Diinginkan -->
            <div class="mb-4">
                <label class="form-label fw-bold">Username yang Diinginkan:</label>
                <input type="text" name="username_diinginkan" class="form-control" placeholder="Masukkan username" required>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-danger w-100">Kirim Permohonan</button>
            </div>
        </form>
    </div>
    <!-- Form Section End -->

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="js/homepage.js"></script>
</body>

</html>

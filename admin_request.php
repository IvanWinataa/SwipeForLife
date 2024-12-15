<?php
// Sertakan file koneksi ke database
include 'koneksi.php';

// Periksa apakah formulir telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data input dari formulir
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat_domisili = $_POST['alamat_domisili'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $alamat_email = $_POST['alamat_email'];
    $nomor_anggota_pmi = $_POST['nomor_anggota_pmi'];
    $unit_bagian_pmi = $_POST['unit_bagian_pmi'];
    $jabatan_pmi = $_POST['jabatan_pmi'];
    $username_diinginkan = $_POST['username_diinginkan'];

    // Proses file upload
    $upload_dir = 'uploads/';
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Upload KTP Identitas
    $ktp_identitas = $upload_dir . basename($_FILES['ktp_identitas']['name']);
    move_uploaded_file($_FILES['ktp_identitas']['tmp_name'], $ktp_identitas);

    // Upload Surat Rekomendasi
    $surat_rekomendasi = $upload_dir . basename($_FILES['surat_rekomendasi']['name']);
    move_uploaded_file($_FILES['surat_rekomendasi']['tmp_name'], $surat_rekomendasi);

    // Upload Pas Foto
    $pas_foto = $upload_dir . basename($_FILES['pas_foto']['name']);
    move_uploaded_file($_FILES['pas_foto']['tmp_name'], $pas_foto);

    // SQL Query untuk menyimpan data ke database
    $sql = "INSERT INTO admin_requests 
            (nama_lengkap, tanggal_lahir, alamat_domisili, nomor_telepon, alamat_email, 
            nomor_anggota_pmi, unit_bagian_pmi, jabatan_pmi, ktp_identitas, 
            surat_rekomendasi, pas_foto, username_diinginkan) 
            VALUES 
            ('$nama_lengkap', '$tanggal_lahir', '$alamat_domisili', '$nomor_telepon', 
            '$alamat_email', '$nomor_anggota_pmi', '$unit_bagian_pmi', '$jabatan_pmi', 
            '$ktp_identitas', '$surat_rekomendasi', '$pas_foto', '$username_diinginkan')";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Permohonan berhasil disimpan!');
                window.location.href = 'permohonan_admin.php';
            </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi database
    mysqli_close($conn);
} else {
    echo "Invalid request!";
}
?>

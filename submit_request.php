<?php
// Sertakan file koneksi
include 'koneksi.php';

// Periksa apakah metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama_pasien = $_POST['patient_name'];
    $nama_rumah_sakit = $_POST['hospital_name'];
    $golongan_darah = $_POST['blood_type'];
    $jumlah_pendonor = $_POST['donors'];
    $jenis_donor = $_POST['donation_type'];
    $nama_kontak = $_POST['contact_name'];
    $no_telepon_kontak = $_POST['contact_phone'];
    $email_kontak = $_POST['contact_email'];

    // Folder tujuan untuk upload file
    $target_dir = "uploads/";

    // Cek apakah folder uploads ada, jika tidak, buat folder
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Membuat folder dengan izin 0777 (baca, tulis, eksekusi untuk semua)
    }

    // Nama file yang diupload
    $nama_file = basename($_FILES["blood_request_form"]["name"]);
    $target_file = $target_dir . $nama_file;
    $upload_ok = 1;
    $tipe_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi: hanya file PDF yang diperbolehkan
    if ($tipe_file != "pdf") {
        echo "<script>alert('Hanya file PDF yang diperbolehkan.');</script>";
        $upload_ok = 0;
    }

    // Jika file lolos validasi dan berhasil diunggah
    if ($upload_ok && move_uploaded_file($_FILES["blood_request_form"]["tmp_name"], $target_file)) {
        // Simpan data ke database
        $sql = "INSERT INTO permohonan_donor 
                (nama_pasien, nama_rumah_sakit, golongan_darah, jumlah_pendonor, jenis_donor, file_surat_permohonan, nama_kontak, no_telepon_kontak, email_kontak)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $nama_pasien, $nama_rumah_sakit, $golongan_darah, $jumlah_pendonor, $jenis_donor, $target_file, $nama_kontak, $no_telepon_kontak, $email_kontak);

        if ($stmt->execute()) {
            // Tampilkan pop-up dan arahkan ke halaman permohonan.php
            echo "<script>
                    alert('Permohonan berhasil diajukan.');
                    window.location.href = 'permohonan.php';
                </script>";
            exit; // Pastikan untuk menghentikan eksekusi script setelah header
        } else {
            echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengunggah file.');</script>";
    }
}

// Tutup koneksi
$conn->close();
?>

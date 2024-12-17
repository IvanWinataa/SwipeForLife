<?php
include 'koneksi.php'; // Include file koneksi

// Cek apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Menghindari SQL Injection

    // Query untuk menghapus data
    $query_delete = "DELETE FROM permohonan_donor WHERE id = $id";
    
    if ($conn->query($query_delete)) {
        // Redirect ke halaman info-donor setelah berhasil menghapus data
        header("Location: dashboard.php?page=info-donor");
        exit();

        exit();
    } else {
        // Jika terjadi kesalahan saat penghapusan
        echo "Error: " . $conn->error;
    }
} else {
    // Jika tidak ada ID yang diberikan
    echo "ID tidak ditemukan!";
}
?>

<?php
include 'koneksi.php';

// Periksa apakah parameter id ada di URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Hindari SQL Injection dengan memastikan id numerik

    // Query DELETE
    $query = "DELETE FROM beritadonor WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $execute = mysqli_stmt_execute($stmt);

        if ($execute) {
            // Redirect dengan status sukses
            header("Location: dashboard.php?page=berita-donor&status=success");
        } else {
            // Redirect dengan status gagal
            header("Location: dashboard.php?page=berita-donor&status=failed");
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal membuat query: " . mysqli_error($conn);
    }
} else {
    // Jika parameter id tidak valid
    echo "ID tidak ditemukan atau tidak valid.";
}
?>

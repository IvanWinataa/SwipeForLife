<?php
include 'koneksi.php';

// Periksa apakah parameter 'id_user' ada di URL dan valid
if (isset($_GET['id_user']) && is_numeric($_GET['id_user'])) {
    $id_user = intval($_GET['id_user']); // Gunakan integer untuk keamanan

    // Query delete menggunakan prepared statement untuk keamanan
    $delete_query = "DELETE FROM tb_user WHERE id_user = ?";
    $stmt = mysqli_prepare($conn, $delete_query);

    if ($stmt) {
        // Binding parameter
        mysqli_stmt_bind_param($stmt, 'i', $id_user);
        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            // Redirect ke halaman daftar akun setelah berhasil dihapus
            header("Location: dashboard.php?page=daftar-akun&status=success");
            exit;
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal menyiapkan query: " . mysqli_error($conn);
    }
} else {
    echo "ID User tidak ditemukan atau tidak valid!";
}
?>

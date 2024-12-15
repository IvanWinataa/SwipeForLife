<?php
// Sertakan file koneksi
include 'koneksi.php';

// Proses input data dari formulir
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

    // Proses upload file
    $target_dir = "uploads/"; // Folder untuk menyimpan file
    $nama_file = basename($_FILES["blood_request_form"]["name"]);
    $target_file = $target_dir . $nama_file;
    $upload_ok = 1;
    $tipe_file = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file harus berupa PDF
    if ($tipe_file != "pdf") {
        echo "Hanya file PDF yang diperbolehkan.";
        $upload_ok = 0;
    }

    // Jika file lolos validasi dan berhasil diunggah
    if ($upload_ok && move_uploaded_file($_FILES["blood_request_form"]["tmp_name"], $target_file)) {
        // Simpan data ke dalam database
        $sql = "INSERT INTO permohonan_donor (nama_pasien, nama_rumah_sakit, golongan_darah, jumlah_pendonor, jenis_donor, file_surat_permohonan, nama_kontak, no_telepon_kontak, email_kontak)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $nama_pasien, $nama_rumah_sakit, $golongan_darah, $jumlah_pendonor, $jenis_donor, $target_file, $nama_kontak, $no_telepon_kontak, $email_kontak);

        if ($stmt->execute()) {
            echo "Permohonan berhasil disimpan.";
        } else {
            echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
    }
}

// Tutup koneksi
//$conn->close();
?>


<?php include 'Header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan</title>

    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/permohonan.css">

</head>

<body>



    <!-- Blood Request Form Section -->
    <section class="blood-request">
        <h1 class="heading-title">Permohonan Darah</h1>

        <form action="submit_request.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="patient-name">Nama Pasien:</label>
        <input type="text" id="patient-name" name="patient_name" required>
    </div>
    <div class="form-group">
        <label for="hospital-name">Nama Rumah Sakit:</label>
        <input type="text" id="hospital-name" name="hospital_name" required>
    </div>
    <div class="form-group">
        <label for="blood-type">Golongan Darah:</label>
        <select id="blood-type" name="blood_type" required>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
        </select>
    </div>
    <div class="form-group">
        <label for="donors">Jumlah Pendonor:</label>
        <input type="number" id="donors" name="donors" required>
    </div>
    <div class="form-group">
        <label for="donation-type">Jenis Donor:</label>
        <select id="donation-type" name="donation_type" required>
            <option value="whole_blood">Whole Blood (Donor darah biasa)</option>
            <option value="apheresis">Apheresis</option>
            <option value="plasma">Plasma Konvalesen (Penyintas Covid-19)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="blood-request-form">Unggah Surat Permohonan:</label>
        <input type="file" id="blood-request-form" name="blood_request_form" accept=".pdf" required>
    </div>
    <div class="form-group">
        <label for="contact-name">Nama Kontak:</label>
        <input type="text" id="contact-name" name="contact_name" required>
    </div>
    <div class="form-group">
        <label for="contact-phone">No. Telepon/WhatsApp:</label>
        <input type="tel" id="contact-phone" name="contact_phone" required>
    </div>
    <div class="form-group">
        <label for="contact-email">Email:</label>
        <input type="email" id="contact-email" name="contact_email" required>
    </div>
    <button type="submit" class="btn">Kirim Permohonan</button>
</form>

    </section>

    <!-- footer section start -->
<!-- Footer section -->
<?php include 'footer.php'; ?>


    <!-- footer section end -->

    <!-- Swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script src="js/homepage.js"></script>
</body>

</html>
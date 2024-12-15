
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>

    
    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/FAQCss.css">

    <!-- header section start -->
<?php include 'header.php'; ?>
<!-- header section end -->
</head>

<body>

    <div class="faq-section">
    <div class="faq-container">
        <h2>FAQ SWIPE FOR LIFE</h2>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                Mengapa Harus Bayar Saat Kita Butuh Darah dari PMI?
            </div>
            <div class="faq-answer">
                Penjelasan singkat mengenai pembayaran darah dari PMI.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleAnswer(this)">
                Mengapa Kita Perlu Donor Darah?
            </div>
            <div class="faq-answer">
                <p><strong>Kebutuhan yang besar:</strong> Setiap delapan detik, ada satu orang yang membutuhkan transfusi darah di Indonesia.</p>
                <p><strong>Pemeriksaan kesehatan gratis:</strong> Sebelum mendonorkan darah, petugas akan memeriksa suhu tubuh, denyut nadi, tekanan darah, dan kadar hemoglobin Anda.</p>
                <p><strong>Tidak menyakitkan:</strong> Ya, Anda memang akan merasa sakit. Namun, rasa sakit itu tidak seberapa dan akan hilang dengan cepat.</p>
            </div>
        </div>

        <!-- Tambahkan FAQ lainnya -->
    </div>
</div>


    <!-- footer section start -->
    <?php include 'footer.php'; ?>
    <!-- footer section end -->

    <!-- Swiper js link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/FAQjavascript.js"></script>
</body>

</html>

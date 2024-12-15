<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SwipeForLife</title>

    <!-- Swiper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <!-- Custom CSS link -->
    
    <link rel="stylesheet" href="css/kontakpmi.css"> 
    <link rel="icon" href="path/to/favicon.ico" type="image/x-icon"> <!-- Favicon -->
</head>
<body>

<!-- Header section start -->
<?php include 'header.php'; ?>
<!-- Header section end -->

<!-- Contact section start -->
<section class="contact-section">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.547967720657!2d115.17023131563657!3d-8.674384195411299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd241efc77ed6e5%3A0x4b13e8ecf61784a7!2sBali%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1698102328491!5m2!1sen!2sus" 
        width="600" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy"></iframe>
    
    <div class="contact-form">
        <h2>Send Us a Message</h2>
        <form action="submit_form.php" id="contact-form">
            <div class="input-box">
                <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <textarea id="message" name="message" placeholder="Type your Message..." required></textarea>
            </div>
            <div class="input-box">
                <input type="submit" value="Send" name="submit">
            </div>
        </form>
    </div>
</section>
<!-- Contact section end -->

<!-- Footer section start -->

<link rel="stylesheet" href="css/footer.css">

<?php include 'footer.php'; ?>

<!-- footer section end -->

<!-- Swiper js link -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="js/homepage.js"></script>
</body>
</html>


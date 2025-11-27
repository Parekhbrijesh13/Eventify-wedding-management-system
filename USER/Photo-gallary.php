<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Eventify - Best Event Management Company in Gujarat</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/Eventify-logo.png" rel="icon">
  <link href="assets/img/Eventify-logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;600;700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link rel="stylesheet" href="assets/css/main.css">

  <style>
    h2 {
      text-align: center;
      margin: 50px 0 30px;
      font-size: 2rem;
      font-weight: 700;
      color: #2c2c2c;
      position: relative;
    }

    h2::after {
      content: "";
      display: block;
      width: 80px;
      height: 3px;
      background: linear-gradient(45deg, #8e44ad, #e056fd);
      margin: 10px auto 0;
      border-radius: 3px;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 25px;
      padding: 0 20px 60px;
      max-width: 1200px;
      margin: auto;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .gallery-item img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      display: block;
      transition: transform 0.4s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .gallery-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(30, 30, 30, 0.55);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.4s ease;
      font-size: 1.2rem;
      font-weight: 500;
      letter-spacing: 1px;
    }

    .gallery-item:hover .gallery-overlay {
      opacity: 1;
    }
  </style>
</head>

<body class="Photogallary-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/Eventify-logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="About.php">ABOUT</a></li>

            <li class="dropdown"><a href="serviceall.php"><span>SERVICES</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <!--<ul>
              <li><a href="#">Wedding Planner</a></li>
              <li><a href="#">Destination Wedding in Gujarat</a></li>
              <li><a href="#">Wedding Photography & Videography</a></li>
              <li><a href="#">Music & Entertainment</a></li>
            </ul>-->
          </li> 

          <li><a href="Venue.php">VENUE</a></li>
          <li><a href="Photo-gallary.php"  class="active">GALLARY</a></li>
          <li><a href="Contact-page.php" >CONTACT US</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <?php if(isset($_SESSION['admin_id'])): ?>
        <!-- If admin is logged in -->
        <div class="dropdown">
            <a class="btn-login" href="admindashboard.php"><?php echo "Admin Panel"; ?></a>
        </div>

    <?php elseif(isset($_SESSION['user_id'])): ?>
        <!-- If normal user is logged in -->
        <div class="dropdown">
            <a class="btn-login" href="dashboard.php"><?php echo "Your Profile"; ?></a>
        </div>

    <?php else: ?>
        <!-- If no one is logged in -->
        <a class="btn-login" href="login.php">Login Here</a>
    <?php endif; ?>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section class="photo-hero">
      <div class="overlay">
        <div class="container text-center">
          <h1>Photo Gallery Of Eventify!</h1>
          <p>Explore memories through our vibrant photo collection!</p>
          <p>Relive the magic of love, laughter, and unforgettable moments.</p>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <h2>Our Event Gallery</h2>
    <div class="gallery">
      <div class="gallery-item">
        <img src="assets/img/gallary/image1.jpg" alt="Photo 1">
        <div class="gallery-overlay">Wedding Celebration</div>
      </div>
      <div class="gallery-item">
        <img src="assets/img/gallary/image2.webp" alt="Photo 2">
        <div class="gallery-overlay">Destination Wedding</div>
      </div>
      <div class="gallery-item">
        <img src="assets/img/gallary/image3.webp" alt="Photo 3">
        <div class="gallery-overlay">Photography</div>
      </div>
      <div class="gallery-item">
        <img src="assets/img/gallary/image4.jpg" alt="Photo 4">
        <div class="gallery-overlay">Entertainment</div>
      </div>
      <div class="gallery-item">
        <img src="assets/img/gallary/service-alt.jpg" alt="Photo 5">
        <div class="gallery-overlay">Memorable Moments</div>
      </div>
      <div class="gallery-item">
        <img src="assets/img/gallary/couple1.jpg" alt="Photo 6">
        <div class="gallery-overlay">Music & Dance</div>
      </div>
    </div>

  </main>

  <footer id="footer" class="footer light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">
              <h3>Eventify</h3>
            </span>
          </a>
          <h4>Event Management Platform</h4>

          <div class="footer-contact pt-3">
            <p>502, Titanium City Center,<br>
              Near Sachin Tower, Prahladnagar Road,<br>
              Ahmedabad, Gujarat – 380015
            </p>
            <p class="mt-3"><strong>Phone:</strong> <span>+91 63590 61142</span></p>
            <p><strong>Email:</strong> <span>eventify901@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>QUICK LINKS</h4>
          <br>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Venues</a></li>
            <li><a href="#">Gallary</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>OUR SERVICES</h4>
          <br>
          <ul>
            <li><a href="#">Wedding Planner</a></li>
            <li><a href="#">Destination Wedding In Gujarat</a></li>
            <li><a href="#">Corporate Event Management</a></li>
            <li><a href="#">Wedding Photography & Videography</a></li>
            <li><a href="#">Music & Entertainment</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>OTHER LINKS</h4>
          <br>
          <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms Of Service</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">SignUp</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Eventify - Event Management Company</strong> <span>All
          Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="#">PAREKH BRIJESH</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

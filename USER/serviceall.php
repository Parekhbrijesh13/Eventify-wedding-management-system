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
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Raleway:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
 <link rel="stylesheet" href="assets/css/main.css">

  <!-- Extra Styles -->
  <style>
    header {
      text-align: center;
      padding: 40px 20px;
      background: linear-gradient(135deg, #8e44ad, #e056fd);
      color: white;
    }

    header h1 {
      margin: 0;
      font-size: 2.5rem;
    }

    .services {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px;
      padding: 60px 20px;
      max-width: 1200px;
      margin: auto;
    }

    .service-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      padding: 30px 25px;
      text-align: center;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
    }

    .service-card::before {
      content: "";
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at center, rgba(142, 68, 173, 0.08), transparent 70%);
      transform: scale(0);
      transition: transform 0.6s ease;
      z-index: 0;
    }

    .service-card:hover::before {
      transform: scale(1);
    }

    .service-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
    }

    .service-card h2 {
      margin-top: 15px;
      font-size: 1.6rem;
      font-weight: 600;
      background: linear-gradient(45deg, #8e44ad, #e056fd);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      position: relative;
      z-index: 1;
    }

    .service-card p {
      line-height: 1.6;
      margin-top: 15px;
      color: #555;
      font-size: 0.95rem;
      position: relative;
      z-index: 1;
    }

    .service-icon {
      font-size: 40px;
      color: #8e44ad;
      background: rgba(224, 86, 253, 0.1);
      border-radius: 50%;
      padding: 15px;
      display: inline-block;
      margin-bottom: 10px;
      transition: all 0.4s ease;
      z-index: 1;
      position: relative;
    }

    .service-card:hover .service-icon {
      background: linear-gradient(45deg, #8e44ad, #e056fd);
      color: #fff;
      transform: rotate(15deg) scale(1.1);
    }
  </style>

</head>

<body class="Contact-page-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="assets/img/Eventify-logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="About.php">ABOUT</a></li>

            <li class="dropdown"><a href="serviceall.php"  class="active"><span>SERVICES</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <!--<ul>
              <li><a href="#">Wedding Planner</a></li>
              <li><a href="#">Destination Wedding in Gujarat</a></li>
              <li><a href="#">Wedding Photography & Videography</a></li>
              <li><a href="#">Music & Entertainment</a></li>
            </ul>-->
          </li> 

          <li><a href="Venue.php">VENUE</a></li>
          <li><a href="Photo-gallary.php">GALLARY</a></li>
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
    <section class="contact-hero-parallax">
      <div class="overlay">
        <div class="container text-center">
          <h1>Wedding Planners in Gujarat</h1>
          <p>Planning a wedding can be an exciting but also overwhelming experience. 
             That’s where wedding planners come in – we’re like the fairy godmothers of weddings,
             waving their magic wand to make your dream wedding come to life!</p>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
      <!-- Wedding Planner -->
      <div class="service-card" id="wedding-planner">
        <div class="service-icon"><i class="bi bi-heart-fill"></i></div>
        <h2>Wedding Planner</h2>
        <p>
          From concept to execution, our professional wedding planners take care of every detail. 
          We handle themes, décor, scheduling, logistics, and more so you can enjoy your big day stress-free.
        </p>
      </div>

      <!-- Destination Wedding -->
      <div class="service-card" id="destination">
        <div class="service-icon"><i class="bi bi-geo-alt-fill"></i></div>
        <h2>Destination Wedding in Gujarat</h2>
        <p>
          Experience a magical wedding in Gujarat at breathtaking venues. 
          We arrange heritage palaces, luxury resorts, and beachside ceremonies tailored to your preferences.
        </p>
      </div>

      <!-- Photography & Videography -->
      <div class="service-card" id="photography">
        <div class="service-icon"><i class="bi bi-camera-reels-fill"></i></div>
        <h2>Wedding Photography & Videography</h2>
        <p>
          Capture every precious moment with our professional photographers and videographers. 
          We specialize in candid, cinematic, and traditional wedding shoots.
        </p>
      </div>

      <!-- Music & Entertainment -->
      <div class="service-card" id="music">
        <div class="service-icon"><i class="bi bi-music-note-beamed"></i></div>
        <h2>Music & Entertainment</h2>
        <p>
          From live bands to DJs, traditional performances, and dance troupes, 
          we provide entertainment that makes your wedding unforgettable.
        </p>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer id="footer" class="footer light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename"><h3>Eventify</h3></span>
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
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Eventify - Event Management Company</strong> <span>All Rights Reserved</span></p>
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
  <script src="assets/js/formvalidation.js"></script>

</body>
</html>

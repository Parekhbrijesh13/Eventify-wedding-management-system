<?php session_start(); ?>
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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <link rel="stylesheet" href="assets/css/main.css">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pacifico&family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">


    <style>
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            max-width: 620px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        h4 {
            color: #7b3ca0;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
        }
        h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #000;
        }
        p {
            font-size: 14px;
            color: #555;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        .form-group {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        .form-field {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
            color: #222;
        }
        .required {
            color: red;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        input[type="number"] {
            border: none;
            border-bottom: 1px solid #ccc;
            padding: 8px 0;
            font-size: 14px;
            outline: none;
            background: transparent;
        }
        input::placeholder {
            color: #aaa;
        }
        input:focus {
            border-color: #7b3ca0;
        }
        input[type="date"] {
        border: none;
        border-bottom: 1px solid #ccc;
        padding: 8px 0;
        font-size: 14px;
        outline: none;
        background: transparent;
        color: #555;
        font-family: 'Poppins', sans-serif;
        position: relative;
        }

        input[type="date"]:focus {
            border-color: #7b3ca0;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background: url('data:image/svg+xml;utf8,<svg fill="%237b3ca0" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>') no-repeat center;
            background-size: 18px 18px;
            cursor: pointer;
            opacity: 0.7;
        }

        input[type="date"]::-webkit-calendar-picker-indicator:hover {
            opacity: 1;
        }

        .radio-group {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-top: 5px;
            font-size: 14px;
        }
        .radio-group input {
            accent-color: #7b3ca0;
        }
        .submit-btn {
            background-color: #7b3ca0;
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
        }
        .submit-btn:hover {
            background-color: #692b85;
        }
        .flatpickr-calendar {
        font-family: 'Poppins', sans-serif;
        border-radius: 12px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .flatpickr-day.selected {
            background: #7b3ca0;
            border-color: #7b3ca0;
            color: #fff;
        }

        .flatpickr-day:hover {
            background: rgba(123, 60, 160, 0.1);
        }

        select {
        padding: 6px 10px; /* smaller padding */
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        font-size: 13px; /* slightly smaller text */
        color: #333;
        outline: none;
        cursor: pointer;
        transition: border-color 0.3s, box-shadow 0.3s;
        }

        select:hover {
            border-color: #888;
        }

        select:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 3px rgba(74, 144, 226, 0.5);
        }

        option {
            padding: 6px;
            font-size: 13px;
            background-color: #fff;
            color: #333;
        }
        .book-now-section {
            padding: 60px 0;
            background-color: #fffaf0; /* ivory cream */
              width: 100%;
        }

        .form-container {
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: linear-gradient(135deg, #fffdf9 0%, #fefbf7 100%);
        }

        .form-container h2 {
        margin-bottom: 15px;
        font-weight: bold;
        }

        .form-container h4 {
        color: #6a0dad;
        font-weight: bold;
        }

        .submit-btn {
        background: #6a0dad;
        color: #fff;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
        width: 100%;
        }

        .submit-btn:hover {
        background: #520a99;
        }

        /* Image Styles */
        .about-images {
        display: flex;
        flex-direction: column;
        align-items: center; 
        gap: 10px; /* images ke beech ka gap control */
        }

        .img-fill {
        height: 90%;
        object-fit: cover;
        width: 90%;
        margin: 0; /* extra margin hatao */
        margin-left:50px;
        }

        .img-half {
        height: 250px;
        object-fit: cover;
        width: 90%;
        margin: 0; /* gap dur hoga */
        margin-bottom:60px;
        margin-left:50px;
        }

        .about-images img {
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: 0.3s ease-in-out;
        display: block;  /* default inline spacing hatao */
        }

    </style>

</head>

<body class="booknow-page-page">
  <header id="header" class="header d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/Eventify-logo.png" alt=""> 
        <!--<h1 class="sitename">Eventify</h1><span>.</span>-->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="About.php">ABOUT</a></li>

            <li class="dropdown"><a href="#services"><span>SERVICES</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Wedding Planner</a></li>
              <li><a href="#">Destination Wedding in Gujarat</a></li>
              <li><a href="#">Wedding Photography & Videography</a></li>
              <li><a href="#">Music & Entertainment</a></li>
            </ul>
          </li> 

          <li><a href="Venue.php">VENUE</a></li>
          <li><a href="#">GALLARY</a></li>
          <li><a href="Contact-page.php">CONTACT US</a></li>
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

        <section class="booknow-parallax">  <!-- 1st Heading Section -->
        <div class="overlay">
            <div class="container text-center">
            <h1>Book Now</h1>
            <p>“Your perfect celebration is just a click away<br> book now to reserve your date with Eventify Weddings.”</p>
            </div>
        </div>
        </section>

        <section class="book-now-hero" role="banner" aria-label="Book Now"> <!-- 2nd Heading Section -->
        <div class="book-now-wrap">
            <h1 class="book-now-title">
                Secure your dream wedding today!
            </h1>
            <p class="book-now-sub">
                Fill out the form below to book our services and let us make your special day unforgettable.
            </p>
        </div>
        </section>


        <section class="book-now-section" >
    <div class="container">
      <div class="row align-items-stretch">
        
        <!-- Left Column: Form -->
        <div class="col-lg-6 d-flex">
          <div class="form-container w-100">
            <h4>EVENTIFY EVENTS</h4>
            <h2>Request Pricing</h2>
            <p>Fill this form and we will contact you shortly. All the information provided will be treated confidentially.</p>

            <form action="forms/mainformdb.php" method="post">
              <div class="row mb-3">
                <div class="col">
                  <label>Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Full Name" name="FullName" required>
                </div>
                <div class="col">
                  <label>Phone number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" placeholder="Phone number" name="PhoneNumber" required>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label>Email address<span class="text-danger">*</span></label>
                  <input type="email" 
                  class="form-control" 
                  placeholder="Email address" 
                  name="Email" 
                  value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" 
                  readonly>

                </div>
                <div class="col">
                  <label>Function date <span class="text-danger">*</span></label>
                  <input type="date" id="function-date" class="form-control" placeholder="Select Date" name="Date" required onchange="fetchAvailableVenues()">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label>Number of guests<span class="text-danger">*</span></label>
                  <input type="number" class="form-control" placeholder="Number of guests" name="NumberOfGuest">
                </div>
                <div class="col">
                  <label>Your Budget (Approx.) <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" placeholder="Your Budget (Approx.)" name="budget">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label>Your City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Your City" name="City" required>
                </div>

                <div class="col">
                  <label for="venue">Venue<span class="text-danger">*</span></label>

                  <select id="venue" name="Venue" class="form-control" required>
                      <option value="">Please select a date first</option>
                  </select>





                </div>
                
              </div>

              <div class="row mb-3">
                <div class="col">
                  <label>Function Type <span class="text-danger">*</span></label>
                  <div class="d-flex gap-3">
                    <label><input type="radio" name="FunctionType" value="Wedding" required> Wedding</label>
                    <label><input type="radio" name="FunctionType" value="Other events"> Other events</label>
                  </div>
                </div>
                <div class="col">
                  <label>Function Time <span class="text-danger">*</span></label>
                  <div class="d-flex gap-3">
                    <label><input type="radio" name="FunctionTime" value="Day" required> Day</label>
                    <label><input type="radio" name="FunctionTime" value="Evening"> Evening</label>
                  </div>
                </div>
              </div>

              <button class="submit-btn" type="submit">Check Availability & Prices</button>
            </form>

          </div>
        </div>

        <!-- Right Column: Images -->
        <div class="col-lg-6 d-flex">
          <div class="about-images w-100">
            <div class="row h-100 g-3">
              <!-- Large image (left side) -->
              <div class="col-6 h-100">
                <img src="assets/img/Home_Images/image7.jpg" class="img-fill" alt="">
              </div>
              <!-- Two stacked images (right side) -->
              <div class="col-6 d-flex flex-column justify-content-between">
                <img src="assets/img/Home_Images/image8.jpg" class="img-half mb-3" alt="">
                <img src="assets/img/Home_Images/image11.jpg" class="img-half" alt="">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <br><br>

    <section class="location-section">
      <div class="location-left">
        <div class="overlay-content">
          <h2>Getting Here</h2>
          <p>Prahladnagar Road,Ahmedabad, Gujarat – 380015</p>
          <p>Mobile: +91 65590 61142</p>
          <p>Email: eventify901@gmail.com</p>
          <a href="https://maps.google.com" target="_blank" class="btn">Get Directions</a>
        </div>
      </div>

      <div class="location-right">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3706.5009!2d71.2265!3d21.6035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39588f9289f3b8ff%3A0xa2c!2sAmreli!5e0!3m2!1sen!2sin!4v1685782586494"
          width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </section>

    </main>

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
            <li><a href="#">Loing</a></li>
            <li><a href="#">SignUp</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Eventify - Event Management Company</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">PAREKH BRIJESH</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

            <script>
function fetchAvailableVenues() {
    const selectedDate = document.getElementById('function-date').value;

    if (!selectedDate) {
        document.getElementById('venue').innerHTML = '<option value="">Please select a date first</option>';
        return;
    }

    fetch('get_available_venues.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'Date=' + encodeURIComponent(selectedDate)
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('venue').innerHTML = data;
    })
    .catch(error => {
        console.error('Error fetching venues:', error);
        document.getElementById('venue').innerHTML = '<option value="">Error loading venues</option>';
    });
}
</script>



   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>
    <script>
        flatpickr("#function-date", {
        mode: "range",              // Enable date range selection
        dateFormat: "Y-m-d",        // Format for DB
        altInput: true,             // Pretty UI for users
        altFormat: "F j, Y",        // Example: August 24, 2025
        minDate: "today"            // No past dates allowed
    });
    </script>

</body>

</html> 

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">




  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Pacifico&family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">


  <!-- Main CSS File -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/Eventify-logo.png" alt=""> 
        <!--<h1 class="sitename">Eventify</h1><span>.</span>-->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">HOME</a></li>
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
          <li><a href="Photo-gallary.php">GALLARY</a></li>
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


      <section class="index-hero-parallax">
        <video autoplay muted loop playsinline class="hero-video" id="parallaxVideo">
          <source src="assets/img/Eventify_hero.mp4" type="video/mp4" />
          Your browser does not support the video tag.
        </video>

        <div class="overlay">
          <h1>Partner with Eventify<br>Event Management in <br>Gujarat.</h1>
            <a href="<?php echo isset($_SESSION['user_name']) ? 'booknow.php' : '#'; ?>" onclick="<?php echo isset($_SESSION['user_name']) ? '' : 'alert(\'Login first!\'); return false;'; ?>">
                <button class="btn-getstarted" id="showFormBtn">
                    Make It Happen <i class="fa fa-arrow-right"></i>
                </button>
            </a>
         </div>
        </div>
      </section>

      <section class="stats-section" id="stats">
        <div class="stat-box">
          <h2 class="counter" data-target="15">0</h2>
          <p>Years of Experience</p>
        </div>
        <div class="stat-box">
          <h2 class="counter" data-target="1700">0</h2>
          <p>Events Covered</p>
        </div>
        <div class="stat-box">
          <h2 class="counter" data-target="1500">0</h2>
          <p>Satisfied Clients</p>
        </div>
        <div class="stat-box">
          <h2 class="counter" data-target="4.8">0</h2>
          <p>Customer Rating</p>
        </div>
      </section>
      <br>
    <section class="eventify-section">
    <div class="eventify-container">
      
      <!-- Image Grid -->
      <div class="eventify-images">
        <img src="assets/img/Eventify-content/image1.jpg" alt="Event 1">
          <img src="assets/img/Eventify-content/image2.webp" alt="Event 2">
          <img src="assets/img/Eventify-content/image3.webp" alt="Event 3">
          <img src="assets/img/Eventify-content/image4.jpg" alt="Event 4">
      </div>

      <!-- Text + Buttons -->
      <div class="eventify-box">
        <h2>PLAN YOUR DREAM EVENT WITH EVENTIFY</h2>
        <p>
          Make your moments unforgettable with Eventify's expert event planning services.
          Whether it's a royal wedding, a corporate gala, or an intimate celebration, we bring your vision to life.
          From stunning decor to seamless management, we ensure your event is memorable and stress-free.
          Trusted across India and beyond, Eventify is your ideal partner.
        </p>

        <div class="eventify-buttons">
          <a href="booknow.php" class="btn call-btn">📞 Secure Your Wedding</a>
          <a href="https://wa.me/916359061142?text=Hi%20I%20want%20to%20know%20more%20about%20your%20services"
           class="btn whatsapp-btn">💬 Whatsapp us</a>
        </div>
      </div>

    </div>
  </section>
<br><br>
<!--Service section-->

    <section id="services-alt" class="services-alt section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <!-- Left Content Block -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="content-block">
          <h1 class="subtitle">Our Eventify Services</h1>
          <h2 class="title">We Make Every Event Memorable</h2>
          <p class="description">
            From weddings to corporate galas, we plan and manage events with creativity, passion, and precision. Eventify ensures your special day is unforgettable and stress-free.
          </p>
          <div class="button-wrapper">
            <a class="btn" href="serviceall.php"><span>Explore All Services</span></a>
          </div>
          <br>
            <!--<div class="image-wrapper mt-4">
              <img src="assets/mg/service-alt1.jpg" alt="Our event services" class="img-fluid rounded shadow-sm">
            </div>-->
        </div>
      </div>

      <!-- Right Service List -->
      <div class="col-lg-6">
        <div class="services-list">
          <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="service-icon">
              <i class="bi bi-calendar-event-fill"></i>
            </div>
            <div class="service-content">
              <h4><a href="service-details.html">Event Planning</a></h4>
              <p>Customized planning for weddings, parties, and corporate events.</p>
            </div>
          </div>

          <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
            <div class="service-icon">
              <i class="bi bi-basket-fill"></i>
            </div>
            <div class="service-content">
              <h4><a href="service-details.html">Catering Services</a></h4>
              <p>Delicious, multi-cuisine menus tailored for your event style.</p>
            </div>
          </div>

          <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
            <div class="service-icon">
              <i class="bi bi-speaker"></i>
            </div>
            <div class="service-content">
              <h4><a href="service-details.html">Sound & Entertainment</a></h4>
              <p>Top-notch DJs, live music, and entertainment setups.</p>
            </div>
          </div>

          <div class="service-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
            <div class="service-icon">
              <i class="bi bi-flower1"></i>
            </div>
            <div class="service-content">
              <h4><a href="service-details.html">Venue Decoration</a></h4>
              <p>Elegant themes, floral design, lighting & decor perfection.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Sevice section end-->


    <!-- Call To Action 2 Section -->
    <section id="call-to-action-2" class="call-to-action-2 section light-background py-4">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-5 align-items-center justify-content-center">
      
      <!-- Image Side -->
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="cta-image-wrapper">
          <img src="assets/img/Home_Images/cta-img1.jpg" alt="Eventify Planning" class="img-fluid rounded-4 shadow-sm">
        </div>
      </div>

      <!-- Content Side -->
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="cta-content">
          <h2>Let's Bring Your Dream Event to Life</h2>
          <p class="lead">
            Whether it's a wedding, birthday, or corporate gathering — Eventify turns your vision into an unforgettable reality with expert planning and elegant execution.
          </p>

          <div class="cta-features">
            <div class="feature-item" data-aos="zoom-in" data-aos-delay="400">
              <i class="bi bi-check-circle-fill text-success"></i>
              <span>Personalized Planning for Every Occasion</span>
            </div>
            <div class="feature-item" data-aos="zoom-in" data-aos-delay="450">
              <i class="bi bi-check-circle-fill text-success"></i>
              <span>Experienced Team & Trusted Vendors</span>
            </div>
            <div class="feature-item" data-aos="zoom-in" data-aos-delay="500">
              <i class="bi bi-check-circle-fill text-success"></i>
              <span>Elegant Decor & Seamless Execution</span>
            </div>
          </div>

          <div class="cta-action mt-4">
            <a href="signup.php" class="btn btn-primary">Join Us</a>
            <a href="serviceall.php" class="btn btn-outline-primary">Explore Services</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


    <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Wedding Packages</h2>
    <p class="wedding-subtitle">
      "Affordable Packages, Unforgettable Weddings"<br>
      <span>Choose a wedding package that fits your dream and your budget.</span>
    </p>

  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4 justify-content-center">

      <!-- Basic Plan -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="pricing-card">
          <h3>Classic Ceremony</h3>
          <div class="price">
            <span class="currency">₹</span>
            <span class="amount">25,000</span>
            <span class="period">/ event</span>
          </div>
          <p class="description">Perfect for intimate weddings with close family. Simple yet elegant arrangements to make your special day memorable.</p>

          <h4>Includes:</h4>
          <ul class="features-list">
            <li><i class="bi bi-check-circle-fill"></i> Basic Stage Decoration</li>
            <li><i class="bi bi-check-circle-fill"></i> Sound Setup (1 Mic, 2 Speakers)</li>
            <li><i class="bi bi-check-circle-fill"></i> Welcome Gate Decoration</li>
          </ul>

          <a href="venue.php" class="btn btn-primary">
            Show Packages
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- Standard Plan -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="pricing-card popular">
          <div class="popular-badge">Most Popular</div>
          <h3>Royal Wedding</h3>
          <div class="price">
            <span class="currency">₹</span>
            <span class="amount">65,000</span>
            <span class="period">/ event</span>
          </div>
          <p class="description">For those who want grandeur without going over the top. Traditional elements blended with modern aesthetics.</p>

          <h4>Includes:</h4>
          <ul class="features-list">
            <li><i class="bi bi-check-circle-fill"></i> Designer Stage Setup</li>
            <li><i class="bi bi-check-circle-fill"></i> Live DJ & Sound System</li>
            <li><i class="bi bi-check-circle-fill"></i> LED Lighting & Entrance Arch</li>
            <li><i class="bi bi-check-circle-fill"></i> Basic Photography (Candid + Traditional)</li>
          </ul>

          <a href="venue.php" class="btn btn-light">
            Show Packages
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

      <!-- Premium Plan -->
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="pricing-card">
          <h3>Destination Weddings</h3>
          <div class="price">
            <span class="currency">₹</span>
            <span class="amount">1,25,000</span>
            <span class="period">/ event</span>
          </div>
          <p class="description">Go all-in for your wedding day. Luxurious decorations, cinematic photography, and royal-level coordination.</p>

          <h4>Includes:</h4>
          <ul class="features-list">
            <li><i class="bi bi-check-circle-fill"></i> Grand Floral Stage Setup</li>
            <li><i class="bi bi-check-circle-fill"></i> Full Venue Theme Decoration</li>
            <li><i class="bi bi-check-circle-fill"></i> Drone & 4K Wedding Film</li>
            <li><i class="bi bi-check-circle-fill"></i> Baraat & Entry Coordination</li>
            <li><i class="bi bi-check-circle-fill"></i> Bride-Groom Special Photoshoot</li>
          </ul>

          <a href="venue.php" class="btn btn-primary">
            Show Packages
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div>

    </div>
  </div>
</section><!-- /Pricing Section -->

    
    <!-- Wedding Team Section -->
<section id="team" class="team section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Meet the Wedding Experts</h2>
    <p>Our passionate team brings your dream wedding to life — with heart, tradition, and creativity.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-5">

      <!-- Team Member 1 -->
      <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="team-card">
          <div class="team-image">
            <img src="assets/img/Team-section/brijesh.png" class="img-fluid" alt="Kunal Shah - Creative Head">
            <div class="team-overlay">
              <p>Specializes in grand wedding concepts, stage design, and artistic event experiences.</p>
              <div class="team-social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="team-content">
            <h4>Brijesh Parekh</h4>
            <span class="position">Creative Head</span>
          </div>
        </div>
      </div>

      <!-- Team Member 2 -->
      <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="team-card">
          <div class="team-image">
            <img src="assets/img/person/person-f-6.webp" class="img-fluid" alt="Meera Desai - Bridal Consultant">
            <div class="team-overlay">
              <p>Helps brides with every detail — from makeup & attire to cultural rituals and timelines.</p>
              <div class="team-social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="team-content">
            <h4>Priyanka Parekh</h4>
            <span class="position">Bridal Consultant</span>
          </div>
        </div>
      </div>

      <!-- Team Member 3 -->
      <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
        <div class="team-card">
          <div class="team-image">
            <img src="assets/img/person/person-m-6.webp" class="img-fluid" alt="Raghav Verma - Venue Expert">
            <div class="team-overlay">
              <p>Knows the perfect locations for every ceremony — from royal palaces to beachside venues.</p>
              <div class="team-social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="team-content">
            <h4>Karan Parekh</h4>
            <span class="position">Venue Expert</span>
          </div>
        </div>
      </div>

      <!-- Team Member 4 -->
      <div class="col-md-6 col-lg-3" data-aos="zoom-in" data-aos-delay="400">
        <div class="team-card">
          <div class="team-image">
            <img src="assets/img/person/person-f-3.webp" class="img-fluid" alt="Anjali Mehta - Event Coordinator">
            <div class="team-overlay">
              <p>Handles logistics, timelines, vendors, and guest management — so you can enjoy stress-free.</p>
              <div class="team-social">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="team-content">
            <h4>Ankit Parekh</h4>
            <span class="position">Event Coordinator</span>
          </div>
        </div>
      </div>

    </div>
  </div>

</section><!-- /Wedding Team Section -->

    <br><br>
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Client Testimonials</h2>
        <h1 style="color:black;">See What our Clients has to Say.</h1>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 800,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": 1,
              "spaceBetween": 30,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "768": {
                  "slidesPerView": 2
                },
                "1200": {
                  "slidesPerView": 3
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "We couldn’t have asked for a better team.
                     Eventify handled everything with love and care, making our special day unforgettable."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="assets/img/Home_Images/cta-img.jpg" alt="Profile Image">
                    <div>
                      <h3>Rahul & Sneha</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                  <i class="bi bi-quote quote-icon"></i>
                      "From start to finish, Eventify made everything effortless.
                       Our wedding felt like a fairy tale, and every detail was perfect."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="assets/img/Home_Images/cta-img1.jpg" alt="Profile Image">
                    <div>
                      <h3>Dev & Ananya</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Eventify sprinkled magic on every moment. 
                    The décor, the planning, the execution — simply breathtaking."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="assets/img/Home_Images/image7.jpg" alt="Profile Image">
                    <div>
                      <h3>Arjun & Kavya</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "They treated our wedding as if it were their own. 
                    Eventify brought our vision to life in ways we never imagined."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="assets/img/Home_Images/image2.jpg" alt="Profile Image">
                    <div>
                      <h3>Rohan & Priya</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Thanks to Eventify, our big day was stress-free, beautiful, 
                    and full of joy. Every guest still talks about it!"
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="assets/img/Home_Images/image5.jpeg" alt="Profile Image">
                    <div>
                      <h3>Vihaan & Ishita</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-card">
                <div class="testimonial-content">
                  <p>
                    <i class="bi bi-quote quote-icon"></i>
                    "Eventify didn’t just plan a wedding — they created moments we’ll treasure forever. 
                    Every detail spoke of elegance and love."
                  </p>
                </div>
                <div class="testimonial-profile">
                  <div class="rating">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <div class="profile-info">
                    <img src="assets/img/Home_Images/image6.jpg" alt="Profile Image">
                    <div>
                      <h3>Aarav & Meera</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <div class="faq-contact-card">
              <div class="card-icon">
                <i class="bi bi-question-circle"></i>
              </div>
              <div class="card-content">
                <h3>Still Have Questions?</h3>
                <p>Frequently Asked Questions
                  Explore answers to the most common questions couples ask us about creating their dream wedding day.</p>
                <div class="contact-options">

                  <a href="mailto:parekhbrijesh901@gmail.com?subject=Service Inquiry&body=Hi, I want to know more about your services." target="_blank" class="contact-option">
                    <i class="bi bi-envelope"></i>
                    <span>Email Support</span>
                  </a>
                  <a href="https://wa.me/916359061142?text=Hi%20I%20want%20to%20know%20more%20about%20your%20services" class="contact-option">
                    <i class="bi bi-whatsapp"></i>
                    <span>Whatsapp</span>
                  </a>
                  <a href="tel:+916359061142" class="contact-option">
                    <i class="bi bi-telephone"></i>
                    <span>Call Us</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-accordion">
              <div class="faq-item ">
                <div class="faq-header">
                  <h3>How much does event management cost in Gujarat?</h3>
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </div>
                <div class="faq-content">
                  <p style="font-weight:bold;">
                    Event management costs in Gujarat can start from ₹50,000 for small-scale events and go up to ₹10–20 lakhs 
                    for large, luxury weddings. The final cost depends on the 
                    scale, venue, décor, catering, and services chosen.
                  </p>
                </div>
              </div><!-- End FAQ Item-->

              <div class="faq-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="faq-header">
                  <h3>What Event Management Services does Eventify Event Management Company provide in Gujarat?</h3>
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </div>
                <div class="faq-content">
                  <p style="font-weight:bold;">
                    Eventify offers complete wedding planning and event management services across Gujarat.
                    We handle everything from venue selection, theme décor, and catering to photography, entertainment, and guest hospitality.
                    Our team provides full planning, partial planning, or day-of coordination—tailored to your needs.
                    With creative designs, reliable vendors, and flawless execution, we make your celebration truly unforgettable.
                  </p>
                </div>
              </div><!-- End FAQ Item-->

              <div class="faq-item">
                <div class="faq-header">
                  <h3>How much does a destination wedding cost in Gujarat?</h3>
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </div>
                <div class="faq-content">
                  <p style="font-weight:bold;">
                    A destination wedding in Gujarat typically ranges from approximately ₹30 lakhs to ₹2 crores, 
                    depending on venue, guest count, décor, catering, accommodations, and extra services like entertainment.
                  </p>
                </div>
              </div><!-- End FAQ Item-->

              <div class="faq-item">
                <div class="faq-header">
                  <h3>Why is entertainment important in weddings? Do you offer entertainment services?</h3>
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </div>
                <div class="faq-content">
                  <p style="font-weight:bold;">
                    Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Vestibulum ac diam sit amet quam vehicula elementum.
                  </p>
                </div>
              </div><!-- End FAQ Item-->

              <div class="faq-item">
                <div class="faq-header">
                  <h3>Why Should We Hire an Event Planner/ Event Management Company?</h3>
                  <i class="bi bi-chevron-down faq-toggle"></i>
                </div>
                <div class="faq-content">
                  <p style="font-weight:bold;">
                    Donec sollicitudin molestie malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel.
                  </p>
                </div>
              </div><!-- End FAQ Item-->
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/formvalidation.js"></script>

</body>
</html>
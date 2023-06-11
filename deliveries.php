<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZFV Enterprises</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logozfv.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Presento
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/presento-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.php">ZFV Enterprises<span></span></a></h1>
      <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logozfv.png" alt=""></a> -->
      <!-- Uncomment below if you prefer to use an image logo -->
    

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <!-- <li><a class="nav-link scrollto" href="index.php">About</a></li> -->
          <li class="dropdown"><a href="index.php"><span>Products</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="product_hardware.php">Hardware Supplies</a></li>
                <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li> -->
                <li><a href="product_scaffolding.php">Scaffoldings</a></li>
                <li><a href="product_plumbing.php">Plumbings</a></li>
                <li><a href="product_roofing.php">Roofings</a></li>
                <li><a href="product_electrical.php">Electricals</a></li>
                <li><a href="product_cctv.php">CCTVs </a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#pricing"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="renting.php">Renting</a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> -->
              <li><a href="contracts.php">Contracts</a></li>
              <li><a href="estimation.php">Estimation</a></li>
              <li><a href="reservation.php">Reservation</a></li>
              <li><a href="installation.php">Installation</a></li>
              <li><a href="deliveries.html">Deliveries</a></li>

            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto " href="portfolio.html">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li><a href="blog.php">Blog</a></li> -->

          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->
    </div>
  </header><!-- End Header -->
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Services</li>
        </ol>
        <h2>Deliveries</h2>

      </div>
    </section><!-- End Breadcrumbs -->

      <?php
      // Database connection configuration
      $servername = "localhost";
      $username = "root";
      $password = " ";
      $dbname = "zfventerprise";

      // Create a new PDO instance
      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
          die("Connection failed: " . $e->getMessage());
      }

      // Fetch the service description from the database
      try {
          $stmt = $conn->prepare("SELECT description6 FROM services6");
          $stmt->execute();
          $result = $stmt->fetch(PDO::FETCH_ASSOC);
          $description6 = $result['description6'];
      } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      ?>

      <div id="blog" class="blog container text-center" data-aos="fade-up">
          <div class="row justify-content-center">
              <div class="col-lg-8 entries">
                  <article class="entry">
                      <div class="entry-img">
                          <div class="text-center">
                              <img src="assets/img/blog/se6.png" alt="" class="img-fluid">
                          </div>
                      </div>
                      <h2 class="entry-title">
                          <a href="contact.php">Contracts Information</a>
                      </h2>
                      <div class="entry-content text-center">
                          <p><?php echo $description6; ?></p>
                          <div class="read-more">
                              <a href="contact.php">Inquire Now</a>
                          </div>
                      </div>
                  </article><!-- End blog entry -->
              </div>
          </div>
      </div>


  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>ZFV  Enterprises<span>.</span></h3>
            <p>
             113 Magsaysay Street <br>
             Baliua, gBulacan<br>
             Philippines <br><br>
              <strong>Phone:</strong> +09958416976 <br>
              <strong>Email:</strong> info@zfventerprises.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hardware Supplies</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Scaffoldings</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Rooofings</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Deliveries</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Installations</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Be our most creative project partner for construction</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>ZFV Enterprises</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
          Develop by <a href="https://bootstrapmade.com/">ZFV Technologies</a>
        </div>
      </div>
      <div class="social-links text-center text-md-end pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
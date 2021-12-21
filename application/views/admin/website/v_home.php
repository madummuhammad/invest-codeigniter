<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Atoze Capitel - Index</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/img/logo.png" rel="icon">
  <link href="<?php echo base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Atoze Capital</span>
      </a>

      <?php if ($this->uri->segment(2)=='indonesia'): ?>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
            <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
            <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Portofolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Tim</a></li>
            <li><a class="nav-link scrollto" href="#clients">Kemitraan</a></li>
            <!-- <li><a class="nav-link scrollto" href="#blog">Blog</a></li> -->
            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      <?php else: ?>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#services">Services</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
            <li><a class="nav-link scrollto" href="#team">Teams</a></li>
            <li><a class="nav-link scrollto" href="#clients">Partnership</a></li>
            <!-- <li><a class="nav-link scrollto" href="#blog">Blog</a></li> -->
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      <?php endif ?>
      
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="container">
      <?php foreach ($home as $row => $value): ?>
        <div class="row">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">
            <i class="fas fa-edit"></i>
          </button>

          <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>
          <div id="modalhome" class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up"><?php echo $value['judul'] ?></h1>
            <h2 data-aos="fade-up" data-aos-delay="400"><?php echo $value['content'] ?></h2>
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                  <?php if ($this->uri->segment(2)=='indonesia'): ?>
                    <span>Gabung Bersama Kami</span>
                  <?php else: ?>
                    <span>Join With Us</span>
                  <?php endif ?>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?php echo base_url() ?>/assets/img/hero-img.png" class="img-fluid" alt="">

          </div>
          
        </div>
      <?php endforeach ?>
    </div>
  </section><!-- End Hero -->
  <svg class="svg-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#242424" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,202.7C384,224,480,224,576,208C672,192,768,160,864,165.3C960,171,1056,213,1152,218.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <?php foreach ($about as $row => $value): ?>
          <div class="row gx-0">

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h3><?php echo $value['judul'] ?></h3>
                <h2><?php echo $value['tagline'] ?></h2>
                <p>
                  <?php echo $value['content'] ?>
                </p>
              <!-- <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Read More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div> -->
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?php echo base_url() ?>/assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      <?php endforeach ?>
    </div>

  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <?php if ($this->uri->segment(3)=='indonesia'): ?>
          <h2>Layanan</h2>
        <?php else: ?>
          <h2>Service</h2>
        <?php endif ?>

        <div class="divider"></div>
        <!-- <p>Veritatis et dolores facere numquam et praesentium</p> -->
      </header>

      <div class="row gy-4">
        <?php foreach ($service as $key => $value): ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box">
              <i class="ri-discuss-line icon"></i>
              <h3><?php echo $value['judul'] ?></h3>
              <p><?php echo $value['content'] ?></p>
              <!-- <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a> -->
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>

  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Portfolio</h2>
        <div class="divider"></div>
      </header>
      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php foreach ($portofolio as $key => $value): ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo base_url() ?>/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $value['judul'] ?></h4>
                <p><?php echo $value['content'] ?></p>
                <div class="portfolio-links">
                  <a href="<?php echo base_url() ?>/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                  <!-- <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a> -->
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>

  </section><!-- End Portfolio Section -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <?php if ($this->uri->segment(2)=='indonesia'): ?>
          <h2>TIM</h2>
        <?php else: ?>
          <h2>Team</h2>
        <?php endif ?>

        <div class="divider"></div>
      </header>

      <div class="row gy-4">
        <?php foreach ($team as $key => $value): ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="<?php echo base_url() ?>/assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4><?php echo $value['nama'] ?></h4>
                <span><?php echo $value['jabatan'] ?></span>
                <p><?php echo $value['tagline'] ?></p>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>

  </section><!-- End Team Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <?php if ($this->uri->segment(2)=='indonesia'): ?>
          <h2>Mitra Kami</h2>
        <?php else: ?>
          <h2>Our Partner</h2>
        <?php endif ?>
        
        <div class="divider"></div>
      </header>

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <?php foreach ($partner as $key => $value): ?>
            <div class="swiper-slide"><img src="<?php echo base_url() ?>assets/img/clients/<?php echo $value['gambar'] ?>" class="img-fluid" alt=""></div>
          <?php endforeach ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section><!-- End Clients Section -->
  <!-- End Recent Blog Posts Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="">
          <!-- <h2>Contact</h2>
            <p>Contact Us</p> -->
          </header>

          <?php if ($this->uri->segment(2)=='indonesia'): ?>
            <div class="row gy-4">
              <div class="col-lg-12">
                <h2 class="text-center">Bergabung dengan Kami</h2>
                <h3 class="text-center">Dapatkan kesuksesan bersama kami</h3>
              </div>
              <div class="col-lg-12 d-flex justify-content-center">
                <a href="" class="custom-btn-outline-primary px-5 py-2">Bergabung</a>
              </div>
            </div>
          <?php else: ?>
            <div class="row gy-4">
              <div class="col-lg-12">
                <h2 class="text-center">Join the Community</h2>
                <h3 class="text-center">Get all the latest news and updates from us!</h3>
              </div>
              <div class="col-lg-12 d-flex justify-content-center">
                <a href="" class="custom-btn-outline-primary px-5 py-2">Join Us</a>
              </div>
            </div>
          <?php endif ?>


        </div>

      </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="footer-top">
        <div class="container">
          <div class="row gy-4 d-flex justify-content-center">
            <div class="col-lg-5 col-md-12 footer-info d-flex flex-column align-items-center">
              <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span>Atoze Capital</span>
              </a>
              <p class="text-center">Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Atoze Capital</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url() ?>assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

  </body>

  </html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Atoze Capital</title>
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
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/toastr/css/toastr.min.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo base_url() ?>assets/img/logo.png" alt="">
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
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
              <form action="<?php echo base_url('adminsystem/website') ?>" method="POST" enctype="multipart/form-data">
                <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Home</h4>
                    <a type="button" class="close" data-dismiss="modal">&times;</a>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col">
                        <input type="text" name="_bahasa" value="<?php echo $this->uri->segment(2) ?>" hidden>
                        <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="judul" value="<?php echo $value['judul'] ?>">
                        <img src="<?php echo base_url('/assets/img/main/').$value['gambar'] ?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                        <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Gambar" name="gambar">
                      </div>
                      <div class="col">
                        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Masukan Keterangan"><?php echo $value['content'] ?></textarea>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary">Kirim</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </form>
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
            <img src="<?php echo base_url('/assets/img/main/').$value['gambar'] ?>" class="img-fluid" alt="">
          </div>

        </div>
      <?php endforeach ?>
    </div>
  </section><!-- End Hero -->
  <svg class="svg-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#242424" fill-opacity="1" d="M0,96L48,117.3C96,139,192,181,288,202.7C384,224,480,224,576,208C672,192,768,160,864,165.3C960,171,1056,213,1152,218.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <?php foreach ($about as $row => $value): ?>
        <div class="container">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAbout">
            <i class="fas fa-edit"></i>
          </button>
          <div class="modal fade" id="modalAbout">
            <div class="modal-dialog modal-dialog-centered">
             <form action="<?php echo admin_url('website/about') ?>" method="POST" enctype="multipart/form-data">
              <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">About</h4>
                  <a type="button" class="close" data-dismiss="modal">&times;</a>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col">
                      <div class="form-group text-center">
                        <label for="" class="text-center p-2">Judul</label>
                        <input type="text" name="_bahasa" value="<?php echo $this->uri->segment(2) ?>" hidden>
                        <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="judul" value="<?php echo $value['judul'] ?>">
                      </div>
                      <div class="form-group text-center">
                        <label for="" class="text-center p-2">Tagline</label>
                        <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="tagline" value="<?php echo $value['tagline'] ?>">
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group text-center">
                        <label for="" class="p-2">Konten</label>
                        <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Tagline"><?php echo $value['content'] ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-center">
                    <div class="col-6">
                     <div class="form-grop text-center">
                      <img src="<?php echo base_url('/assets/img/about/').$value['gambar'] ?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                      <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Gambar" name="gambar">
                    </div>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">Kirim</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container" data-aos="fade-up">
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
            <img src="<?php echo base_url('/assets/img/about/').$value['gambar'] ?>" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    <?php endforeach ?>
  </section><!-- End About Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <?php if ($this->uri->segment(2)=='indonesia'): ?>
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
              <div class="icon">
                <?php echo $value['icon'] ?>
              </div>
              <h3><?php echo $value['judul'] ?></h3>
              <p><?php echo $value['content'] ?></p>
              <!-- <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a> -->
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalLayananEdit<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalLayananHapus<?php echo $value['id'] ?>"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <div class="col-lg-4">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalLayanan"><i class="fas fa-plus"></i></button>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalLayanan">
      <div class="modal-dialog modal-dialog-centered">
       <form action="<?php echo admin_url('website/layanan') ?>" method="POST">
        <?php echo method('_post') ?>
        <?php echo bahasa($this->uri->segment('2')); ?>
        <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Layanan</h4>
            <a type="button" class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body">

            <div class="row">
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Judul</label>
                  <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="judul" value="">
                </div>
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Icon</label>
                  <textarea type="text" class="form-control" id="email" placeholder="Masukan Icon" name="icon"></textarea>
                  <div class="icon-message">
                    <p>* Copy icon dari fontawesome.com</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="p-2">Konten</label>
                  <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Konten"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Kirim</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php foreach ($service as $key => $value): ?>
    <form action="<?php echo admin_url('website/layanan') ?>" method="POST">
      <div class="modal fade" id="modalLayananHapus<?php echo $value['id'] ?>">
        <div class="modal-dialog modal-dialog-centered">
          <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
          <?php echo method('_get') ?>
          <?php echo get_id($value['id']) ?>
          <?php echo bahasa($this->uri->segment(2)) ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Hapus</h4>
              <a type="button" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-primary">Konfirmasi</button>
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <div class="modal fade" id="modalLayananEdit<?php echo $value['id'] ?>">
      <div class="modal-dialog modal-dialog-centered">
       <form action="<?php echo admin_url('website/layanan') ?>" method="POST">
        <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
        <?php echo method('_patch') ?>
        <?php echo get_id($value['id']) ?>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Layanan</h4>
            <a type="button" class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Judul</label>
                  <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="judul" value="<?php echo $value['judul'] ?>">
                  <input type="text" name="_bahasa" value="<?php echo $this->uri->segment(2) ?>" hidden>
                </div>
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Icon</label>
                  <textarea type="text" class="form-control" id="email" placeholder="Masukan Icon" name="icon"><?php echo $value['icon'] ?></textarea>
                  <div class="icon-message">
                    <p>* Copy icon dari fontawesome.com</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="p-2">Konten</label>
                  <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Tagline"><?php echo $value['content'] ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Kirim</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php endforeach ?>
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
            <img src="<?php echo base_url('assets/img/portfolio/').$value['gambar'] ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo $value['judul'] ?></h4>
              <p><?php echo $value['content'] ?></p>
              <div class="portfolio-links">
                <a href="<?php echo base_url('assets/img/portfolio/').$value['gambar'] ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?php echo $value['judul'] ?>"><i class="bi bi-plus"></i></a>
                <!-- <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a> -->
              </div>
            </div>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalPortofolioEdit<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalPortofolioHapus<?php echo $value['id'] ?>"><i class="fas fa-trash"></i></button>
          </div>
        </div>
      <?php endforeach ?>
      <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="btn-group">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalPortofolio"><i class="fas fa-plus"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalPortofolio">
    <div class="modal-dialog modal-dialog-centered">
     <form action="<?php echo admin_url('website/portofolio') ?>" method="POST" enctype="multipart/form-data">
      <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
      <?php echo method('_post') ?>
      <?php echo bahasa($this->uri->segment(2)) ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Portofolio</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="text-center p-2">Judul</label>
                <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="judul" value="">
              </div>
              <div class="form-grop text-center">
                <img src="<?php echo base_url('assets/img/portfolio/default.png')?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Judul" name="gambar">
              </div>
            </div>
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="p-2">Konten</label>
                <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Tagline"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary">Kirim</button>
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php foreach ($portofolio as $key => $value): ?>
  <form action="<?php echo admin_url('website/portofolio') ?>" method="POST">
    <div class="modal fade" id="modalPortofolioHapus<?php echo $value['id'] ?>">
      <div class="modal-dialog modal-dialog-centered">
        <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
        <?php echo method('_get') ?>
        <?php echo get_id($value['id']) ?>
        <?php echo bahasa($this->uri->segment(2)) ?>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus</h4>
            <a type="button" class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Konfirmasi</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <div class="modal fade" id="modalPortofolioEdit<?php echo $value['id'] ?>">
    <div class="modal-dialog modal-dialog-centered">
     <form action="<?php echo admin_url('website/portofolio') ?>" method="POST" enctype="multipart/form-data">
      <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
      <?php echo method('_patch') ?>
      <?php echo get_id($value['id']) ?>
      <?php echo bahasa($this->uri->segment(2)) ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Portofolio</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="text-center p-2">Judul</label>
                <input type="text" class="form-control" id="email" placeholder="Masukan Judul" name="judul" value="<?php echo $value['judul'] ?>">
              </div>
              <div class="form-grop text-center">
                <img src="<?php echo base_url('assets/img/portfolio/').$value['gambar'] ?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Judul" name="gambar">
              </div>
            </div>
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="p-2">Konten</label>
                <textarea name="content" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Tagline"><?php echo $value['content'] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary">Kirim</button>
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php endforeach ?>
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
              <img src="<?php echo base_url('assets/img/team/').$value['gambar'] ?>" class="img-fluid" alt="">
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
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTeamEdit<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalTeamHapus<?php echo $value['id'] ?>"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
        <?php endforeach ?>
        <div class="col-lg-3 col-md-6">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTeam"><i class="fas fa-plus"></i></button>
          </div>
        </div>
      </div>

    </div>
    <div class="modal fade" id="modalTeam">
      <div class="modal-dialog modal-dialog-centered">
        <form action="<?php echo admin_url('website/team') ?>" method="POST" enctype="multipart/form-data">
          <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
          <?php echo method('_post') ?>
          <?php echo bahasa($this->uri->segment(2)) ?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Tim</h4>
              <a type="button" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <div class="form-group text-center">
                    <label for="" class="text-center p-2">Nama</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukan Nama" name="nama" value="">
                  </div>
                  <div class="form-group text-center">
                    <label for="" class="text-center p-2">Jabatan</label>
                    <input type="text" class="form-control" id="email" placeholder="Masukan Jabatan" name="jabatan" value="">
                  </div>
                </div>
                <div class="col">
                  <div class="form-group text-center">
                    <label for="" class="p-2">Keterangan</label>
                    <textarea name="tagline" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Keterangan"></textarea>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="col-6">
                 <div class="form-grop text-center">
                  <img src="<?php echo base_url('assets/img/team/default.png') ?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                  <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Judul" name="gambar">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-outline-primary">Kirim</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php foreach ($team as $key => $value): ?>
    <form action="<?php echo admin_url('website/team') ?>" method="POST">

      <div class="modal fade" id="modalTeamHapus<?php echo $value['id'] ?>">
        <div class="modal-dialog modal-dialog-centered">
          <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
          <?php echo method('_get')?>
          <?php echo get_id($value['id'])?>
          <?php echo bahasa($this->uri->segment(2))?>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Hapus</h4>
              <a type="button" class="close" data-dismiss="modal">&times;</a>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-outline-primary">Konfirmasi</button>
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </form>
    <div class="modal fade" id="modalTeamEdit<?php echo $value['id'] ?>">
      <div class="modal-dialog modal-dialog-centered">
       <form action="<?php echo admin_url('website/team') ?>" method="POST" enctype="multipart/form-data">
        <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
        <?php echo method('_patch') ?>
        <?php echo bahasa($this->uri->segment(2)) ?>
        <?php echo get_id($value['id']) ?>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit <?php echo $value['nama'] ?></h4>
            <a type="button" class="close" data-dismiss="modal">&times;</a>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Nama</label>
                  <input type="text" class="form-control" id="email" placeholder="Masukan Nama" name="nama" value="<?php echo $value['nama'] ?>">
                </div>
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Jabatan</label>
                  <input type="text" class="form-control" id="email" placeholder="Masukan Jabatan" name="jabatan" value="<?php echo $value['jabatan'] ?>">
                </div>
              </div>
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="p-2">Keterangan</label>
                  <textarea name="tagline" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Keterangan"><?php echo $value['tagline'] ?></textarea>
                </div>
              </div>
            </div>
            <div class="row d-flex justify-content-center">
              <div class="col-6">
               <div class="form-grop text-center">
                <img src="<?php echo base_url('assets/img/team/').$value['gambar'] ?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Judul" name="gambar">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary">Kirim</button>
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php endforeach ?>

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
          <div class="swiper-slide">
            <img src="<?php echo base_url() ?>assets/img/clients/<?php echo $value['gambar'] ?>" class="img-fluid" alt="">
            <div class="btn-group">
              <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalPartnerEdit<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
              <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalPartnerHapus<?php echo $value['id'] ?>"><i class="fas fa-trash"></i></button>
            </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="swiper-pagination"></div>
      <div class="row mt-2">
        <div class="col-lg-12">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalPartner"><i class="fas fa-plus"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalPartner">
    <div class="modal-dialog modal-dialog-centered">
     <form action="<?php echo admin_url('website/partner') ?>" method="POST" enctype="multipart/form-data">
      <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
      <?php echo method('_post') ?>
      <?php echo bahasa($this->uri->segment(2)) ?>
      <?php echo get_id($value['id']) ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Partner</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-6">
             <div class="form-grop text-center">
              <img src="<?php echo base_url() ?>assets/img/clients/default.png" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
              <input type="file" class="form-control mt-2" id="email" placeholder="" name="gambar">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary">Kirim</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>
</div>
<?php foreach ($partner as $key => $value): ?>
  <div class="modal fade" id="modalPartnerEdit<?php echo $value['id'] ?>">
    <div class="modal-dialog modal-dialog-centered">
     <form action="<?php echo admin_url('website/partner') ?>" method="POST" enctype="multipart/form-data">
      <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
      <?php echo method('_patch') ?>
      <?php echo bahasa($this->uri->segment(2)) ?>
      <?php echo get_id($value['id']) ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Partner</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-6">
             <div class="form-grop text-center">
              <img src="<?php echo base_url() ?>assets/img/clients/<?php echo $value['gambar'] ?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
              <input type="file" class="form-control mt-2" id="email" placeholder="" name="gambar">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary">Kirim</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>
</div>
<form action="<?php echo admin_url('website/partner') ?>" method="POST">
  <div class="modal fade" id="modalPartnerHapus<?php echo $value['id'] ?>">
    <div class="modal-dialog modal-dialog-centered">
      <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
      <?php echo method('_get') ?>
      <?php echo get_id($value['id']) ?>
      <?php echo bahasa($this->uri->segment(2)) ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Hapus</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary">Konfirmasi</button>
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</form>
<?php endforeach ?>
</section><!-- End Clients Section -->
<!-- End Recent Blog Posts Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">

  <div class="container" data-aos="fade-up">
    <div class="col-lg-12">
      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalKontak"><i class="fas fa-edit"></i></button>
    </div>
    <header class="section-header">
      <img src="<?php echo base_url('assets/img/').$contact['gambar'] ?>" alt="">
    </header>
    <div class="row gy-4">
      <div class="col-lg-12">
        <h2 class="text-center"><?php echo $contact['tagline'] ?></h2>
        <h3 class="text-center"><?php echo $contact['keterangan'] ?></h3>
      </div>
      <div class="col-lg-12 d-flex justify-content-center">
        <a href="" target="_blank" class="custom-btn-outline-primary px-5 py-2">Bergabung</a>
      </div>
    </div>
  </div>

</section><!-- End Contact Section -->
<div class="modal fade" id="modalKontak">
  <div class="modal-dialog modal-dialog-centered">
   <form action="<?php echo admin_url('website/kontak') ?>" method="POST">
    <?php echo method('_patch') ?>
    <?php echo bahasa($this->uri->segment('2')); ?>
    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Kontak</h4>
        <a type="button" class="close" data-dismiss="modal">&times;</a>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col">
            <div class="form-group text-center">
              <label for="" class="text-center p-2">Tagline</label>
              <input type="text" class="form-control" id="email" placeholder="Masukan Tagline" name="tagline" value="<?php echo $contact['tagline'] ?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group text-center">
              <label for="" class="p-2">Keterangan</label>
              <textarea name="keterangan" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Konten"><?php echo $contact['keterangan'] ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-primary">Kirim</button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>
</div>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="footer-top">
    <div class="container">
      <div class="col-lg-12">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalFooter"><i class="fas fa-edit"></i></button>
      </div>
      <div class="row gy-4 d-flex justify-content-center">
        <div class="col-lg-5 col-md-12 footer-info d-flex flex-column align-items-center">
          <a class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span><?php echo $footer['nama_perusahaan'] ?></span>
          </a>
          <p class="text-center"><?php echo $footer['keterangan'] ?></p>
          <div class="social-links mt-3">
            <a href="<?php echo $footer['twiter'] ?>" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="<?php echo $footer['telegram'] ?>" target="_black" class="linkedin"><i class="bi bi-telegram"></i></a>
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
  <div class="modal fade" id="modalFooter">
    <div class="modal-dialog modal-dialog-centered">
     <form action="<?php echo admin_url('website/footer') ?>" method="POST">
      <?php echo method('_patch') ?>
      <?php echo bahasa($this->uri->segment('2')); ?>
      <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Footer</h4>
          <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="text-center p-2">Nama Perusahaan</label>
                <textarea name="nama_perusahaan" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Konten"><?php echo $footer['nama_perusahaan'] ?></textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="p-2">Keterangan</label>
                <textarea name="keterangan" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Konten"><?php echo $footer['keterangan'] ?></textarea>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="p-2">Link Telegram</label>
                <textarea name="telegram" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Konten"><?php echo $footer['telegram'] ?></textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group text-center">
                <label for="" class="p-2">Link Twitter</label>
                <textarea name="twiter" id="" cols="30" rows="4" class="form-control" placeholder="Masukan Isi Konten"><?php echo $footer['twiter'] ?></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary">Kirim</button>
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
  $(document).ready(function(){
    <?php if ($this->session->flashdata('request')): ?>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: '<?php echo $this->session->flashdata('icon') ?>',
        title: '<?php echo $this->session->flashdata('title') ?>',
      })
    <?php endif ?>
  })
</script>
</body>

</html>
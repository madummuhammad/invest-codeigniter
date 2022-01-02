  <?php $this->load->view('website/v_header') ?>
  <?php $this->load->view('website/v_navbar') ?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container">
      <?php foreach ($home as $row => $value): ?>
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up"><?php echo $value['judul'] ?></h1>
            <h2 data-aos="fade-up" data-aos-delay="400"><?php echo $value['content'] ?></h2>
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a <?php if ($this->session->userdata('authentication')=='verifikasi'): ?>
                href="#verifikasi"
              <?php else: ?>
                href="#joinUs"
                <?php endif ?> data-toggle="modal" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <?php if (get_cookie('lang_is')=='in'): ?>
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
<?php if ($this->session->userdata('authentication') !=='member' AND $this->session->userdata('authentication') !== 'verifikasi'): ?>
<div class="modal fade" id="joinUs">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-body">
        <?php if (get_cookie('lang_is')=='in'): ?>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#registrasi">Daftar</a>
            </li>
          </ul>
        <?php else: ?>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#login">Sign in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#registrasi">Register</a>
            </li>
          </ul>
        <?php endif ?>


        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container active" id="login">
            <?php if (get_cookie('lang_is')=='in'): ?>
              <h3 class="text-center">Silakan Login</h3>
            <?php else: ?>
              <h3 class="text-center">Sign in</h3>
            <?php endif ?>
            <form action="<?php echo base_url('login') ?>" method="POST" enctype="multipart/form-data">
              <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
              <?php echo method('_get') ?>
              <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" autocomplete="off" autofocus="on">
              </div>
              <div class="form-group mb-3">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" autocomplete="off">
              </div>
              <div class="form-group mb-3">
                <a class="nav-link" target="_blank" href="<?php echo base_url('forgotpassword') ?>">Forgot password?</a>
              </div>
              <button type="submit" class="btn btn-outline-primary">Sign in</button>
            </form>
          </div>
          <div class="tab-pane container fade" id="registrasi">
            <?php if (get_cookie('lang_is')=='in'): ?>
              <h3 class="text-center">Silakan Daftar</h3>
            <?php else: ?>
              <h3 class="text-center">Register</h3>
            <?php endif ?>
            <form action="<?php echo base_url('login') ?>" method="POST" enctype="multipart/form-data">
              <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
              <?php echo method('_post') ?>
              <div class="row">
                <div class="col">
                  <div class="form-group mb-3">
                    <label for="email">Full Name</label>
                    <input type="text" class="form-control <?php if (form_error('nama')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter full name" name="nama" id="email" autocomplete="off" autofocus="on" value="<?php echo set_value('nama') ?>">
                    <div class="invalid-feedback"><?= form_error('nama') ?></div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="email">Telegram Account</label>
                    <input type="text" class="form-control <?php if (form_error('telegram')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter telegram account" name="telegram" id="email" autocomplete="off" value="<?php echo set_value('telegram') ?>">
                    <div class="invalid-feedback"><?= form_error('telegram') ?></div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="pwd">Phone</label>
                    <input type="number" class="form-control <?php if (form_error('phone')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter number phone" name="phone" id="pwd" autocomplete="off" value="<?php echo set_value('phone') ?>">
                    <div class="invalid-feedback"><?= form_error('phone') ?></div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="pwd">Wallet address</label>
                    <input type="text" class="form-control <?php if (form_error('wallet')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter wallet address" name="wallet" id="pwd" autocomplete="off" value="<?php echo set_value('wallet') ?>">
                    <div class="invalid-feedback"><?= form_error('wallet') ?></div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group mb-3">
                    <label for="pwd">Referral ID</label>
                    <?php if ($referral !== ''): ?>
                      <input type="number" class="form-control" placeholder="Enter referal id" name="referral" id="pwd" autocomplete="off" value="<?php echo $referral?>" readonly>
                    <?php else: ?>
                      <input type="number" class="form-control <?php if (form_error('referral')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter referal id" name="referral" id="pwd" autocomplete="off" value="<?php echo set_value('referral') ?>">
                    <div class="invalid-feedback"><?= form_error('referral') ?></div>
                    <?php endif ?>
                  </div>
                  <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control <?php if (form_error('email')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter email" name="email" id="email" autocomplete="off" value="<?php echo set_value('email') ?>">
                    <div class="invalid-feedback"><?= form_error('email') ?></div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control <?php if (form_error('password')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Enter password" name="password" id="pwd" autocomplete="off" value="<?php echo set_value('password') ?>">
                    <div class="invalid-feedback"><?= form_error('password') ?></div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="pwd">Repeat Password</label>
                    <input type="password" class="form-control <?php if (form_error('repeat_password')): ?>
                      <?php echo 'is-invalid' ?>
                    <?php endif ?>" placeholder="Repeat password" name="repeat_password" id="pwd" autocomplete="off" value="<?php echo set_value('repeat_password') ?>">
                    <div class="invalid-feedback"><?= form_error('repeat_password') ?></div>
                  </div>
                </div>
              </div>
               <!--  <div class="form-group mb-3">
                  <a class="nav-link" data-toggle="tab" href="#login">Already have an account?</a>
                </div> -->
                <button type="submit" class="btn btn-outline-primary">Sign Up</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>
<?php if ($this->session->userdata('authentication') == 'verifikasi'): ?>
  <div class="modal fade" id="verifikasi">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-3">
        <div class="modal-body">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane container active" id="login">
              <?php if (get_cookie('lang_is')=='in'): ?>
                <h3 class="text-center">Verifikasi Email</h3>
                <p class="text-center">Masukan kode yang dikirim ke email anda</p>
              <?php else: ?>
                <h3 class="text-center">Verifikasi Email</h3>
                <p class="text-center">Masukan kode yang dikirim ke email anda</p>
                <form action="<?php echo base_url('login') ?>" method="POST" enctype="multipart/form-data">
                  <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                  <?php echo method('_patch') ?>
                  <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary badge">Ganti Email?</button>
                  </div>
                </form>
              <?php endif ?>
              <form action="<?php echo base_url('login') ?>" method="POST" enctype="multipart/form-data">
                <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                <?php echo method('_verifikasi') ?>
                <div class="form-group mb-3">
                  <label for="email">Kode Verifikasi</label>
                  <input type="number" class="form-control" placeholder="" name="verifikasi" id="" autocomplete="off" autofocus="on">
                </div>
                <!-- div class="form-group mb-3">
                  <a class="nav-link" data-toggle="tab" href="#registrasi">Not a member yet? Get started now!</a>
                </div> -->
                <button type="submit" class="btn btn-outline-primary">Send</button>
              </form>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
<?php endif ?>
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
            <img src="<?php echo base_url('/assets/img/about/').$value['gambar'] ?>" class="img-fluid" alt="">
          </div>

        </div>
      <?php endforeach ?>
    </div>

  </section><!-- End About Section -->

  <!-- ======= Values Section ======= -->
    <!-- <section id="values" class="values">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Our Values</h2>
          <p>Odit est perspiciatis laborum et dicta</p>
        </header>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <img src="assets/img/values-1.png" class="img-fluid" alt="">
              <h3>Ad cupiditate sed est odio</h3>
              <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <img src="assets/img/values-2.png" class="img-fluid" alt="">
              <h3>Voluptatem voluptatum alias</h3>
              <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <img src="assets/img/values-3.png" class="img-fluid" alt="">
              <h3>Fugit cupiditate alias nobis.</h3>
              <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
            </div>
          </div>

        </div>

      </div>

    </section> -->
    <!-- End Values Section -->

    <!-- ======= Counts Section ======= -->
    <!-- <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-headset" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <?php if (get_cookie('lang_is')=='in'): ?>
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
              </div>
            </div>
          <?php endforeach ?>
          

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Eosle Commodi</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Ledo Markt</h3>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-box red">
              <i class="ri-discuss-line icon"></i>
              <h3>Asperiores Commodi</h3>
              <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div> -->

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-box purple">
              <i class="ri-discuss-line icon"></i>
              <h3>Velit Doloremque.</h3>
              <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
            <div class="service-box pink">
              <i class="ri-discuss-line icon"></i>
              <h3>Dolori Architecto</h3>
              <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        -->
      </div>

    </div>

  </section><!-- End Services Section -->

  <!-- ======= Pricing Section ======= -->
    <!-- <section id="pricing" class="pricing">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Pricing</h2>
          <p>Check our Pricing</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3 style="color: #07d5c0;">Free Plan</h3>
              <div class="price"><sup>$</sup>0<span> / mo</span></div>
              <img src="assets/img/pricing-free.png" class="img-fluid" alt="">
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="box">
              <span class="featured">Featured</span>
              <h3 style="color: #65c600;">Starter Plan</h3>
              <div class="price"><sup>$</sup>19<span> / mo</span></div>
              <img src="assets/img/pricing-starter.png" class="img-fluid" alt="">
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="box">
              <h3 style="color: #ff901c;">Business Plan</h3>
              <div class="price"><sup>$</sup>29<span> / mo</span></div>
              <img src="assets/img/pricing-business.png" class="img-fluid" alt="">
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="box">
              <h3 style="color: #ff0071;">Ultimate Plan</h3>
              <div class="price"><sup>$</sup>49<span> / mo</span></div>
              <img src="assets/img/pricing-ultimate.png" class="img-fluid" alt="">
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <a href="#" class="btn-buy">Buy Now</a>
            </div>
          </div>

        </div>

      </div>

    </section> -->
    <!-- End Pricing Section -->

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
            </div>
          <?php endforeach ?>
        </div>

      </div>

    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <?php if (get_cookie('lang_is')=='in'): ?>
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
        <?php if (get_cookie('lang_is')=='in'): ?>
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

  <!-- ======= Recent Blog Posts Section ======= -->
    <!-- <section id="blog" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Blog</h2>
          <p>Recent posts form our Blog</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Tue, September 15</span>
              <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Fri, August 28</span>
              <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Mon, July 11</span>
              <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section> -->
    <!-- End Recent Blog Posts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="">
          <!-- <h2>Contact</h2>
            <p>Contact Us</p> -->
          </header>

          <?php if (get_cookie('lang_is')=='in'): ?>
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
                <a href="#joinUs" data-toggle="modal" class="custom-btn-outline-primary px-5 py-2">Join Us</a>
              </div>
            </div>
          <?php endif ?>


        </div>

      </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

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

  <?php $this->load->view('website/v_footer') ?>
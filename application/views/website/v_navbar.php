  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="<?php echo base_url() ?>assets/img/logo.png" alt="">
        <!-- <span>Atoze Capital</span> -->
      </a>

      <?php if (get_cookie('lang_is')=='in'): ?>
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
            <li class="dropdown"><a href="#"><span>In</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="<?php echo site_url('lang_setter/set_to/english');?>">Eng</a></li>
                <li><a href="<?php echo site_url('lang_setter/set_to/indonesia');?>">Id</a></li>
              </ul>
            </li>
            <?php if ($this->session->userdata('authentication')=='member'): ?>
              <li><a class="getstarted scrollto" href="<?php echo base_url('adminsystem') ?>">Area Member</a></li>
            <?php endif ?>
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
            <li class="dropdown"><a href="#"><span>Eng</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="<?php echo site_url('lang_setter/set_to/english');?>">Eng</a></li>
                <li><a href="<?php echo site_url('lang_setter/set_to/indonesia');?>">Id</a></li>
              </ul>
            </li>
            <?php if ($this->session->userdata('authentication')=='member'): ?>
              <li><a class="getstarted scrollto" href="<?php echo base_url('member') ?>">Member Area</a></li>
            <?php endif ?>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
      <?php endif ?>
      
      <!-- .navbar -->

    </div>
  </header><!-- End Header -->
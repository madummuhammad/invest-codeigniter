    <!--**********************************
        Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

        <!--**********************************
            Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="index.html" class="brand-logo d-flex align-items-center justify-content-center flex-column">
                    <img class="logo-abbr" src="<?php echo base_url() ?>/assets/img/logo.png" alt="">
                    <?php if ($this->session->userdata('role_id')==1): ?>
                     <!-- <h3 class="text-muted">Admin Area</h3> -->
                 <?php else: ?>
                    <!-- <h3 class="text-secondary">Member Area</h3>  -->
                <?php endif ?>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
            ***********************************-->

        <!--**********************************
            Header start
            ***********************************-->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                            </div>
                            <ul class="navbar-nav header-right">
                                <!-- <li class="nav-item dropdown notification_dropdown">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <i class="mdi mdi-bell"></i>
                                        <div class="pulse-css"></div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="list-unstyled">
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="ti-user"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                        </p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="primary"><i class="ti-shopping-cart"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="danger"><i class="ti-bookmark"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                        </p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="primary"><i class="ti-heart"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                            <li class="media dropdown-item">
                                                <span class="success"><i class="ti-image"></i></span>
                                                <div class="media-body">
                                                    <a href="#">
                                                        <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                        </p>
                                                    </a>
                                                </div>
                                                <span class="notify-time">3:20 am</span>
                                            </li>
                                        </ul>
                                        <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                        </div>
                                    </li> -->
                                    <li class="nav-item dropdown header-profile">
                                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                            <i class="mdi mdi-account"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <?php if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3): ?>
                                                <a href="<?php echo admin_url('profile') ?>" class="dropdown-item">
                                                    <i class="icon-user"></i>
                                                    <span class="ml-2">Profile </span>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo member_url('profile') ?>" class="dropdown-item">
                                                    <i class="icon-user"></i>
                                                    <span class="ml-2">Profile </span>
                                                </a>
                                            <?php endif ?>
                                            
                                            <a href="#modalLogout" data-toggle="modal" class="dropdown-item">
                                                <i class="icon-key"></i>
                                                <span class="ml-2">Logout </span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </nav>
                    </div>
                </div>
                <?php if ($this->session->userdata('role_id')==1): ?>
                    <form action="<?php echo admin_url('login') ?>" method="POST">
                      <div class="modal fade" id="modalLogout">
                        <div class="modal-dialog modal-dialog-centered">
                            <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                            <?php echo method('_patch') ?>
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Konfirmasi Logout</h4>
                                  <a type="button" class="close" data-dismiss="modal">&times;</a>
                              </div>
                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-outline-primary">Logout</button>
                                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
          <?php else: ?>
            <form action="<?php echo base_url('login') ?>" method="POST">
              <div class="modal fade" id="modalLogout">
                <div class="modal-dialog modal-dialog-centered">
                    <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                    <?php echo method('_patch') ?>
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi Logout</h4>
                          <a type="button" class="close" data-dismiss="modal">&times;</a>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-outline-primary">Logout</button>
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  <?php endif ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
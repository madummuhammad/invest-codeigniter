 <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo"></div>
                                        <div class="profile-photo">
                                            <img src="<?= base_url('assets/admin/images/profile/').$profile['gambar'] ?>" class="img-fluid rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="profile-info">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="row">
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col ml-2">
                                                        <div class="profile-name">
                                                            <h4 class="text-primary"><?= $profile['name'] ?></h4>
                                                            <p>Nama</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                                        <div class="profile-email">
                                                            <h4 class="text-muted"><?= $profile['email'] ?></h4>
                                                            <p>Email</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-tab">
                                        <div class="custom-tab-1">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active">Tentang Saya</a>
                                                </li>
                                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Pengaturan Sandi</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="about-me" class="tab-pane fade active show">
                                                    <div class="profile-personal-info">
                                                        <h4 class="text-primary mb-4 mt-4 text-center">Informasi Profil</h4>
                                                        <?php if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3): ?>
                                                           <form action="<?php echo admin_url('profile') ?>" method="POST" enctype="multipart/form-data">
                                                           <?php else: ?>
                                                             <form action="<?php echo member_url('profile') ?>" method="POST" enctype="multipart/form-data">
                                                             <?php endif ?>

                                                             <?php echo method('_patch') ?>
                                                             <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                                             <?php if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3): ?>
                                                                <div class="form-group">
                                                                    <img height="300" width="300" src="<?= base_url('assets/admin/images/profile/').$profile['gambar'] ?>" id="preview" class="img-thumbnail" data-toggle="gambar">
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="form-group">
                                                                    <img height="300" width="300" src="<?= base_url('assets/img/member/').$profile['gambar'] ?>" id="preview" class="img-thumbnail" data-toggle="gambar">
                                                                </div>
                                                            <?php endif ?>

                                                            <div class="form-group">
                                                                <label for="gambar">Foto Profile</label>
                                                                <input id="gambar-profile" type="file" name="gambar" class="form-control">
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>Email</label>
                                                                    <input type="text" placeholder="" name="email" class="form-control" value="<?= $profile['email'] ?>"readonly>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text" placeholder="" class="form-control" name="nama" value="<?= $profile['name'] ?>">
                                                            </div>
                                                            <?php if ($this->session->userdata('role_id')==2): ?>
                                                                <div class="form-group">
                                                                    <label>Telegram</label>
                                                                    <input type="text" placeholder="" class="form-control" name="telegram" value="<?= $profile['telegram'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Wallet address (metamask/trustwallet)</label>
                                                                    <input type="text" placeholder="" class="form-control" name="wallet" value="<?= $profile['wallet'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Wallet address (binance/tokocrypto)</label>
                                                                    <input type="text" placeholder="" class="form-control" name="walletdua" value="<?= $profile['walletdua'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input type="text" placeholder="" class="form-control" name="phone" value="<?= $profile['phone'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>My Referral</label>
                                                                    <p class="form-control"><?= $profile['own_referral'] ?></p>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Link Referral</label>
                                                                    <div class="input-group mb-3">
                                                                      <input id="copyText" class="form-control" value="<?php echo base_url('referral/') ?><?= $profile['own_referral'] ?>" readonly>
                                                                      <div class="input-group-append">
                                                                        <button type="button" class="btn-outline-success btn" id="copyBtn">Copy</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif ?>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" id="submit-edit-profile">Kirim Perubahan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div id="profile-settings" class="tab-pane fade">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary text-center">Ubah Kata Sandi</h4>
                                                        <?php if ($this->session->userdata('role_id')==1 OR $this->session->userdata('role_id')== 3): ?>
                                                           <form action="<?php echo admin_url('profile') ?>" method="POST" enctype="multipart/form-data">
                                                           <?php else: ?>
                                                             <form action="<?php echo member_url('profile') ?>" method="POST" enctype="multipart/form-data">
                                                             <?php endif ?>
                                                             <?php echo method('_post') ?>
                                                             <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                                             <div class="form-group">
                                                                <label>Password Lama</label>
                                                                <input type="password" placeholder="Password Lama" name="password_lama" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password Baru</label>
                                                                <input type="password" placeholder="Password Baru" name="password_baru" class="form-control">
                                                            </div>
                                                            <button class="btn btn-primary" type="submit" id="submit-ganti-sandi">Ganti Sandi</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
            ***********************************-->
            <?php $this->load->view('admin/partial/v_footer'); ?>
            <script>
             $(document).ready(function(){
                <?php if ($this->session->flashdata('request')): ?>
                    toastr.<?php echo $this->session->flashdata('icon') ?>('<?php echo $this->session->flashdata('message') ?>', '<?php echo $this->session->flashdata('title') ?>', {
                        timeOut: 2000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-center",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    })   
                <?php endif ?>
            })
        </script>
        <script>
            const copyBtn = document.getElementById('copyBtn')
            const copyText = document.getElementById('copyText')

            copyBtn.onclick = () => {
                copyText.select();    // Selects the text inside the input
                document.execCommand('copy');    // Simply copies the selected text to clipboard 
                 Swal.fire({         //displays a pop up with sweetalert
                    icon: 'success',
                    title: 'Link Berhasil Disalin',
                    showConfirmButton: false,
                    timer: 1000
                });
             }
         </script>
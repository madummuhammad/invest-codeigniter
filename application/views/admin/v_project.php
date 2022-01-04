<!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">
                <!-- row -->
                <div class="container-fluid">
                    <h2 class="text-center">Projek Tersedia</h2>
                    <div class="row">
                        <?php foreach ($project as $key => $value): ?>
                            <?php
                            $jml=$this->M_Project->sum($value['id'])['jml'];
                            $target=$value['target'];
                            if ($jml==0) {
                                $persen=0;
                            } else {
                                $persen=$jml/$target*100;
                            }
                            ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="stat-widget-two card-body">
                                        <div class="stat-content">
                                            <div class="stat-text"><?php echo $value['nama_project'] ?></div>
                                            <div class="stat-digit">$<?php echo $value['target'] ?></div>
                                        </div>
                                        <?php if ($jml>0): ?>
                                            <p><?php echo $jml.'/'.$value['target'] ?></p>
                                        <?php else: ?>
                                            <p><?php echo '0'.'/'.$value['target'] ?></p>
                                        <?php endif ?>
                                        
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" style="width:<?php echo $persen.'%';  ?>" role="progressbar" aria-valuenow="90" aria-valuemin="88" aria-valuemax="100"></div>
                                        </div>
                                        <div class="stat-content mt-2 text-left">
                                            <?php echo $value['keterangan'] ?> 
                                        </div>
                                        <div class="stat-content mt-2">
                                         <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalProjectEdit<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
                                            <div class="modal fade" id="modalProjectEdit<?php echo $value['id'] ?>">
                                              <div class="modal-dialog modal-dialog-centered">
                                                <form action="<?php echo admin_url('project') ?>" method="POST">
                                                    <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                                    <?php echo method('_patch') ?>
                                                    <?php echo bahasa($this->uri->segment('2')); ?>
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h4 class="modal-title">Edit Project</h4>
                                                        <a type="button" class="close" data-dismiss="modal">&times;</a>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="row">
                                                          <div class="col">
                                                            <div class="form-group text-center">
                                                                <?php echo get_id($value['id']) ?>
                                                                <label for="" class="text-center p-2">Nama Project</label>
                                                                <input type="text" class="form-control <?php if (form_error('edit_nama_project')): ?>
                                                                <?php echo 'is-invalid' ?>
                                                                <?php endif ?>" id="email" placeholder="Masukan Nama Project" name="edit_nama_project" value="<?php echo $value['nama_project'] ?>">
                                                                <div class="invalid-feedback">
                                                                    <?= form_error('edit_nama_project') ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group text-center">
                                                                <label for="" class="p-2">Target Alokasi</label>
                                                                <input type="number" class="form-control <?php if (form_error('edit_target')): ?>
                                                                <?php echo 'is-invalid' ?>
                                                            <?php endif ?><?php if ($this->session->flashdata('edit')==true): ?>
                                                            <?php echo 'is-invalid' ?>
                                                            <?php endif ?>" name="edit_target" placeholder="Masukan target alokasi" value="<?php echo $value['target'] ?>">
                                                            <div class="invalid-feedback">
                                                                <?= form_error('edit_target') ?>
                                                                <?php if ($this->session->flashdata('edit')==true): ?>
                                                                    <?php echo $this->session->flashdata('description') ?>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group text-center">
                                                            <label for="" class="p-2">Min Target</label>
                                                            <input type="number" class="form-control <?php if (form_error('edit_min')): ?>
                                                            <?php echo 'is-invalid' ?>
                                                        <?php endif ?><?php if ($this->session->flashdata('edit')==true): ?>
                                                        <?php echo 'is-invalid' ?>
                                                        <?php endif ?>" name="edit_min" placeholder="Masukan min target" value="<?php echo $value['min'] ?>">
                                                        <div class="invalid-feedback">
                                                            <?= form_error('edit_min') ?>
                                                            <?php if ($this->session->flashdata('edit')==true): ?>
                                                                <?php echo $this->session->flashdata('description') ?>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group text-center">
                                                        <label for="" class="p-2">Max Target</label>
                                                        <input type="number" class="form-control <?php if (form_error('edit_max')): ?>
                                                        <?php echo 'is-invalid' ?>
                                                    <?php endif ?><?php if ($this->session->flashdata('edit')==true): ?>
                                                    <?php echo 'is-invalid' ?>
                                                    <?php endif ?>" name="edit_max" placeholder="Masukan Max Target" value="<?php echo $value['max'] ?>">
                                                    <div class="invalid-feedback">
                                                        <?= form_error('edit_max') ?>
                                                        <?php if ($this->session->flashdata('edit')==true): ?>
                                                            <?php echo $this->session->flashdata('description') ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="card-body">
                                                    <p class="text-left">Keterangan</p>
                                                    <textarea class="summernote" name="edit_keterangan"><?php echo set_value('keterangan') ?><?php echo $value['keterangan'] ?> </textarea>
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
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalProjectHapus<?php echo $value['id'] ?>"><i class="fas fa-trash"></i></button>
                    <form action="<?php echo admin_url('project') ?>" method="POST">
                      <div class="modal fade" id="modalProjectHapus<?php echo $value['id'] ?>">
                        <div class="modal-dialog modal-dialog-centered">
                          <?php echo method('_get') ?>
                          <?php echo get_id($value['id']) ?>
                          <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
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
      </div>
  </div>
</div>
</div>
</div>
<?php endforeach ?>
<div class="col-lg-3 col-sm-6">
  <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalProject"><i class="fas fa-plus"></i></button>
</div>
<div class="modal fade" id="modalProject">
  <div class="modal-dialog modal-dialog-centered">
    <form action="<?php echo admin_url('project') ?>" method="POST">
        <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
        <?php echo method('_post') ?>
        <?php echo bahasa($this->uri->segment('2')); ?>
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Project</h4>
            <a type="button" class="close" data-dismiss="modal">&times;</a>
        </div>

        <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group text-center">
                  <label for="" class="text-center p-2">Nama Project</label>
                  <input type="text" class="form-control <?php if (form_error('nama_project')): ?>
                  <?php echo 'is-invalid' ?>
                  <?php endif ?>" id="email" name="nama_project" value="<?php echo set_value('nama_project') ?> <?php echo $this->session->flashdata('nama_project') ?>">
                  <div class="invalid-feedback">
                    <?= form_error('nama_project') ?>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group text-center">
                <label for="" class="p-2">Target Alokasi</label>
                <input type="number" class="form-control <?php if (form_error('target')): ?>
                <?php echo 'is-invalid' ?>
            <?php endif ?><?php if ($this->session->flashdata('request')=='create'): ?>
            <?php echo 'is-invalid' ?>
            <?php endif ?>" name="target" placeholder="" value="<?php echo set_value('target') ?><?php echo $this->session->flashdata('target') ?>">
            <div class="invalid-feedback">
                <?= form_error('target') ?>
                <?php if ($this->session->flashdata('request')=='create'): ?>
                    <?php echo $this->session->flashdata('description') ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="form-group text-center">
            <label for="" class="p-2">Min Target</label>
            <input type="number" class="form-control <?php if (form_error('min')): ?>
            <?php echo 'is-invalid' ?>
        <?php endif ?>
        <?php if ($this->session->flashdata('request')=='create'): ?>
            <?php echo 'is-invalid' ?>
            <?php endif ?>" name="min" placeholder="" value="<?php echo set_value('min') ?><?php echo $this->session->flashdata('min') ?>">
            <div class="invalid-feedback">
                <?= form_error('min') ?>
                <?php if ($this->session->flashdata('request')=='create'): ?>
                    <?php echo $this->session->flashdata('description') ?>
                <?php endif ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="form-group text-center">
            <label for="" class="p-2">Max Target</label>
            <input type="number" class="form-control <?php if (form_error('max')): ?>
            <?php echo 'is-invalid' ?>
        <?php endif ?><?php if ($this->session->flashdata('request')=='create'): ?>
        <?php echo 'is-invalid' ?>
        <?php endif ?>" name="max" placeholder="" value="<?php echo set_value('max') ?><?php echo $this->session->flashdata('max') ?>">
        <div class="invalid-feedback">
            <?= form_error('max') ?>
            <?php if ($this->session->flashdata('request')=='create'): ?>
                <?php echo $this->session->flashdata('description') ?>
            <?php endif ?>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col">
        <div class="card-body">
            <p class="text-center">Keterangan</p>
            <textarea class="summernote" name="keterangan"><?php echo set_value('keterangan') ?></textarea>
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
<!-- /# column -->
</div>
</div>
</div>
        <!--**********************************
            Content body end
            ***********************************-->
            <?php $this->load->view('admin/partial/v_footer'); ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    <?php if ($this->session->flashdata('request')=='create'): ?>
                        <?php if ($this->session->flashdata('message')=='success'): ?>
                            toastr.success("Mohon tunggu sebentar", "Tambah project berhasil", {
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
                        <?php if ($this->session->flashdata('message')=='gagal'): ?>
                            toastr.error("Isi form dengan benar!", "Tambah project gagal", {
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
                    <?php endif ?>
                    
                    <?php if ($this->session->flashdata('request')=='update'): ?>
                        <?php if ($this->session->flashdata('message')=='success'): ?>
                            toastr.success("Edit data berhasil", {
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
                        <?php if ($this->session->flashdata('message')=='gagal'): ?>
                            toastr.error("Isi form dengan benar!", "Edit project gagal", {
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
                    <?php endif ?>

                    <?php if ($this->session->flashdata('request')=='delete'): ?>
                        <?php if ($this->session->flashdata('message')=='success'): ?>
                            toastr.success("Hapus data berhasil", {
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
                    <?php endif ?>
                })
            </script>
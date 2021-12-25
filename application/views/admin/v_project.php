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
                                            <div class="stat-digit">Rp. <?php echo $value['target'] ?></div>
                                        </div>
                                        <?php if ($jml>0): ?>
                                            <p><?php echo $jml.'/'.$value['target'] ?></p>
                                        <?php else: ?>
                                            <p><?php echo '0'.'/'.$value['target'] ?></p>
                                        <?php endif ?>
                                        
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary" style="width:<?php echo $persen.'%';  ?>" role="progressbar" aria-valuenow="90" aria-valuemin="88" aria-valuemax="100"></div>
                                        </div>
                                        <div class="stat-content mt-2">
                                         <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalLayananEdit<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
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
                              <input type="text" class="form-control" id="email" placeholder="Masukan Nama Project" name="nama_project" value="">
                          </div>
                      </div>
                      <div class="col">
                        <div class="form-group text-center">
                            <label for="" class="p-2">Target Alokasi</label>
                            <input type="number" class="form-control" name="target" placeholder="Masukan target alokasi">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="" class="p-2">Min Target</label>
                            <input type="number" class="form-control" name="min" placeholder="Masukan min target">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group text-center">
                            <label for="" class="p-2">Max Target</label>
                            <input type="number" class="form-control" name="max" placeholder="Masukan Max Target">
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
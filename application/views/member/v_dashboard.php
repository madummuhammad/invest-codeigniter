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
                                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalBuy<?php echo $value['id'] ?>">Buy Project</button>
                                            <div class="modal fade" id="modalBuy<?php echo $value['id'] ?>">
                                                <form action="<?php echo admin_url('project') ?>" method="POST">
                                                  <div class="modal-dialog modal-dialog-centered">

                                                    <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                                    <?php echo method('_post') ?>
                                                    <?php echo bahasa($this->uri->segment('2')); ?>
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h4 class="modal-title">Buy Project</h4>
                                                        <a type="button" class="close" data-dismiss="modal">&times;</a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                          <div class="col">
                                                            <div class="form-group text-center">
                                                              <label for="" class="text-center p-2">Jumlah Beli ( Min:Rp.  <?php echo $value['min'] ?>, Max:Rp. <?php echo $value['max'] ?>)</label>
                                                              <input type="number" class="form-control" id="email" placeholder="" name="nama_project" value="" min="<?php echo $value['min'] ?>" max="<?php echo $value['max'] ?>">
                                                          </div>
                                                      </div>
                                                      <div class="col">
                                                          <div class="form-group text-center">
                                                              <div class="form-grop text-center">
                                                                <label for="">Upload Bukti Transfer</label>
                                                                <img src="<?php echo base_url('assets/img/portfolio/default.png')?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                                                                <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Judul" name="gambar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline-primary">Buy</button>
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
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
        <!-- /# column -->
    </div>
</div>
</div>
        <!--**********************************
            Content body end
        ***********************************-->
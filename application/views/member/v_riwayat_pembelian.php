**********************************
Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Pembelian</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama Project</th>
                                        <th>Jumlah</th>
                                        <th>Waktu Pembelian</th>
                                        <th>Bukti Transfer</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($project as $key => $value): ?>
                                        <tr class="text-center">
                                            <td><?php echo $value['id'].'-'.$value['nama_project'] ?></td>
                                            <td><span><?php echo $value['jml'] ?></span></td>
                                            <td><span><?php echo date('Y-m-d, H:i',$value['timestamp']) ?></span></td>
                                            <td>
                                                <button class="btn badge btn-outline-primary" data-toggle="modal" data-target="#buktitf<?php echo $value['id'] ?>">Bukti Transfer <?php if ($value['bukti_tf']!=='default.png'): ?>
                                                <i class="fas fa-check"></i>
                                            <?php else: ?>
                                                <i class="fas fa-times text-danger"></i>
                                                <?php endif ?></button>
                                                <div class="modal fade" id="buktitf<?php echo $value['id'] ?>">
                                                    <form action="<?php echo base_url('member/buy') ?>" method="POST" enctype="multipart/form-data">
                                                      <div class="modal-dialog modal-dialog-centered">
                                                        <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                                        <?php echo method('_patch') ?>
                                                        <input type="text" name="order" value="<?php echo $value['id_order'] ?>" hidden>
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h4 class="modal-title">Upload Bukti Tf</h4>
                                                            <a type="button" class="close" data-dismiss="modal">&times;</a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                              <div class="col">
                                                                <div class="form-group text-center">
                                                                    <label for="" class="text-center p-2">Link</label>
                                                                    <input type="text" class="form-control" id="email" placeholder="" name="link" value="<?php echo $value['link'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                              <div class="form-group text-center">
                                                                  <div class="form-grop text-center">
                                                                    <label for="">Upload Bukti Transfer</label>
                                                                    <img src="<?php echo base_url('assets/admin/images/bukti/').$value['bukti_tf']?>" data-toggle="gambar" class="img-thumbnail mt-2" alt="">
                                                                    <input type="file" class="form-control mt-2" id="email" placeholder="Masukan Judul" name="gambar">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-outline-primary">Upload</button>
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                                            <!-- <div class="img-table d-flex justify-content-center">
                                                               <img class="img-thumbnail w-50" src="<?php echo base_url('assets/admin/images/bukti/').$value['bukti_tf'] ?> " alt="<?php echo $value['bukti_tf'] ?>">
                                                           </div> -->
                                                       </td>
                                                       <td>
                                                        <?php if ($value['applied']==1): ?>
                                                            <span class="badge badge-success">Applied</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-warning">Pending</span>
                                                        <?php endif ?>

                                                    </td>
                                                    <!-- <span class="badge badge-warning">Pending</span> -->
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************
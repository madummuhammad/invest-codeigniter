**********************************
Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div><?php echo $keterangan['isi'] ?> </div>
            </div>
        </div>
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
                                        <th>Bukti Transfer</th>
                                        <th>Waktu Pembelian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($project as $key => $value): ?>
                                        <tr class="">
                                            <td><?php echo $value['id'].'-'.$value['nama_project'] ?></td>
                                            <td><span><?php echo $value['jml'] ?></span></td>
                                            <td>
                                                <button class="btn badge btn-outline-primary" data-toggle="modal" data-target="#buktitf<?php echo $value['id_order'] ?>">Bukti Transfer <?php if ($value['bukti_tf']!=='default.png'): ?>
                                                <i class="fas fa-check"></i>
                                            <?php else: ?>
                                                <i class="fas fa-times text-danger"></i>
                                                <?php endif ?></button>
                                                <div class="modal fade" id="buktitf<?php echo $value['id_order'] ?>">
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
                                                                        <div class="font-weight-bold">
                                                                            <p class="text-center">Jumlah Beli + Fee 10%</p>
                                                                            <p class="text-center">Silakan Transfer Sebesar: $<span style="text-decoration: underline;"><?php echo $value['jml']+(10/100*$value['jml']) ?></span></p></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                      <div class="col">
                                                                        <div class="form-group text-center">
                                                                            <label for="" class="text-center p-2">Link</label>
                                                                            <input type="text" class="form-control <?php if (form_error('link')): ?>
                                                                            <?php echo 'is-invalid' ?>
                                                                            <?php endif ?>" id="email" placeholder="" name="link" value="<?php echo $value['link'] ?>" value="<?php echo set_value('link') ?>">
                                                                            <div class="invalid-feedback">
                                                                                <?= form_error('link') ?>
                                                                            </div>
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
                                    </td>
                                    <td><span><?php echo date('Y-m-d, H:i',$value['timestamp']) ?></span></td>
                                    <td>
                                        <?php if ($value['applied']==1 AND $value['cancelled']==0): ?>
                                            <span class="badge badge-success">Applied</span>
                                        <?php endif ?>           
                                        <?php if ($value['applied']==0 AND $value['cancelled']==0): ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php endif ?>
                                        <?php if ($value['cancelled']==1): ?>
                                            <span class="badge badge-danger">Cancelled</span>
                                        <?php endif ?>
                                    </td>
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
            ***********************************-->
            <?php $this->load->view('admin/partial/v_footer'); ?>
            <script>
                $(document).ready(function(){
                    <?php if (null !== $this->session->flashdata('message')): ?>
                        <?php if ($this->session->flashdata('message')=='success'): ?>
                            toastr.success("Silakan tunggu konfrimasi! Silakan upload bukti transfer", "Upload Bukti Transfer Berhasil", {
                                timeOut: 3000,
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
                            setTimeout(function (){
                                window.location.href="<?php echo member_url('riwayat') ?>";
                            }, 1000);
                        <?php endif ?>
                        <?php if ($this->session->flashdata('message')=='gagal'): ?>
                            toastr.error("Isi form dengan benar!", "Upload Bukti Transfer Gagal", {
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
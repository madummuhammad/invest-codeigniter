**********************************
Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Order</h4>
                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalBuy">Keterangan Untuk Pemesan <i class="fas fa-edit"></i></button>

                        <div class="modal fade" id="modalBuy">
                            <form action="<?php echo base_url('adminsystem/order') ?>" method="POST" enctype="multipart/form-data">
                              <div class="modal-dialog modal-dialog-centered">
                                <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                <?php echo method('_update') ?>
                                <input type="text" name="project" value="" hidden>
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Keterangan Untuk Pemesan</h4>
                                    <a type="button" class="close" data-dismiss="modal">&times;</a>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                      <div class="col">
                                        <div class="form-group text-center">
                                        </div>
                                    </div>
                                </div>
                                <div class="stat-content mt-2">
                                    <textarea name="keterangan" id="" cols="30" rows="10" class="summernote"><?php echo $keterangan['isi'] ?><?php echo set_value('keterangan') ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary">Kirim</button>
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
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
                                <div class="stat-content mt-2">
                                 <div class="btn-group">
                                    <a href="<?php echo admin_url('order/').$value['id'] ?>" class="btn btn-outline-primary">Lihat Pesanan<i class="fas fa-edit"></i></a>
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
</div>
</div>
</div>
</div>
        <!--**********************************
            Content body end
            ***********************************-->
            <?php 
            $this->load->view('admin/partial/v_footer');
            ?>
            <script type="text/javascript">
                var button_modal = $(".konfirmasi");
                for (let i = 0; i < button_modal.length; i++) {
                    button_modal[i].onclick = function () {
                        var id=$(this).data('id');
                        var status = $(this).val();
                        var method = '_post';
                        var csrf=$('input[name=csrf_test_name]').val(); 
                        $.ajax({
                            url: "<?php echo base_url('adminsystem/member') ?>",
                            type:'POST',
                            data:{
                                id:id,
                                applied:status,
                                _post:method,
                                csrf_test_name:csrf
                            },
                            success: function(e){
                            }
                        });
                    }
                }
            </script>
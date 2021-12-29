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
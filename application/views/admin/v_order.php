**********************************
Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4></h4>
                    <p class="mb-0"></p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-primary" href="<?php echo base_url('adminsystem/order') ?>">Kelola Pesanan</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail Pesanan</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detil Pemesan "<?php echo $project['nama_project'] ?>"</h4>
                    </div>
                    <div class="card-body">
                        <a href="<?php echo admin_url('order/export/').$this->uri->segment(3) ?>" class="btn btn-outline-primary mb-4">Export CSV</a>
                        <a href="<?php echo admin_url('order/komisi/').$this->uri->segment(3) ?>" class="btn btn-outline-warning mb-4">Lihat Komisi <i class="fas fa-eye"></i></a>
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Project</th>
                                        <th>Jumlah Transfer</th>
                                        <th>Buy</th>
                                        <th>Fee 10%</th>
                                        <th>Waktu Pembelian</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Batal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['id_member'].'-'.$value['name'] ?> </td>
                                            <td><?php echo $value['id_order'].'-'.$value['nama_project'] ?></td>
                                            <td><span>$<?php echo $value['jml']+(10/100*$value['jml']) ?></span></td>
                                            <td><span>$<?php echo $value['jml']?></span></td>
                                            <td><span>$<?php echo 10/100*$value['jml'] ?></span></td>
                                            <td><span><?php echo date('Y-m-d, H:i',$value['timestamp']) ?></span></td>
                                            <td>
                                                <div class="img-table d-flex justify-content-center">
                                                    <img class="img-thumbnail" data-toggle="modal" data-target="#modalImg<?php echo $value['id'] ?>" src="<?php echo base_url('assets/admin/images/bukti/').$value['bukti_tf'] ?> " alt="<?php echo $value['bukti_tf'] ?>">
                                                </div>
                                                <div class="modal fade" id="modalImg<?php echo $value['id'] ?>">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                    <input type="text" name="project" value="<?php echo $value['id'] ?>" hidden>
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h4 class="modal-title"></h4>
                                                        <a type="button" class="close" data-dismiss="modal">&times;</a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-thumbnail" data-toggle="modal" data-target="#modalImg<?php echo $value['id'] ?>" src="<?php echo base_url('assets/admin/images/bukti/').$value['bukti_tf'] ?> " alt="<?php echo $value['bukti_tf'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $value['link'] ?></td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                         <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                         <input type="checkbox" data-id="<?php echo $value['id_order'] ?>" class="custom-control-input konfirmasi" id="switch<?php echo $value['id_order'] ?>" value="<?php echo $value['applied'] ?>" <?php if ($value['applied']==1): ?>
                                         <?php echo 'checked' ?>
                                         <?php endif ?>>
                                         <label class="custom-control-label" for="switch<?php echo $value['id_order'] ?>">Konfirmasi</label>

                                     </div>
                                 </td>
                                 <td>
                                     <div class="custom-control custom-switch">
                                         <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                         <input type="checkbox" data-id="<?php echo $value['id_order'] ?>" class="custom-control-input batalkan" id="batalkan<?php echo $value['id_order'] ?>" value="<?php echo $value['cancelled'] ?>" <?php if ($value['cancelled']==0): ?>
                                         <?php echo 'checked' ?>
                                         <?php endif ?>>
                                         <?php if ($value['cancelled']==0): ?>
                                             <label class="custom-control-label" for="batalkan<?php echo $value['id_order'] ?>">Batalkan</label>
                                         <?php else: ?>
                                             <label class="custom-control-label" for="batalkan<?php echo $value['id_order'] ?>">Aktifkan</label>
                                         <?php endif ?>


                                     </div>
                                 </td>
                             </tr>
                         <?php endforeach ?>
                     </tbody>
                     <tfoot>
                        <tr>
                            <th>Member</th>
                            <th>Project</th>
                            <th>Jumlah Transfer</th>
                            <th>Buy</th>
                            <th>Fee 10%</th>
                            <th>Waktu Pembelian</th>
                            <th>Bukti Pembayaran</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Batal</th>
                        </tr>
                    </tfoot>
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
                            url: "<?php echo base_url('adminsystem') ?>",
                            type:'POST',
                            data:{
                                id:id,
                                applied:status,
                                _post:method,
                                csrf_test_name:csrf
                            },
                            success: function(e){
                                if (status==1) {
                                    toastr.warning("Mohon tunggu sebentar", "Konfirmasi berhasil dibatalkan", {
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
                                    setTimeout(function (){
                                        window.location.href="<?php echo base_url('adminsystem/order/').$this->uri->segment(3) ?>";
                                    }, 1000);
                                } else{
                                    toastr.success("Mohon tunggu sebentar", "Berhasil dikonfirmasi", {
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
                                    setTimeout(function (){
                                        window.location.href="<?php echo base_url('adminsystem/order/').$this->uri->segment(3) ?>";
                                    }, 1000);
                                }
                                
                            }
                        });
                    }
                }
                var button_batal = $(".batalkan");
                for (let i = 0; i < button_batal.length; i++) {
                    button_batal[i].onclick = function () {
                        var id=$(this).data('id');
                        var cancelled = $(this).val();
                        var method = '_update';
                        var csrf=$('input[name=csrf_test_name]').val();
                        $.ajax({
                            url: "<?php echo base_url('adminsystem') ?>",
                            type:'POST',
                            data:{
                                id:id,
                                cancelled:cancelled,
                                _update:method,
                                csrf_test_name:csrf
                            },
                            success: function(e){
                                if (cancelled==0) {
                                    toastr.warning("Mohon tunggu sebentar", "Order berhasil dibatalkan", {
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
                                    setTimeout(function (){
                                        window.location.href="<?php echo base_url('adminsystem/order/').$this->uri->segment(3) ?>";
                                    }, 1000);
                                } else{
                                    toastr.success("Mohon tunggu sebentar", "Order berhasil diaktifkan", {
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
                                    setTimeout(function (){
                                        window.location.href="<?php echo base_url('adminsystem/order/').$this->uri->segment(3) ?>";
                                    }, 1000);
                                }
                                
                            }
                        });
                    }
                }
            </script>
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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('adminsystem/order') ?>">Kelola Pesanan</a></li>
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
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th>Project</th>
                                        <th>Jumlah</th>
                                        <th>Waktu Pembelian</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['id_member'].'-'.$value['name'] ?> </td>
                                            <td><?php echo $value['id_order'].'-'.$value['nama_project'] ?></td>
                                            <td><span><?php echo $value['jml'] ?></span></td>
                                            <td><span><?php echo date('Y-m-d, H:i',$value['timestamp']) ?></span></td>
                                            <td>
                                                <div class="img-table d-flex justify-content-center">
                                                   <img class="img-thumbnail" src="<?php echo base_url('assets/admin/images/bukti/').$value['bukti_tf'] ?> " alt="<?php echo $value['bukti_tf'] ?>">
                                               </div>
                                           </td>
                                           <td>
                                            <div class="custom-control custom-switch">
                                             <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                             <input type="checkbox" data-id="<?php echo $value['id_order'] ?>" class="custom-control-input konfirmasi" id="switch1" value="<?php echo $value['applied'] ?>" <?php if ($value['applied']==1): ?>
                                             <?php echo 'checked' ?>
                                             <?php endif ?>>
                                             <label class="custom-control-label" for="switch1">Konfirmasi</label>

                                         </div>
                                     </td>
                                 </tr>
                             <?php endforeach ?>
                         </tbody>
                         <tfoot>
                            <tr>
                                <th>Member</th>
                                <th>Project</th>
                                <th>Jumlah</th>
                                <th>Waktu Pembelian</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
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
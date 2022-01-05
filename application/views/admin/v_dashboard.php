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
                        <h4 class="card-title">Order Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Member</th>
                                        <th>Project</th>
                                        <th>Jumlah</th>
                                        <th>Waktu Pembelian</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($project as $key => $value): ?>
                                        <tr>
                                            <td>
                                                <div class="round-img">
                                                    <a href=""><img width="75" src="<?php echo base_url('assets/img/member/').$value['gambar'] ?>" alt="<?php echo $value['gambar'] ?>"></a>
                                                </div>
                                            </td>
                                            <td><?php echo $value['name'] ?> </td>
                                            <td><?php echo $value['id_order'].'-'.$value['nama_project'] ?></td>
                                            <td><span><?php echo $value['jml'] ?></span></td>
                                            <td><span><?php echo date('Y-m-d, H:i',$value['timestamp']) ?></span></td>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                   <?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash()); ?>
                                                   <input type="checkbox" data-project="<?php echo $value['id_project'] ?>" data-id="<?php echo $value['id_order'] ?>" class="custom-control-input konfirmasi" id="switch1" value="<?php echo $value['applied'] ?>" <?php if ($value['applied']==1): ?>
                                                   <?php echo 'checked' ?>
                                                   <?php endif ?>>
                                                   <label class="custom-control-label" for="switch1">Konfirmasi</label>
                                               </div>
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
            <?php 
            $this->load->view('admin/partial/v_footer');
            ?>
            <script type="text/javascript">
                var button_modal = $(".konfirmasi");
                for (let i = 0; i < button_modal.length; i++) {
                    button_modal[i].onclick = function () {
                        var project=$(this).data('project');
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
                                Swal.fire({    
                                    icon: 'success',
                                    title: 'Berhasil Dikonfirmasi',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                setTimeout(function (){
                                    window.location.href="<?php echo base_url('adminsystem/order/') ?>"+project;
                                }, 1000);
                            }
                        });
                    }
                }
            </script>
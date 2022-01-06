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
                        <h4 class="card-title">Data Admin</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="#modalAdmin" data-toggle="modal" class="btn btn-outline-primary mb-4"><i class="fas fa-plus"></i></a>
                            <div class="modal fade" id="modalAdmin">
                                <form action="<?php echo admin_url('admin') ?>" method="POST">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                                    <?php echo method('_post') ?>
                                    <input type="text" name="project" value="" hidden>
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Tambah Admin</h4>
                                        <a type="button" class="close" data-dismiss="modal">&times;</a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group">
                                                <label><strong>Admin Nama</strong></label>
                                                <input type="text" name="nama" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Admin Email</strong></label>
                                                <input type="email" name="email" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <label><strong>Admin Password</strong></label>
                                                <input type="password" name="password" class="form-control" value="">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                   <input type="checkbox" class="custom-control-input" id="superadmin" value="1" name="role">
                                                   <label class="custom-control-label" for="superadmin">Superadmin</label>
                                               </div>
                                           </div>
                                       </div>
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
            <table id="example" class="display" style="min-width: 845px">
                <thead>
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admin as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td>
                                <div class="img-table d-flex justify-content-center">
                                    <img class="img-thumbnail" width="50%" src="<?php echo base_url('assets/admin/images/profile/').$value['gambar'] ?> " alt="<?php echo $value['gambar'] ?>">
                                </div>
                            </td>
                            <td>
                                <?php if ($value['role_id']==1): ?>
                                    Super Admin
                                <?php endif ?>
                                <?php if ($value['role_id']==3): ?>
                                    Admin
                                <?php endif ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAdmin<?php echo $value['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalProjectHapus<?php echo $value['id'] ?>"><i class="fas fa-trash"></i></button>
                                    <form action="<?php echo admin_url('admin') ?>" method="POST">
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
                  </td>
              </tr>
              <div class="modal fade" id="modalAdmin<?php echo $value['id'] ?>">
                <form action="<?php echo admin_url('admin') ?>" method="POST">
                  <div class="modal-dialog modal-dialog-centered">
                    <?php echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
                    <?php echo method('_patch') ?>
                    <?php echo get_id($value['id']); ?>
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit <?php echo $value['name'] ?></h4>
                        <a type="button" class="close" data-dismiss="modal">&times;</a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label><strong>Admin Nama</strong></label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $value['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label><strong>Admin Email</strong></label>
                                <input type="email" name="email" class="form-control" value="<?php echo $value['email'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" name="role" class="custom-control-input" id="superadmin<?php echo $value['id'] ?>" value="<?php echo $value['role_id'] ?>" <?php if ($value['role_id']==1): ?>
                                    <?php echo 'checked' ?>
                                    <?php endif ?>>
                                    <label class="custom-control-label" for="superadmin<?php echo $value['id'] ?>">Superadmin</label>
                                </div>
                            </div>
                        </div>
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
<?php endforeach ?>
</tbody>
<tfoot>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Aksi</th>
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
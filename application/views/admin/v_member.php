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
                        <h4 class="card-title">Data Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <a href="<?php echo admin_url('member/export') ?>" class="btn btn-outline-primary mb-4">Export CSV</a>
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telegram</th>
                                        <th>Phone</th>
                                        <th>Wallet Address<br><span class="text-center">(metamask/trustwallet)</span></th>
                                        <th>Wallet Address<br><span class="text-center">(binance/tokocrypto)</span></th>
                                        <th>Referral Id</th>
                                        <th>My Referral</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($member as $key => $value): ?>
                                        <tr>
                                            <td><?php echo $value['name'] ?></td>
                                            <td><?php echo $value['email'] ?></td>
                                            <td><?php echo $value['telegram'] ?></td>
                                            <td><?php echo $value['phone'] ?></td>
                                            <td><?php echo $value['wallet'] ?></td>
                                            <td><?php echo $value['walletdua'] ?></td>
                                            <td><?php echo $value['referral_id'] ?></td>
                                            <td><?php echo $value['own_referral'] ?> </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telegram</th>
                                        <th>Phone</th>
                                        <th>Wallet Address<br><span class="text-center">(metamask/trustwallet)</span></th>
                                        <th>Wallet Address<br><span class="text-center">(binance/tokocrypto)</span></th>
                                        <th>Referral Id</th>
                                        <th>My Referral</th>
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
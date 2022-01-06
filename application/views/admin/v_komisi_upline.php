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
					<li class="breadcrumb-item active"><a class="text-primary" href="<?php echo base_url('adminsystem/order/').$this->uri->segment(5) ?>">Detail Pesanan</a></li>
					<li class="breadcrumb-item active"><a class="text-primary" href="<?php echo base_url('adminsystem/order/komisi/').$this->uri->segment(5) ?>">Komisi</a></li>
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Komisi Perupline</a></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Komisi Per Upline "<?php echo $project['nama_project'] ?>"</h4>
					</div>
					<div class="card-body">
						<a href="<?php echo admin_url('order/komisi/export_perupline/').$this->uri->segment(5) ?>" class="btn btn-outline-primary mb-4">Export CSV</a>
						<div class="table-responsive">
							<table id="example" class="display" style="min-width: 845px">
								<thead>
									<tr class="text-center">
										<th>User Upline</th>
										<th>Jumlah Komisi</th>
										<th>Wallet Address<br><span class="text-center">(metamask/trustwallet)</span></th>
										<th>Wallet Address<br><span class="text-center">(binance/tokocrypto)</span></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($komisi as $key => $value): ?>
										<tr class="text-center">
											<td>
												<?php echo $value['name'] ?>
											</td>
											<td>$<?php echo $this->M_Komisi->sum($value['id_member'])['komisi'] ?></td>
											<td><?php echo $value['wallet'] ?></td>
											<td><?php echo $value['walletdua'] ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr class="text-center">
										<th>User Upline</th>
										<th>Jumlah Komisi</th>
										<th>Wallet Address<br><span class="text-center">(metamask/trustwallet)</span></th>
										<th>Wallet Address<br><span class="text-center">(binance/tokocrypto)</span></th>
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
            					if (cancelled==1) {
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
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
						<h4 class="card-title">Komisi Referral Anda</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table mb-0">
								<thead>
									<tr class="text-center">
										<th>Nama Project</th>
										<th>Nama Member</th>
										<th>Nilai Komisi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($komisi as $key => $value): ?>
										<tr class="text-center">
											<td><?php echo $value['id'].'-'.$value['nama_project'] ?></td>
											<td><?php echo $value['name'] ?></td>
											<td>$<?php echo $value['komisi'] ?></td>
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
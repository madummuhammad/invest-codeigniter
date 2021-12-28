<?php $this->load->view('website/v_header') ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 d-flex flex-column justify-content-center">
				<?php if (null == $this->uri->segment(2)): ?>
					<div class="modal fade" id="verifikasi">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content p-3">
								<div class="modal-body">
									<?php if (get_cookie('lang_is')=='in'): ?>
										<h3 class="text-center">Masukan Email</h3>
										<p class="text-center">Link akan dikirimkan ke email anda</p>
									<?php else: ?>
										<h3 class="text-center">Masukan Email</h3>
										<p class="text-center">Link akan dikirimkan ke email anda</p>
									<?php endif ?>
									<form action="<?php echo base_url('login') ?>" method="POST" enctype="multipart/form-data">
										<?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
										<?php echo method('_forgot') ?>
										<div class="form-group mb-3">
											<label for="email">Email</label>
											<input type="email" class="form-control" placeholder="" name="email" autocomplete="off">
										</div>
										<button type="submit" class="btn btn-outline-primary">Send</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php else: ?>
					<?php if ($row>0): ?>
						<div class="modal fade" id="verifikasi">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content p-3">
									<div class="modal-body">
										<?php if (get_cookie('lang_is')=='in'): ?>
											<h3 class="text-center">Ganti Password</h3>
											<p class="text-center">Password ini akan digunakan setelah diganti</p>
										<?php else: ?>
											<h3 class="text-center">Ganti Password</h3>
											<p class="text-center">Password ini akan digunakan setelah diganti</p>
										<?php endif ?>
										<form action="<?php echo base_url('forgotpassword') ?>" method="POST" enctype="multipart/form-data">
											<?php echo  form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());  ?>
											<?php echo method('_patch') ?>
											<input type="text" name="token" value="<?php echo $token ?>" hidden>
											<div class="form-group mb-3">
												<label for="email">Password</label>
												<input type="password" class="form-control" placeholder="" name="password" autocomplete="off">
											</div>
											<div class="form-group mb-3">
												<label for="email">Repeat Password</label>
												<input type="password" class="form-control" placeholder="" name="repeat_password" autocomplete="off">
											</div>
											<button type="submit" class="btn btn-outline-primary">Send</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>

				<?php endif ?>
			</div>
		</div>
	</div>
</section><!-- End Hero -->
<?php $this->load->view('website/v_footer') ?>
<script>
	<?php if ($this->session->flashdata('request')=='gantiPassword'): ?>
		<?php if ($this->session->flashdata('message')=='gagal'): ?>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'error',
				title: 'Password gagal diganti! Isi form dengan benar'
			})
		<?php endif ?>
		<?php if ($this->session->flashdata('message')=='success'): ?>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: 'Ganti password berhasil! Tunggu sebentar...'
			})
			setTimeout(function (){
				window.location.href="<?php echo base_url('') ?>";
			}, 1000);
		<?php endif ?>
	<?php endif ?>
</script>
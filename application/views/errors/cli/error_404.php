<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo "\nERROR: ",
// 	$heading,
// 	"\n\n",
// 	$message,
// 	"\n\n";
?>

<?php $this->load->view('website/v_header') ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 d-flex flex-column justify-content-center">
				<h2 class="text-center">404</h2>
				<p class="text-center">Halaman tidak ditemukan</p>
				<a class="text-center" href="<?php echo base_url() ?>">Kembali</a>
			</div>
		</div>
	</div>
</section><!-- End Hero -->
<?php $this->load->view('website/v_footer') ?>
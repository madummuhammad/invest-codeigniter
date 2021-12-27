$(document).ready(function(){
	var button_modal = $("[data-toggle=modal]");
	var target = $("[data-toggle=modal").data('target');
	for (let i = 0; i < button_modal.length; i++) {
		button_modal[i].onclick = function () {
			var id_target = $(this).data('target');
			$(id_target).addClass('active');
		}
	}

	$('input[type="file"]').change(function(e) {
		var reader = new FileReader();
		reader.onload = function(e) {
			var gambar = $("[data-toggle=gambar]");
			for (let i = 0; i < gambar.length; i++) {
				gambar[i].src = e.target.result;
			}
		};
		reader.readAsDataURL(this.files[0]);
	});
	// $('.toast').toast('hide');

	// $('button[type="submit"]').on('click',function(){
	// 	$('button span').addClass('spinner-border');
	// 	$('.toast').toast('show');
	// });
	// $("#btn-forgot").on('click',function(){
	// 	$(".modal").modal('hide');
	// })
	
	$("#joinUs").modal('show');
	$('#joinUs [data-dismiss="modal"]').on('click',function(){
		$("#joinUs").modal('hide');
	});

	$("#verifikasi").modal('show');
	$('#verifikasi [data-dismiss="modal"]').on('click',function(){
		$("#verifikasi").modal('hide');
	});

	


});
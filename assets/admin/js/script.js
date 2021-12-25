$(document).ready(function(){
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
})
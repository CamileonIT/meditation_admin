$(document).ready(function () {
	$('#not_type').change(function () {
		if ($(this).val() == 2) {
			$(".mLink").fadeIn();
		} else {
			$(".mLink").fadeOut();
		}
		if ($(this).val() == 1) {
			$(".imgupload").fadeOut();
			$(".dialoge_mokup").fadeOut();
			$(".simple_mokup").fadeIn();
		} else if ($(this).val() == 2) {
			$(".imgupload").fadeIn();
			$(".simple_mokup").fadeOut();
			$(".dialoge_mokup").fadeIn();
		}

	});
	function imageIsLoaded(e) {
    $('#myImg').show();
            $('#myImg').attr('src', e.target.result);
    }

	$("#uploadBtn").change(function () {
      // $("#add-file").val($("#uploadBtn").val());
      if (this.files && this.files[0]) {     var reader = new FileReader();
      reader.onload = imageIsLoaded;
      reader.readAsDataURL(this.files[0]);
      }
    });
});
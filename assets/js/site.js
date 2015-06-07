$(document).ready(function(){

	// Käynnistää Owl-Carouselin
	$(".owl-carousel").owlCarousel({
	    margin:10,
	    loop:true,
	    autoWidth:true
	});

	// Lisää tapahtumakuuntelijat
	$("#increase-home-score").on("click" , function() {
		var score = parseInt($("#home-score").val());
		if (score < 99) {
			score++;
			$("#home-score").val(score);
		}
	});

	$("#decrease-home-score").on("click" , function() {
		var score = parseInt($("#home-score").val());
		if (score > 0) {
			score--;
			$("#home-score").val(score);
		}
	});

	$("#increase-away-score").on("click" , function() {
		var score = parseInt($("#away-score").val());
		if (score < 99) {
			score++;
			$("#away-score").val(score);
		}
	});

	$("#decrease-away-score").on("click" , function() {
		var score = parseInt($("#away-score").val());
		if (score > 0) {
			score--;
			$("#away-score").val(score);
		}
	});

	jQuery.each(jQuery('textarea[data-autoresize]'), function() {
		var offset = this.offsetHeight - this.clientHeight;
 
	   var resizeTextarea = function(el) {
	        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
	    };
	    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
	});

});




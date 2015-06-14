$(document).ready(function(){

	// Käynnistää Owl-Carouselin
	$(".match-carousel").owlCarousel({
	    margin:10,
	    loop:true,
	    autoplay: true,
	    autoWidth:true
	});

	$(".group-standings-carousel").owlCarousel({
	    margin:0,
	    loop:true,
	    autoWidth:true
	});

	// Drop-down valikko
	$( function() {
				
		$( '#cd-dropdown' ).dropdown( {
			gutter : 6,
			stack: false
		} );

	});

	$( function() {	
		$("#away-team-players").dropdown( {
			gutter : 6,
			stack: false
		} );
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

	/*** MATERIAL ***/
	$(".textbox-material").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-material-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-material-on-focus");
	});

	$(".textbox-material--light").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-material--light-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-material--light-on-focus");
	});

	$(".textbox-material--dark").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-material--dark-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-material--dark-on-focus");
	});

	$(".textarea-material").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-material-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-material-on-focus");
	});

	$(".textarea-material--light").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-material--light-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-material--light-on-focus");
	});

	$(".textarea-material--dark").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-material--dark-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-material--dark-on-focus");
	});

	/*** FLAT ***/
	$(".textbox-flat").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-flat-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-flat-on-focus");
	});

	$(".textbox-flat--light").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-flat--light-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-flat--light-on-focus");
	});

	$(".textbox-flat--dark").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-flat--dark-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-flat--dark-on-focus");
	});
	
	$(".textarea-flat").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-flat-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-flat-on-focus");
	});

	$(".textarea-flat--light").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-flat--light-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-flat--light-on-focus");
	});

	$(".textarea-flat--dark").on("focus", function() {
  		$("label[for='" + this.id + "']").addClass("label-flat--dark-on-focus");
	}).blur(function() {
  		$("label").removeClass("label-flat--dark-on-focus");
	});



	jQuery.each(jQuery('textarea[data-autoresize]'), function() {
		var offset = this.offsetHeight - this.clientHeight;
 
	   var resizeTextarea = function(el) {
	        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
	    };
	    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
	});

});




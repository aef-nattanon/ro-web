$(function () {

	$.fn.checkemail = function (checkmail) {
		var emailRegEx = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailRegEx.test(checkmail);
	}

	$.fn.checkphonenumber = function (checkphonenumber) {
		var phone_pattern = /^\(?(\d{2,3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/;
		return phone_pattern.test(checkphonenumber);
	}

	$('[data-toggle="tooltip"]').tooltip()

	$(".toggle-password").click(function () {

		$(".toggle-password").toggleClass("fa-eye fa-eye-slash");

		var input = $(".password");
		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	$(window).keydown(function (event) {
		if (event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});

	// ------ Total-summary Sticky

	if ($(".total-summary").length > 0) {
		let cart_summary = $(".cart-summary").offset().top + 342;
		let scroll = $(window).scrollTop() + $(window).height();

		if (scroll < cart_summary) {
			$(".total-summary").addClass("sticky");
		} else {
			$(".total-summary").removeClass("sticky");
		}

		// console.log(cart_summary)
		$(window).scroll(function () {
			let cart_summary = $(".cart-summary").offset().top + 342;
			let scroll = $(window).scrollTop() + $(window).height();

			if (scroll < cart_summary) {
				$(".total-summary").addClass("sticky");
			} else {
				$(".total-summary").removeClass("sticky");
			}
		});
	}

	// ------ End Total-summary Sticky

	// ------ Menu

	var header_height = $(".header").height();
	var header_search = $(".header-search");
	var header_search_height = $(".header-search").height();
	// var header_menu = $(".header-menu");
	$(window).scroll(function () {
		let scroll = $(window).scrollTop();

		if (scroll > header_height) {
			header_search.addClass("header-sticky");
			// header_menu.css('margin-top', header_search_height);
		} else {
			header_search.removeClass("header-sticky");
			// header_menu.css('margin-top', '');
		}
	});

	$(".header").css('min-height', header_height);

	$(document).on('click', '.btn-filter, .product-filter .btn-closs-side-menu', function () {
		if ($('body').hasClass('side-menu-filter')) {
			$('body').removeClass('side-menu-filter');
		} else {
			$('body').addClass('side-menu-filter');
		}
	});

	$(document).on('click', '.btn-menu-member, .account-menu-list .btn-closs-side-menu', function () {
		if ($('body').hasClass('side-menu-account')) {
			$('body').removeClass('side-menu-account');
		} else {
			$('body').addClass('side-menu-account');
		}
	});

	// click outisde offcanvas
	$(document).mouseup(function (e) {

		let product_filter = $(".product-filter");
		if (!product_filter.is(e.target) && product_filter.has(e.target).length === 0) {

			if ($('body').hasClass('side-menu-filter')) {
				$('body').removeClass('side-menu-filter');
			}

		}

		let account_menu = $(".account-menu-list");
		if (!account_menu.is(e.target) && account_menu.has(e.target).length === 0) {

			if ($('body').hasClass('side-menu-account')) {
				$('body').removeClass('side-menu-account');
			}
		}
	});

	// End Menu

	// DataTables

	if($('#default').length > 0){
		$('#default').DataTable({
			"pageLength": 20,
			"search": {
				"smart": false
			},
			"aaSorting": [],
			"scrollX": true,
			"lengthMenu": [[5, 10, 20, 50, -1], [5, 10, 20, 50, "All"]]
		});
	}
	
	// End DataTables

});

$(window).on('load', function () {

	/* ---- particles.js config ---- */

	if ($('#particles-js').length > 0) {
		particlesJS("particles-js", { "particles": { "number": { "value": 150, "density": { "enable": true, "value_area": 5000 } }, "color": { "value": "#fff" }, "shape": { "type": "circle", "stroke": { "width": 0, "color": "#000000" }, "polygon": { "nb_sides": 3 }, "image": { "src": "img/github.svg", "width": 100, "height": 100 } }, "opacity": { "value": 0.9, "random": true, "anim": { "enable": false, "speed": 1, "opacity_min": 0.1, "sync": false } }, "size": { "value": 1.5, "random": true, "anim": { "enable": true, "speed": 5, "size_min": 0, "sync": false } }, "line_linked": { "enable": false, "distance": 500, "color": "#f00", "opacity": 0.4, "width": 2 }, "move": { "enable": true, "speed": 1, "direction": "top-right", "random": true, "straight": false, "out_mode": "out", "bounce": false, "attract": { "enable": false, "rotateX": 600, "rotateY": 1200 } } }, "interactivity": { "detect_on": "canvas", "events": { "onhover": { "enable": false, "mode": "bubble" }, "onclick": { "enable": false, "mode": "repulse" }, "resize": true }, "modes": { "grab": { "distance": 400, "line_linked": { "opacity": 0.5 } }, "bubble": { "distance": 400, "size": 4, "duration": 0.3, "opacity": 1, "speed": 3 }, "repulse": { "distance": 200, "duration": 0.4 }, "push": { "particles_nb": 4 }, "remove": { "particles_nb": 2 } } }, "retina_detect": true });
	}


});

function azandnumber(e) {
	if (isNaN(e.value)) {
		e.value = e.value.replace(/[^a-zA-Z\d_.@]/g, '');
	}
}

function azandnumber2(e) {
	if (isNaN(e.value)) {
		e.value = e.value.replace(/[^a-zA-Z\d()-]/g, '');
	}
}

function number(e) {
	e.value = e.value.replace(/[^0-9\d]/g, '');
}

var expiration_date_length_old = 0;
function expiration_date(el, event) {

	// console.log(event)
	let value = el.value;
	let month = value.substring(0, 2);
	let year = value.substring(3, 5);
	// console.log(month)
	// console.log(year)

	let first_text_month = value.substring(0, 1);

	if (month > 12) {
		month = '12';
	} else if (first_text_month > 1) {
		// console.log('0' + first_text_month)
		month = '0' + first_text_month;
	}

	// console.log(el.value.length)
	// console.log(expiration_date_length_old)

	if (el.value.length == 2 && expiration_date_length_old == 3) {
		month = el.value.substring(0, 1);
		// console.log(el.value.length)
	}

	if (el.value.length <= 2 || el.value.length >= 4) {

		// console.log(el.value.length)
		// console.log(month)

		value = month.replace(/[^0-9\d]/g, '');
		if (el.value.length >= 3) {
			value = value + '/' + year.replace(/[^0-9\d]/g, '');
		}
		el.value = value;

		if (el.value.length == 2) {
			el.value = el.value + '/';
		}
	}

	expiration_date_length_old = el.value.length;

}

function credit_card_number(el, event) {

	// console.log(el.value.length)
	el.value = el.value.replace(/[^0-9\d]/g, '');
	let value = el.value;
	let add_space = [5, 9, 13];
	// console.log(value);

	let value_new = "";

	for (var i = 0; i < value.length; i++) {
		// console.log(el.value[i]);
		if (add_space.includes(i + 1)) {
			// console.log('OK');
			value_new = value_new + ' ' + el.value[i];
		} else {
			value_new = value_new + el.value[i];
		}
	}

	// console.log(value_new);
	el.value = value_new;
}

function number_phon(e) {
	e.value = e.value.replace(/[^0-9\d ( ) -]/g, '');
}

function addCommas(nStr) {
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

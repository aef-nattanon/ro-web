$(document).ready(function () {

	var base_url = $("#base_url").val();
	var lang = $("#lang").val();

	// ---------- Search Product ----------//

	// ---- PC

	$(document).on('click', '#btn_search', function () {

		let key_search = $('#key_search').val();
		let cat_search = $('#cat_search').val();

		let add_cat_search = '';
		if (cat_search) {
			add_cat_search = '-c.' + cat_search
		}

		// console.log(key_search)

		window.location.href = base_url + 'product/search/' + key_search + add_cat_search;

	});

	$(document).on("keydown", "#key_search", function (event) {
		if (event.keyCode == 13) {

			let key_search = $('#key_search').val();
			let cat_search = $('#cat_search').val();

			let add_cat_search = '';
			if (cat_search) {
				add_cat_search = '-c.' + cat_search
			}

			window.location.href = base_url + 'product/search/' + key_search + add_cat_search;

		}
	});


	// ---- M

	$(document).on('click', '#btn_search_m', function () {

		let key_search = $('#key_search_m').val();
		let cat_search = $('#cat_search_m').val();

		let add_cat_search = '';
		if (cat_search) {
			add_cat_search = '-c.' + cat_search
		}

		// console.log(key_search)

		window.location.href = base_url + 'product/search/' + key_search + add_cat_search;

	});

	$(document).on("keydown", "#key_search_m", function (event) {
		if (event.keyCode == 13) {

			let key_search = $('#key_search_m').val();
			let cat_search = $('#cat_search_m').val();

			let add_cat_search = '';
			if (cat_search) {
				add_cat_search = '-c.' + cat_search
			}

			window.location.href = base_url + 'product/search/' + key_search + add_cat_search;

		}
	});

	// ---------- End Search Product ----------//


});
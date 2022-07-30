$(function () {

	var base_url = $("#base_url").val();

	let sceen_width = $(window).width();
	if (sceen_width < 767.5) {
		$('#slide_carousel .desktop').remove();
	} else {
		$('#slide_carousel .mobile').remove();
	}

	$('#slide_carousel').owlCarousel({
		// loop: true,
		rewind: true,
		lazyLoad: true,
		// margin: 10,
		responsiveClass: true,
		nav: false,
		dots: true,
		autoHeight: false,
		items: 1,
		autoplay: true,
		autoplayTimeout: 6000,
		// autoplaySpeed: 1000,
		// navText: ['<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M379.644,477.872l-207.299-207.73c-7.798-7.798-7.798-20.486,0.015-28.299L379.643,34.128    c7.803-7.819,7.789-20.482-0.029-28.284c-7.819-7.803-20.482-7.79-28.284,0.029L144.061,213.574    c-23.394,23.394-23.394,61.459-0.015,84.838L351.33,506.127c3.907,3.915,9.031,5.873,14.157,5.873    c5.111,0,10.224-1.948,14.128-5.844C387.433,498.354,387.446,485.691,379.644,477.872z" /></svg>', '<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M367.954,213.588L160.67,5.872c-7.804-7.819-20.467-7.831-28.284-0.029c-7.819,7.802-7.832,20.465-0.03,28.284    l207.299,207.731c7.798,7.798,7.798,20.486-0.015,28.299L132.356,477.873c-7.802,7.819-7.789,20.482,0.03,28.284    c3.903,3.896,9.016,5.843,14.127,5.843c5.125,0,10.25-1.958,14.157-5.873l207.269-207.701    C391.333,275.032,391.333,236.967,367.954,213.588z" /></svg>'],
		// responsive: {
		// 	0: {
		// 		items: 2,
		// 		slideBy: 1,
		// 	}
		// }
	});

	$('#category_carousel').owlCarousel({
		// loop: true,
		lazyLoad: true,
		margin: 0,
		responsiveClass: true,
		nav: true,
		dots: false,
		autoHeight: false,
		// autoplay: true,
		// autoplaySpeed: 1000,
		navText: ['<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M379.644,477.872l-207.299-207.73c-7.798-7.798-7.798-20.486,0.015-28.299L379.643,34.128    c7.803-7.819,7.789-20.482-0.029-28.284c-7.819-7.803-20.482-7.79-28.284,0.029L144.061,213.574    c-23.394,23.394-23.394,61.459-0.015,84.838L351.33,506.127c3.907,3.915,9.031,5.873,14.157,5.873    c5.111,0,10.224-1.948,14.128-5.844C387.433,498.354,387.446,485.691,379.644,477.872z" /></svg>', '<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M367.954,213.588L160.67,5.872c-7.804-7.819-20.467-7.831-28.284-0.029c-7.819,7.802-7.832,20.465-0.03,28.284    l207.299,207.731c7.798,7.798,7.798,20.486-0.015,28.299L132.356,477.873c-7.802,7.819-7.789,20.482,0.03,28.284    c3.903,3.896,9.016,5.843,14.127,5.843c5.125,0,10.25-1.958,14.157-5.873l207.269-207.701    C391.333,275.032,391.333,236.967,367.954,213.588z" /></svg>'],
		responsive: {
			0: {
				items: 3,
				slideBy: 3,
			},
			991: {
				items: 8,
				slideBy: 8,
			}
		}
	});


	$('#slide_middle_carousel').owlCarousel({
		// loop: true,
		rewind: true,
		lazyLoad: true,
		margin: 10,
		responsiveClass: true,
		nav: false,
		dots: false,
		autoHeight: false,
		items: 2,
		autoplay: true,
		autoplayTimeout: 6000,
		// autoplaySpeed: 1000,
		// navText: ['<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M379.644,477.872l-207.299-207.73c-7.798-7.798-7.798-20.486,0.015-28.299L379.643,34.128    c7.803-7.819,7.789-20.482-0.029-28.284c-7.819-7.803-20.482-7.79-28.284,0.029L144.061,213.574    c-23.394,23.394-23.394,61.459-0.015,84.838L351.33,506.127c3.907,3.915,9.031,5.873,14.157,5.873    c5.111,0,10.224-1.948,14.128-5.844C387.433,498.354,387.446,485.691,379.644,477.872z" /></svg>', '<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M367.954,213.588L160.67,5.872c-7.804-7.819-20.467-7.831-28.284-0.029c-7.819,7.802-7.832,20.465-0.03,28.284    l207.299,207.731c7.798,7.798,7.798,20.486-0.015,28.299L132.356,477.873c-7.802,7.819-7.789,20.482,0.03,28.284    c3.903,3.896,9.016,5.843,14.127,5.843c5.125,0,10.25-1.958,14.157-5.873l207.269-207.701    C391.333,275.032,391.333,236.967,367.954,213.588z" /></svg>'],
		// responsive: {
		// 	0: {
		// 		items: 2,
		// 		slideBy: 1,
		// 	}
		// }
	});

	$('#gameonline_carousel').owlCarousel({
		// loop: true,
		rewind: true,
		lazyLoad: true,
		responsiveClass: true,
		nav: true,
		dots: false,
		autoHeight: false,
		autoplay: true,
		autoplayTimeout: 4000,
		// autoplaySpeed: 1000,
		navText: ['<i class="fafa-chevron-left"></i>', '<i class="fafa-chevron-right"></i>'],
		responsive: {
			0: {
				items: 3,
				slideBy: 1,
				margin: 15,
				// stagePadding: 30,
			},
			576: {
				items: 3,
				slideBy: 1,
				margin: 30,
			},
			767: {
				items: 4,
				slideBy: 1,
				margin: 30,
			},
			991: {
				items: 6,
				slideBy: 1,
				margin: 30,
			}
		}
	});

	$('#gamelucky_carousel').owlCarousel({
		// loop: true,
		rewind: true,
		lazyLoad: true,
		responsiveClass: true,
		nav: true,
		dots: false,
		autoHeight: false,
		autoplay: true,
		autoplayTimeout: 4000,
		// autoplaySpeed: 1000,
		navText: ['<i class="fafa-chevron-left"></i>', '<i class="fafa-chevron-right"></i>'],
		responsive: {
			0: {
				items: 3,
				slideBy: 1,
				margin: 15,
				// stagePadding: 30,
			},
			576: {
				items: 3,
				slideBy: 1,
				margin: 30,
			},
			767: {
				items: 4,
				slideBy: 1,
				margin: 30,
			},
			991: {
				items: 4,
				slideBy: 1,
				margin: 30,
			}
		}
	});


	$('#pay_carousel').owlCarousel({
		// loop: true,
		rewind: true,
		lazyLoad: true,
		responsiveClass: true,
		nav: false,
		dots: false,
		autoHeight: false,
		autoplay: true,
		autoplayTimeout: 4000,
		// autoplaySpeed: 1000,
		navText: ['<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M379.644,477.872l-207.299-207.73c-7.798-7.798-7.798-20.486,0.015-28.299L379.643,34.128    c7.803-7.819,7.789-20.482-0.029-28.284c-7.819-7.803-20.482-7.79-28.284,0.029L144.061,213.574    c-23.394,23.394-23.394,61.459-0.015,84.838L351.33,506.127c3.907,3.915,9.031,5.873,14.157,5.873    c5.111,0,10.224-1.948,14.128-5.844C387.433,498.354,387.446,485.691,379.644,477.872z" /></svg>', '<svg style="width: 14px;margin-top: -4px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve"><path d="M367.954,213.588L160.67,5.872c-7.804-7.819-20.467-7.831-28.284-0.029c-7.819,7.802-7.832,20.465-0.03,28.284    l207.299,207.731c7.798,7.798,7.798,20.486-0.015,28.299L132.356,477.873c-7.802,7.819-7.789,20.482,0.03,28.284    c3.903,3.896,9.016,5.843,14.127,5.843c5.125,0,10.25-1.958,14.157-5.873l207.269-207.701    C391.333,275.032,391.333,236.967,367.954,213.588z" /></svg>'],
		responsive: {
			0: {
				items: 3,
				slideBy: 1,
				margin: 15,
			},
			576: {
				items: 3,
				slideBy: 1,
				margin: 30,
			},
			767: {
				items: 4,
				slideBy: 1,
				margin: 30,
			},
			991: {
				items: 5,
				slideBy: 1,
				margin: 30,
			}
		}
	});

	// -------- Pop Up Intro

	// var popup_id_befor = '';
	
	// $.each(popup_id_arr, function (index, popup_id) {

	// 	if (index > 0) {
	// 		$('#modal_popup_intro_' + popup_id_befor).on('hidden.bs.modal', function () {
	// 			$('#modal_popup_intro_' + popup_id).modal();
	// 		})
	// 	} else {
	// 		$('#modal_popup_intro_' + popup_id).modal();
	// 	}

	// 	popup_id_befor = popup_id;

	// });

});
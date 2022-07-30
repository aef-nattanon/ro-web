$(document).ready(function () {

	var screen_w = $(window).width();

	if (screen_w <= 991) {

		var siteMenuClone = function () {

			$('.js-clone-nav svg.icon').remove();
			$('.js-clone-nav').clone().attr('class', 'site-nav-wrap clearfix').appendTo('.site-mobile-menu-body');
			$('.js-clone-nav').parents('.header-menu').remove();

			let counter = 0;
			$('.site-mobile-menu .has-children').each(function () {
				var $this = $(this);

				$this.prepend('<span class="arrow-collapse collapsed">');

				$this.find('.arrow-collapse').attr({
					'data-toggle': 'collapse',
					'data-target': '#collapseItem' + counter,
				});

				$this.find('> ul').attr({
					'class': 'collapse',
					'id': 'collapseItem' + counter,
				});

				counter++;

			});

		};
		siteMenuClone();

		$(document).on('click', '.arrow-collapse', function (e) {
			var $this = $(this);
			if ($this.closest('li').find('.collapse').hasClass('show')) {
				$this.removeClass('active');
			} else {
				$this.addClass('active');
			}
			e.preventDefault();

		});

		$(document).on('click', '.btn-menu, .site-mobile-menu .btn-closs-side-menu', function () {
			if ($('body').hasClass('offcanvas-menu')) {
				$('body').removeClass('offcanvas-menu');
			} else {
				$('body').addClass('offcanvas-menu');
			}
		});

		// click outisde offcanvas
		$(document).mouseup(function (e) {
			var site_mobile_menu = $(".site-mobile-menu");
			if (!site_mobile_menu.is(e.target) && site_mobile_menu.has(e.target).length === 0) {

				if ($('body').hasClass('offcanvas-menu')) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		});

	} else {
		$('.site-mobile-menu').remove();
	}

});
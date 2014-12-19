$(function () {
	$('.tiles').on('click', '.event-fold', function (e) {
		e.preventDefault();
		var tile = $(this).parents('.tile'),
		    tileBody = $(tile).children('.tile-body'),
			eventFoldIcon = $(this).find('i'),
			tileBodyContentHeight = $(tileBody).children('.tile-body-content').height() + (parseInt($('.tile-body-content').css('padding-top').substring(0, 2)) * 2),
		    duration = 300;

		if ($(tileBody).height() === 0) {

			$(eventFoldIcon).removeClass('fa-angle-double-down');
			$(eventFoldIcon).addClass('fa-angle-double-up');

			$(tileBody).animate({
				height: tileBodyContentHeight,
				opacity: '100'
			},
				{
					duration: duration,
					queue: false
				});

			$(tile).animate({
				'margin-bottom': '20px'
			},
				{
					duration: duration,
					queue: false,
					complete: function () {
						$(tileBody).height('auto');
			}
				});

		} else {

			$(eventFoldIcon).removeClass('fa-angle-double-up');
			$(eventFoldIcon).addClass('fa-angle-double-down');


			$(tileBody).animate({
				height: 0,
				opacity: 0
			},
				{
					duration: duration,
					queue: false
				});

			$(tile).animate({
				'margin-bottom': '-20px'
			},
				{
					duration: duration,
					queue: false
				});

		}
	});

	$('.time p').flowtype({
		minFont: 25,
		maxFont: 35,
		fontRatio: 10
	});

	$('.tile-head h1').flowtype({
		minFont: 20,
		maxFont: 55,
		fontRadio: 10
	});
});

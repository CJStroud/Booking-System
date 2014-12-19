$(function () {
	$('.tiles').on('click', '.fold', function (e) {
		e.preventDefault();
		var tile = $(this).parents('.tile'),
		    tileBody = $(tile).children('.tile-body'),
			foldIcon = $(this).find('i'),
			tileBodyContentHeight = $(tileBody).children('.tile-body-content').height() + (parseInt($('.tile-body-content').css('padding-top').substring(0, 2)) * 2),
		    duration = 300;

		if ($(tileBody).height() === 0) {

			$(foldIcon).removeClass('fa-angle-double-down');
			$(foldIcon).addClass('fa-angle-double-up');

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

			$(foldIcon).removeClass('fa-angle-double-up');
			$(foldIcon).addClass('fa-angle-double-down');


			$(tileBody).animate({
				height: 0,
				opacity: 0
			},
				{
					duration: duration,
					queue: false
				});

			$(tile).animate({
				'margin-bottom': '-1%'
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

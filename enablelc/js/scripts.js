// Dropdown Menu Fade    
jQuery(document).ready(function(){

    /* DR */
    $(".dropdown").hover(
        function() { $('.dropdown-menu', this).fadeIn("fast");
        },
        function() { $('.dropdown-menu', this).fadeOut("fast");
    });
    /* END DR */

    /* JW */

    // Calendar stuff
    var ajaxurl = $('.ajaxurl').text();
	var date = new Date();
	var month = date.getMonth();
	if(month == 12){
		month = 1;
	}else {
		month++;
	}
	var year = date.getFullYear();
	var selectedClassName = ''; 

	if($('.calendar-container').length > 0){

		$('a.has-event').each(function(){
			$(this).parent('.day-container').addClass($(this).attr('class'));
		});
	}

	$('.cal-next').click(function(){

		if(month == 12){
			month = 1;
			year++;
		}else {
			month++;
		}

		$('.calendar-container').empty();
		$('.calendar-container').append('<p class="loading">loading...</p>');

		$.post(templateUrl + '/wp-admin/admin-ajax.php', {
		    action: 'my_unique_action',
		    newmonth: month,
		    newyear: year
		}, function(data) {

		  	$('.calendar-container').prepend(data);
		  	$('.loading').remove();
			$('a.has-event').each(function(){
				$(this).parent('.day-container').addClass($(this).attr('class'));
			});

			if(selectedClassName == 'all'){
				$('.calendar-container a.has-event').show().parent('.day-container').addClass('has-event');
			}else {
				$('.calendar-container a.has-event').hide().parent('.day-container').removeClass('has-event');

				$('.calendar-container a.has-event').each(function(){
					if($(this).hasClass(selectedClassName)){
						$(this).show().parent('.day-container').addClass('has-event');
					}else {
						//console.log($(this).attr('class'), selectedClassName);
					}
				});
			}

		});

	});

	$('.cal-prev').click(function(){

		if(month == 1){
			month = 12;
			year--;
		}else {
			month--;
		}

		$('.calendar-container').empty();
		$('.calendar-container').append('<p class="loading">loading...</p>');

		$.post(templateUrl+'/wp-admin/admin-ajax.php', {
		    action: 'my_unique_action',
		    newmonth: month,
		    newyear: year
		}, function(data) {

		  	$('.calendar-container').prepend(data);
		  	$('.loading').remove();

		  	$('a.has-event').each(function(){
				$(this).parent('.day-container').addClass($(this).attr('class'));
			});

			if(selectedClassName == 'all'){
				$('.calendar-container a.has-event').show().parent('.day-container').addClass('has-event');
			}else {
				$('.calendar-container a.has-event').hide().parent('.day-container').removeClass('has-event');

				$('.calendar-container a.has-event').each(function(){
					if($(this).hasClass(selectedClassName)){
						$(this).show().parent('.day-container').addClass('has-event');
					}else {
						//console.log($(this).attr('class'), selectedClassName);
					}
				});
			}

		});

	});

	$('.calendar-filters select').on('change', function(e){
		//e.preventDefault();
		selectedClassName = $(this).val();
		if(selectedClassName == 'all'){
			$('.calendar-container a.has-event').show();
		}else {
			$('.calendar-container a.has-event').hide().parent('.day-container').removeClass('has-event');

			$('.calendar-container a.has-event').each(function(){
				if($(this).hasClass(selectedClassName)){
					$(this).show().parent('.day-container').addClass('has-event');
				}else {
					//console.log($(this).attr('class'), selectedClassName);
				}
			});
		}
	});

	$('.calendar-container a.has-event').click(function(e){
		e.preventDefault();

	});

	$('.calendar-container .day-container').click(function(){
		$(this).find('.hidden-calendar-poup').clone().appendTo('.cal-popup');
		$('.cal-popup').show();
	});

	var windowHeight = parseInt($(window).height());
	var windowWidth = parseInt($(window).width());
	
	if($('.calendar-container').length >0 && windowWidth < 768){
			$('.calendar-day-head').each(function(){
				var str = $(this).text();
				var res = str.charAt(0);
				$(this).text(res);
			});
	}


	$('.open-feedback-form').click(function(){
		$('.feedback-form-container').animate({height:windowHeight},200);
	});

	$('.feedback-form-container .close-form').click(function(){
		$('.feedback-form-container').animate({height:0},200);
	});

	$('.open-search').click(function(){
		$('.search-container').animate({height:windowHeight},200);
	});

	$('.search-container .close-form').click(function(){
		$('.search-container').animate({height:0},200);
	});

	$('.section_menu .menu-item-has-children>a').click(function(e){
		e.preventDefault();
		console.log('gg');
		$(this).parent('.menu-item-has-children').find('.sub-menu').toggleClass('shown');
	});

	// $('.section_menu .menu-item-has-children a').click(function(e){
	// 	e.preventDefault();
	// 	var curSubMenu = $(this).parent('.menu-item-has-children').find('.sub-menu');
	// 	if(curSubMenu.css('display') == 'block'){
	// 		curSubMenu.hide();
	// 	}else {
	// 		curSubMenu.show();
	// 	}
	// });

	if($('.section_menu').length > 0){
		var section_ID = $('.section_menu').attr('id');
		var section_ID = section_ID.replace("menu-section_menu", "content");
		$('.column_wrapper').attr('id', section_ID);
	}
	


	/* END JW */

});
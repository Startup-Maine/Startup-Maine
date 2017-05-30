jQuery(function($){
	
	//bottom form css helper for mobile
	$('ul#menu-tab-menu').on('click', '.menu-toggle', function(){
		$(this).parent().toggleClass('open');
	});

	/*if not ios, open form in new tab
	if (!navigator.userAgent.match(/(iPod|iPhone|iPad)/i)) {
		$('header form').attr('target', '_blank');
	}*/
		
	//get circle	 and triangle coordinates
	if (coordinates = Cookies.get('mscw_triangle')) {
		coordinates = coordinates.split(',');
		$('#triangle').css({left:coordinates[0] + 'px', top:coordinates[1] + 'px'});
	}
	if (coordinates = Cookies.get('mscw_circle')) {
		coordinates = coordinates.split(',');
		$('#circle').css({left:coordinates[0] + 'px', top:coordinates[1] + 'px'});
	}
		
	//draggable circle and triangle
	$('#triangle').draggable({
		stop: function(event, ui) {
			Cookies.set('mscw_triangle', ui.position.left + ',' + ui.position.top);
		}
	}).addClass('loaded');
	$('#circle').draggable({
		stop: function(event, ui) {
			Cookies.set('mscw_circle', ui.position.left + ',' + ui.position.top);
		}
	}).addClass('loaded');
	
	//togglable forms
	$('.wpcf7-submit').wrap('<span class="wpcf7-form-control-wrap"/>');
	$('.wpcf7-form-control-wrap').each(function(){
		var class_names = $(this).children().first().attr('class');
		class_names = class_names.replace('wpcf7-form-control ', '');
		$(this).addClass(class_names);
	});
	$('.wpcf7').addClass('loaded');

	//schedule accordion
	var $schedule = $('#schedule');
	$schedule.on('show.bs.collapse','.collapse', function() {
	    $schedule.find('.collapse.in').collapse('hide');
	});
	
	//youtube on homepage
	YTdeferred.done(function(YT) {
		player = new YT.Player('ytplayer', {
			events: {
				'onStateChange': function(event){
					if ((event.data == 1) || (event.data == 3) || (event.data == 5)) {
						//buffering, playing, or cued, pause bootstrap
						$('.carousel').carousel('pause');
					} else {
						//unstarted, ended, or paused, play bootstrap
						$('.carousel').carousel();
					}
				}
			}
		});
	});
	
	var $body = $('body');
	
	//handle animations between regular and yellow pages, and/or smooth scrolling
	$body.on('click', 'a', function(e){
		
		var url = $(this).attr('href');

		var host = location.protocol + '//' + location.hostname;
				
		//don't do this for home page carousel controls
		if ($(this).hasClass('carousel-control')) return;
		
		//make sure this.hash has a value before overriding default behavior
		if (url.substr(0, 1) == '#') {
			
			//prevent default anchor click behavior
			e.preventDefault();
						
			var top = $(url).offset().top - ($('nav#utility').offset().top + $('nav#utility').height());
						
			//scroll			
			$('html, body').animate({ scrollTop: top }, 400, function(){
				window.location.hash = url;
			});
			
			return;
		}

		//this only applies to internal links
		if (url.substr(0, host.length) != host) return;

		//trim host off of URL
		url = url.substr(host.length);
		
		//can't be empty for ajax
		if (url == '') url = '/';
		
		//see if page we're linking to is yellow
		var isYellowPage = (url != '/') &&
						   (url != '/program') &&
						   (url != '/people') &&
						   (url.substr(0, 9) != '/program/') &&
						   (url.substr(0, 8) != '/people/');
						   
		e.preventDefault();
		
		$('ul#menu-tab-menu').removeClass('open');
		$('li.current_page_item').removeClass('current_page_item');
		$('li.current_menu_item').removeClass('current_menu_item');

		if ($(this).parents('#menu-tab-menu')) {
			$(this).parent().addClass('current_page_item');
		} else if ($(this).parents('#menu-header-menu')) {
			$(this).parent().addClass('current_menu_item');
		}
		
		$.get(url, { pjax: true }, function(data){
			if (isYellowPage) {
				$('main#primary').slideUp();
				$('main#secondary').html(data).slideDown();
				$body.addClass('yellow');					
			} else {
				$('main#secondary').slideUp();
				$('main#primary').html(data).slideDown(function(){
					$body.removeClass('yellow');
				});
			}
			$('html, body').animate({ scrollTop: 0 }, 400, function(){
				history.pushState(null, null, url);
				var _gaq = _gaq || [];
				_gaq.push(['_trackPageview']);
			});
		});

	});
	
	
});

//youtube on homepage
var player = null;
var YTdeferred = jQuery.Deferred();
window.onYouTubeIframeAPIReady = function() {
	YTdeferred.resolve(window.YT);
};
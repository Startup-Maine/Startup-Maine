jQuery(function($){
	
	var $body = $('body');
	
	//bottom form css helper for mobile
	$('ul#menu-tab-menu').on('click', '.menu-toggle', function(){
		$(this).parent().toggleClass('open');
	});

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
	$body.on('show.bs.collapse','.collapse', function(e) {
	    $body.find('.collapse.in').collapse('hide');
		Cookies.set('schedule', $(e.target).attr('id'));
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
	
	//handle animations between regular and yellow pages, and/or smooth scrolling
	function loadPage(url, e) {
		
		var host = location.protocol + '//' + location.hostname;
				
		//for anchor links, handle smooth scrolling
		if (url.substr(0, 1) == '#') {
			
			//prevent default anchor click behavior
			if (e) e.preventDefault();
						
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
		
		//don't do this with wp-admin links
		if (url.substr(0, 9) == '/wp-admin') return;
				
		//can't be empty for ajax
		if (url == '') url = '/';
		
		//see if page we're linking to is yellow
		var isYellowPage = (url != '/') &&
						   (url != '/program') &&
						   (url != '/people') &&
						   (url.substr(0, 9) != '/program/') &&
						   (url.substr(0, 8) != '/people/');
						   
		if (e) e.preventDefault();
		
		$('ul#menu-tab-menu').removeClass('open');
		$('li.current_page_item').removeClass('current_page_item');
		$('li.current-menu-item').removeClass('current-menu-item');

		if ($(this).parents('#menu-tab-menu')) {
			$(this).parent().addClass('current_page_item');
		} else if ($(this).parents('#menu-header-menu')) {
			$(this).parent().addClass('current-menu-item');
		}
		
		$.get(url, { pjax: true }, function(data){
			
			//replace page content
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
			
			//scroll to top, except on schedule page
			if (url != '/program') {
				$('html, body').animate({ scrollTop: 0 }, 400);
			}

			//manage url
			history.pushState(null, null, url);
			
			//push pageview to google analytics
			var _gaq = _gaq || [];
			_gaq.push(['_trackPageview']);
		});

	}
	
	//intercept all a clicks with loadPage
	$body.on('click', 'a', function(e){
		//don't do this for home page carousel controls
		if ($(this).hasClass('carousel-control')) return;
		var url = $(this).attr('href');
		loadPage(url, e);
	});
	
	//popstate occurs when going back
	$(window).on('popstate', function(e){
		loadPage(location.href);
	});
	
});

//youtube on homepage
var player = null;
var YTdeferred = jQuery.Deferred();
window.onYouTubeIframeAPIReady = function() {
	YTdeferred.resolve(window.YT);
};
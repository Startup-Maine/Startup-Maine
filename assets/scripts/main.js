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
	
	//smooth scroll anchor links
	$('#content').on('click', 'a', function(event) {
		
		//don't do this for home page carousel controls
		if ($(this).hasClass('carousel-control')) return;
		
		//make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			//prevent default anchor click behavior
			event.preventDefault();
			
			//store hash
			var hash = this.hash;
			
			var top = $(hash).offset().top - ($('nav#utility').offset().top + $('nav#utility').height());
						
			//scroll			
			$('html, body').animate({ scrollTop: top }, 400, function(){
				window.location.hash = hash;
			});
		}
		
	});
	
	/*footer links
	$('#footer').on('click', 'a', function(e){
		
		e.preventDefault();
		var url = $(this).attr('href');
		
		if ($(this).parent().hasClass('current_page_item')) return;
		
		$('#footer li.current_page_item').removeClass('current_page_item');
		
		$(this).parent().addClass('current_page_item');
				
		$.get(url, { pjax: true }, function(data){
			$('main').html(data);
			history.pushState(null, null, url);
		});

	});*/
	
	
});

//youtube on homepage
var player = null;
var YTdeferred = jQuery.Deferred();
window.onYouTubeIframeAPIReady = function() {
	YTdeferred.resolve(window.YT);
};
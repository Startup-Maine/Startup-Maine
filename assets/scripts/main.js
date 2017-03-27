jQuery(function($){
	
	//bottom form css helper for mobile
	$('ul#menu-tab-menu').on('click', '.menu-toggle', function(){
		$(this).parent().toggleClass('open');
	});

	//submitting a form in a new window isn't kosher on ios
	if (navigator.userAgent.match(/(iPod|iPhone|iPad)/i)) {
		$('#header form').removeAttr('target');
	}
	
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
		
		// Make sure this.hash has a value before overriding default behavior
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
	
	
});

//youtube on homepage
var player = null;
var YTdeferred = jQuery.Deferred();
window.onYouTubeIframeAPIReady = function() {
	YTdeferred.resolve(window.YT);
};
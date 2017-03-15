jQuery(function($){
	$('ul#menu-tab-menu').on('click', '.menu-toggle', function(){
		$(this).parent().toggleClass('open');
	});
	
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
});

var player = null;
var YTdeferred = jQuery.Deferred();
window.onYouTubeIframeAPIReady = function() {
	YTdeferred.resolve(window.YT);
};
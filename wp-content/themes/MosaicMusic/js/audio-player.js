jQuery(function() { 
// Setup the player to autoplay the next track
var a = audiojs.createAll({
  trackEnded: function() {
	var next = jQuery('ol li.playing').next();
	if (!next.length) next = jQuery('ol li').first();
	next.addClass('playing').siblings().removeClass('playing');
	audio.load(jQuery('a', next).attr('data-src'));
	audio.play();
  }
});

// Load in the first track
var audio = a[0];
	first = jQuery('ol a').attr('data-src');
jQuery('ol li').first().addClass('playing');
audio.load(first);

// Load in a track on click
jQuery('ol li').click(function(e) {
  e.preventDefault();
  jQuery(this).addClass('playing').siblings().removeClass('playing');
  audio.load(jQuery('a', this).attr('data-src'));
  audio.play();
});
// Keyboard shortcuts
jQuery(document).keydown(function(e) {
  var unicode = e.charCode ? e.charCode : e.keyCode;
	 // right arrow
  if (unicode == 39) {
	var next = jQuery('li.playing').next();
	if (!next.length) next = jQuery('ol li').first();
	next.click();
	// back arrow
  } else if (unicode == 37) {
	var prev = jQuery('li.playing').prev();
	if (!prev.length) prev = jQuery('ol li').last();
	prev.click();
	// spacebar
  } else if (unicode == 32) {
	audio.playPause();
  }
})
});
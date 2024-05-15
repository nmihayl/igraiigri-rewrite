; (function ($) { $.fn.unveil = function (threshold) { var $w = $(window), th = threshold || 0, retina = window.devicePixelRatio > 1, attrib = retina ? "data-src-retina" : "data-src", images = this, loaded, inview, source; this.one("unveil", function () { source = this.getAttribute(attrib); source = source || this.getAttribute("data-src"); if (source) this.setAttribute("src", source); }); function unveil() { inview = images.filter(function () { var $e = $(this), wt = $w.scrollTop(), wb = wt + $w.height(), et = $e.offset().top, eb = et + $e.height(); return eb >= wt - th && et <= wb + th; }); loaded = inview.trigger("unveil"); images = images.not(loaded); } $w.scroll(unveil); $w.resize(unveil); unveil(); return this; }; })(jQuery);

var timer;

$(function () {

	$('.listItem a').hover(function () {
		//$(this).data('screenshot');
		var target = $(this).data('target');
		$('#' + target + ' a img').attr('src', '/screenshots/90_' + $(this).data('screenshot') + '.jpg');
	});

	$('.sideLinks li a').hover(function () {
		if ($(this).data('screenshot')) {
			var position = $(this).offset();
			$('#tooltip').addClass('screenshot');
			$('#tooltip').css('display', 'block');

			position.top = position.top - 10;

			$('#tooltip').css('left', position.left + $(this).outerWidth() + 'px');
			$('#tooltip').css('top', position.top - 50 + 'px');

			$('#tooltip').html('<img src="/screenshots/90_' + $(this).data('screenshot') + '.jpg" width="200" height="123">');
		}
	},
		function () {
			$('#tooltip').css('display', 'none');
		});


	$('.rollover, .rolloverP').hover(function () {
	},
		function () {
			clearTimeout(timer);
		});
});

function swapThumbnail(thisObject) {
	clearTimeout(timer);
	currentSrc = thisObject.find('img').attr('src');
	if (currentSrc.search('p.jpg') != -1) {
		thisObject.find('img').attr('src', currentSrc.replace('p.jpg', 'a.jpg'));
	} else if (currentSrc.search('a.jpg') != -1) {
		thisObject.find('img').attr('src', currentSrc.replace('a.jpg', 'b.jpg'));
	} else if (currentSrc.search('b.jpg') != -1) {
		thisObject.find('img').attr('src', currentSrc.replace('b.jpg', 'c.jpg'));
	} else {
		if (thisObject.hasClass('rolloverP')) {
			thisObject.find('img').attr('src', currentSrc.replace('c.jpg', 'p.jpg'));
		} else {
			thisObject.find('img').attr('src', currentSrc.replace('c.jpg', 'a.jpg'));
		}
	}

	timer = setTimeout(function () {
		swapThumbnail(thisObject)
	}, 600);

}

function fullScreen() {
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();

	var usableWidth = windowWidth - 20;
	var targetWidth = usableWidth - 200 - 26;
	var targetHeight = targetWidth / gameStartWidth * gameStartHeight;

	if (targetHeight > windowHeight - 80) {
		var targetHeight = windowHeight - 80;
		var targetWidth = targetHeight / gameStartHeight * gameStartWidth;
		var usableWidth = targetWidth + 200 + 26;

	}

	if (usableWidth < 980) {
		usableWidth = 980;
	}
	$('#container').width(usableWidth + 'px');
	$('#content').width(usableWidth - 200 + 'px');
	$('#location').width(usableWidth - 200 - 34 + 'px');
	$('#gameBlock').width(usableWidth - 200 - 12 + 'px');
	$('#gameHeader').width(usableWidth - 200 - 12 + 'px');

	$('#gameExtra').removeClass('onSide');

	$('#gameHolder').width(targetWidth + 10 + 'px');
	$('#gameContent').width(targetWidth + 'px');
	$('#gameContent').height(targetHeight + 'px');
}


function preRoll() {
	finishPreroll();
}

function finishPreroll() {

	var ratingHeight = 45;

	$('#gamePreroll').css('display', 'none');
	$('#gameRating').css('display', 'block');
	$('#fullscreen').css('visibility', 'visible');
	if (leaderboardDistance < ratingHeight) {
		$('#gameRating').css('display', 'none');
		$('#gameHolder').css('margin-bottom', leaderboardDistance + 'px');
	} else {
		$('#gameHolder').css('margin-bottom', (leaderboardDistance - ratingHeight) + 'px');
	}
	if (gameStartWidth > $('#gameHolder').width() && resizeable == 'yes') {

		targetWidth = $('#gameHolder').width() - 10;
		$('#gameHolder').width(targetWidth + 10 + 'px');
		$('#gameContent').width(targetWidth + 'px');
		$('#gameContent').height(targetWidth / gameStartWidth * gameStartHeight + 'px');

	} else {

		$('#gameHolder').width(gameStartWidth + 10 + 'px');
		$('#gameContent').width(gameStartWidth + 'px');
		$('#gameContent').height(gameStartHeight + 'px');
	}

	$('#gameContent').css('position', 'relative');
	$('#gameContent').css('top', '0');
	$('#gameContent').css('left', '0');

	clearTimeout(timer);

}

function moveLeaderboard(distance) {
	if (distance == 'adsenseDistance') {
		leaderboardDistance = 150;
	} else {
		leaderboardDistance = distance;
	}
}

function initTimer(loadingTime, embedGameOn, skippableOn) {
	prerollLength = loadingTime * 100;
	prerollSkippable = skippableOn * 100;
}

$(document).ready(function () {
	$('img').unveil();
	if ($('#addthis') && typeof addthis !== 'undefined') addthis.init();
});

window.onload = fullScreen(); {
	fullScreen();
}
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

//Select 2 initiate
$('select.select2').select2();
$("select.select2NoSearch").select2({
	minimumResultsForSearch: Infinity
});

function fa_icon_format(icon) {
	var originalOption = icon.element;
	return '<i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text;
}
$("select.select2icon").select2({
	formatResult: fa_icon_format
});


//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function () {
	$(window).bind("load resize", function () {
		topOffset = 50;
		width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
		if (width < 768) {
			$('div.navbar-collapse').addClass('collapse');
			topOffset = 100; // 2-row-menu
		} else {
			$('div.navbar-collapse').removeClass('collapse');
		}

		height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
		height = height - topOffset;
		if (height < 1) height = 1;
		if (height > topOffset) {
			$("#page-wrapper").css("min-height", (height) + "px");
		}
	});

	var url = window.location;
	var element = $('ul.nav a').filter(function () {
		return this.href == url;
	}).addClass('active').parent().parent().addClass('in').parent();
	if (element.is('li')) {
		element.addClass('active');
	}
});

/**
 * URL Encode Function
 * @param str
 * @returns {string}
 */
function rawurlencode(str) {
	str = (str + '').toString();
	return encodeURIComponent(str)
		.replace(/!/g, '%21')
		.replace(/'/g, '%27')
		.replace(/\(/g, '%28')
		.replace(/\)/g, '%29')
		.replace(/\*/g, '%2A');
}


function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

/**
 * Make Sticky menu
 */

var make_sticky_menu = function () {
	var headerHeight = $('#sub-header').outerHeight();
	var navbarHeight = $('.navbar-static-top').outerHeight();
	if ($(document).scrollTop() >= headerHeight) {
		$('.navbar-static-top').addClass('sticky-menu');
		$('#sub-header').css('margin-bottom', navbarHeight);
	} else {
		$('.navbar-static-top').removeClass('sticky-menu');
		$('#sub-header').css('margin-bottom', '0');
	}
};
$(document).bind('scroll', make_sticky_menu);



function showHide(shID) {
	if (document.getElementById(shID)) {
		if (document.getElementById(shID + '-show').style.display != 'none') {
			document.getElementById(shID + '-show').style.display = 'none';
			document.getElementById(shID).style.display = 'block';
		} else {
			document.getElementById(shID + '-show').style.display = 'inline';
			document.getElementById(shID).style.display = 'none';
		}
	}
}

function getTimeRemaining(endtime) {
	var t = new Date(endtime.replace(/-/g, '/')) - Date.parse(new Date());
	var seconds = Math.floor((t / 1000) % 60);
	var minutes = Math.floor((t / 1000 / 60) % 60);
	var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
	var days = Math.floor(t / (1000 * 60 * 60 * 24));
	return {
		'total': t,
		'days': days,
		'hours': hours,
		'minutes': minutes,
		'seconds': seconds
	};
}


$(document).ready(function () {
	var countDownWrap = $('.countdown');

	if (countDownWrap.length) {
		var i;
		for (i = 0; i < countDownWrap.length; i++) {
			var countDownItem = countDownWrap[i];

			var endtime = countDownItem.getAttribute('data-expire-date');
			var sold = countDownItem.getAttribute('data-sold');

			var timeinterval = setInterval(function (countDownItem, endtime) {
				var t = getTimeRemaining(endtime);
				var daysWord = t.days < 2 ? 'Tag' : 'Tage';
				var clockHtml = t.days + ' ' + daysWord + ' ' + t.hours + ':' + t.minutes + ':' + t.seconds + '<b>';

				$(countDownItem).html(clockHtml);
				if (t.total <= 0) {
					$(countDownItem).css('color', 'red');

					// clearInterval(timeinterval);
					if (sold == 'sold') {
						$(countDownItem).html(jsonData.sold);
					} else {
						$(countDownItem).html(jsonData.not_sold);
					}
				}
			}, 1000, countDownItem, endtime);
		}
	}
});

$("#bid-history").click(function () {
	var navbarHeight = $('.navbar-static-top').outerHeight();
	$('html, body').animate({
		scrollTop: $("#bid_history").offset().top - navbarHeight - 20
	}, 1000);
});

$(document).ready(function () {
	var height = $("#footer").outerHeight();
	$("#app").css("margin-bottom", "-" + height + "px");
	$(".push-footer").css("height", height + "px");
});

$(document).ready(function () {
	$(".notification").click(function () {
		$(".notification-div").toggle();
	});
	$("body").click(function (e) {
		if ($(e.target).closest(".notification").length != 0) return false;
		$(".notification-div").hide();
	});
	$(".dropdown-toggle.user").click(function () {
		$(".dropdown-menu.user").toggle();
	});
	$("body").click(function (e) {
		if ($(e.target).closest(".dropdown-toggle.user").length != 0) return false;
		$(".dropdown-menu.user").hide();
	});
});

$(document).ready(function () {
	if ($("#back-to-top").length) {
		var scrollTrigger = 300, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$("#back-to-top").addClass("back-to-top-show");
				} else {
					$("#back-to-top").removeClass("back-to-top-show");
				}
			};
		backToTop();
		$(window).on("scroll", function () {
			backToTop();
		});
		$("#back-to-top").on("click", function (e) {
			e.preventDefault();
			$("html, body").animate({
				scrollTop: 0
			}, 800);
		});
	}
});

// number format
function number_format(number, decimals, dec_point, thousands_sep) {
	// Strip all characters but numerical ones.
	number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
	var n = !isFinite(+number) ? 0 : +number,
		prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		s = '',
		toFixedFix = function (n, prec) {
			var k = Math.pow(10, prec);
			return '' + Math.round(n * k) / k;
		};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}

function toFloat(num) {
	var dotPos = num.lastIndexOf('.');
	var commaPos = num.lastIndexOf(',');
	var sep = ((dotPos > commaPos) && dotPos) ? dotPos : (((commaPos > dotPos) && commaPos) ? commaPos : false);
	if (!sep) {
		return parseFloat(num.replace(/[^\d]/g, ""));
	}
	return parseFloat(
		num.substr(0, sep).replace(/[^\d]/g, "") + '.' +
		num.substr(sep + Number(1), num.length).replace(/[^\d]/g, "")
	);
}

$(document).ready(function () {
	$(".filter-holder select").click(function () {
		$(this).toggleClass("select-focus");
	});
	$(".filter-holder select").blur(function () {
		$(this).removeClass("select-focus");
	});
});
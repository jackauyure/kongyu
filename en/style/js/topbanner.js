$(function(){
	var defaultOpts = {
	    interval: 5000,
	    fadeInTime: 500,
	    fadeOutTime: 500
	};
	var _bodies = $("ul.slide-pic li");
	var _count = _bodies.length;
	var _current = 0;
	var _intervalID = null;
	var stop = function() {
	    window.clearInterval(_intervalID);
	};
	var slide = function(opts) {
	    if (opts) {
	        _current = opts.current || 0;
	    } else {
	        _current = (_current >= (_count - 1)) ? 0 : (++_current);
	    };
	    _bodies.filter(":visible").fadeOut(defaultOpts.fadeOutTime,
	    function() {
	        _bodies.eq(_current).fadeIn(defaultOpts.fadeInTime);
	        _bodies.removeClass("cur").eq(_current).addClass("cur");
	    });
	}; 
	var go = function() {
	    stop();
	    _intervalID = window.setInterval(function() {
	        slide();
	    },
	    defaultOpts.interval);
	}; 
	var itemMouseOver = function(target, items) {
	    stop();
	    var i = $.inArray(target, items);
	    slide({
	        current: i
	    });
	};
	_bodies.hover(stop, go);
	go(); 
	
	$(".togglenav").hover(function(){
		$(this).find(".subnavwrap").toggle();
	});
})
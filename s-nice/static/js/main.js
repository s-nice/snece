;(function () {
	
	'use strict';

	// iPad and iPod detection	
	var isiPad = function(){
		return (navigator.platform.indexOf("iPad") != -1);
	};

	var isiPhone = function(){
	    return (
			(navigator.platform.indexOf("iPhone") != -1) || 
			(navigator.platform.indexOf("iPod") != -1)
	    );
	};

	// OffCanvass
	var offCanvass = function() {
		$('body').on('click', '.js-fh5co-menu-btn, .js-fh5co-offcanvass-close', function(){
			$('#fh5co-offcanvass').toggleClass('fh5co-awake');
		});
	};

	// Click outside of offcanvass
	var mobileMenuOutsideClick = function() {
		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvass, .js-fh5co-menu-btn");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	    	if ( $('#fh5co-offcanvass').hasClass('fh5co-awake') ) {
	    		$('#fh5co-offcanvass').removeClass('fh5co-awake');
	    	}
	    }
		});

		$(window).scroll(function(){
			if ( $(window).scrollTop() > 500 ) {
				if ( $('#fh5co-offcanvass').hasClass('fh5co-awake') ) {
		    		$('#fh5co-offcanvass').removeClass('fh5co-awake');
		    	}
	    	}
		});
	};

	// Magnific Popup
	
	var magnifPopup = function() {
		$('.image-popup').magnificPopup({
			type: 'image',
			removalDelay: 300,
			mainClass: 'mfp-with-zoom',
			titleSrc: 'title',
			gallery:{
				enabled:true
			},
			zoom: {
				enabled: true, // By default it's false, so don't forget to enable it

				duration: 300, // duration of the effect, in milliseconds
				easing: 'ease-in-out', // CSS transition easing function

				// The "opener" function should return the element from which popup will be zoomed in
				// and to which popup will be scaled down
				// By defailt it looks for an image tag:
				opener: function(openerElement) {
				// openerElement is the element on which popup was initialized, in this case its <a> tag
				// you don't need to add "opener" option if this code matches your needs, it's defailt one.
				return openerElement.is('img') ? openerElement : openerElement.find('img');
				}
			}
		});
	};



	var animateBoxWayPoint = function() {

		if ($('.animate-box').length > 0) {
			$('.animate-box').waypoint( function( direction ) {

				if( direction === 'down' && !$(this).hasClass('animated') ) {
					$(this.element).addClass('bounceIn animated');
				}

			} , { offset: '75%' } );
		}

	};

	

	
	$(function(){
		magnifPopup();
		offCanvass();
		mobileMenuOutsideClick();
		animateBoxWayPoint();
		require();
	});


}());



function require() {
	var content = '';
	function add_post(mode) {
		var imgid=$('#imgid').html();
		var pid=$('#pid').html();
		$('#imgid').remove();
		
		var data=new Array();
		data[0]=pid;
		data[1]=imgid;
		$.ajax({
			url: '/common/getimg',
			//dataType: 'json',
			cache: false,
			async: false,
			type: 'POST',
			data: {data: data},
			success: function (data) {
				if (data != 0) {
					content = eval(data);
					
					for (var i = 0; i < content.length; i++) {
						var item = document.createElement('div');

						salvattore[mode + '_elements'](grid, [item]);

						item.outerHTML = content[i];
					}
					
				} else {
					$('#more').html('无更多');
				}
			},
		});

		
	}

	function prepend_post(event) {
		add_post('prepend');
	}

	function append_post(event) {
		add_post('append');
	}
	var grid = document.querySelector('#fh5co-board');
	var appendButton = document.querySelector('.post-append');

	appendButton.addEventListener('click', append_post);
}
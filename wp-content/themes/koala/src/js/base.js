
jQuery(document).ready(function() {
	"use strict";

	
	(function(){
		appendNavigationsIcons();
		adjustContentBorder();
		setActiveHeaderElement();
		configureSubscribeForm();
		configurePagination();
		codeHighlight();
		hideComments();
		configureRetinaImages();
		resizePostGrid();
	})();

	jQuery(window).load(function(){
		adjustHeaderHeight();
		resizePostGrid();
	});


	// GLOBAL

	jQuery('html').click(function(event){
		if(!jQuery(event.target).is('.searchbar, .searchform, .query, .searchform span')){
			jQuery('.top-bar .searchbar').fadeOut(300);
		}
		if(!jQuery(event.target).is('.responsivemenu')){
			jQuery('.top-bar .responsivemenu').fadeOut(300);
		}
	});


	// RETINA IMAGES

	function configureRetinaImages(){
		jQuery('img').attr('data-no-retina', 'true');
		jQuery('img.retina').removeAttr('data-no-retina', 'false');
	}


	// CODE HIGHLIGHTER

	function codeHighlight(){
		if(ecko_theme_vars.general_disable_syntax_highlighter !== "1"){
			Rainbow.color();
		}
	}


	// HIDE COMMENTS

	function hideComments(){
		if(ecko_theme_vars.general_hidecomments == "1" && window.location.hash == ""){
			jQuery('.comments-main').hide();
			jQuery('.post-comments .post-footer-header h3').html('<i class="fa fa-comment-o"></i>View Comments');
			jQuery('.post-comments .post-footer-header h3').css('cursor', 'pointer');
		}
	}

	jQuery('.post-comments .post-footer-header').click(function(){
		jQuery('.comments-main').slideDown(500);
		jQuery('.post-comments .post-footer-header h3').html('<i class="fa fa-comment-o"></i>Comments');
		jQuery('.post-comments .post-footer-header h3').css('cursor', 'default');
	});


	// ADJUST HEADER HEIGHT

	function adjustHeaderHeight(){
		jQuery('.post-slider-container').height(jQuery('.post-slider-post.active').height());
	}


	// STICKY TOPBAR

	if(ecko_theme_vars.topbar_disable_sticky != "1"){
		jQuery(window).scroll(function(){
			if(jQuery(document).scrollTop() > 0){
				jQuery('.top-bar-scroll').fadeIn(0);
				jQuery('.top-bar-scroll').addClass('sticky');
				jQuery('.searchbar').fadeOut(200);
				jQuery('.responsivemenu').fadeOut(200);
			}else{
				jQuery('.top-bar-scroll').fadeOut(400);
				jQuery('.top-bar-scroll').removeClass('sticky');
				jQuery('.searchbar').fadeOut(200);
				jQuery('.responsivemenu').fadeOut(200);
			}
		});
	}


	// SCROLL TO TOP

	jQuery('.backtotop').click(function(event){
		event.preventDefault();
		jQuery('html, body').animate({
			scrollTop: 0
		}, 600);
	});

 
	// SCROLL TO CONTENT

	jQuery('.scrolltocontent').click(function(event){
		event.preventDefault();
		var viewportHeight = jQuery(window).height() - 60;
		jQuery('html, body').animate({
			scrollTop: viewportHeight
		}, 600);
	});


	// RESPONSIVE NAVIGATION

	function appendNavigationsIcons(){
		jQuery('.top-bar nav .menu-item-has-children > a').append('<i class=\"fa fa-caret-down\"></i>');
		jQuery('.widget.navigation .menu-item-has-children > a').append('<i class=\"fa fa-caret-down\"></i>');
		jQuery('.responsivemenu .menu-item-has-children > a').append('<i class=\"fa fa-caret-down\"></i>');
	}

	jQuery('.responsivenav').click(function(event){
		event.stopPropagation();
		var parent = jQuery(this).closest('.top-bar');
		jQuery('.responsivemenu', parent).fadeToggle(300);
	});

	jQuery('.responsivemenu li.menu-item-has-children > a').on("click", function(event){
		event.stopPropagation();
		var parent = jQuery(this).parent();
		jQuery('a i', parent).toggleClass('fa-caret-down');
		jQuery('a i', parent).toggleClass('fa-caret-up');
		jQuery('.sub-menu', parent).slideToggle();
		return false;
	});


	// SIDEBAR BORDER

	function adjustContentBorder(){
		if(jQuery('.page-main').height() > jQuery('.sidebar').height()){
			jQuery('.sidebar').css('border', '0');
			if(jQuery('body.page-layout-left-sidebar').length > 0){
				jQuery('.page-main').css('border-left', '1px solid #ECECEC');
			}else{
				jQuery('.page-main').css('border-right', '1px solid #ECECEC');
			}
		}
	}


	// POST GRID

	jQuery('.post-grid .post h3').hover(function(){
		jQuery(this).parent('.post-content').siblings('.background').css('opacity', 0.65);
	}, function(){
		jQuery(this).parent('.post-content').siblings('.background').css('opacity', 0.55);
	});


	// POST SLIDER

	function setActiveHeaderElement(){
		jQuery('.post-slider-container > .post-slider-post:first-of-type').addClass('active');
	}

	jQuery('.post-slider .previous-post').click(function(){
		var activePost = jQuery('.post-slider-post.active');
		var previousPost = jQuery(activePost).prev();
		var background = jQuery('.post-slider-background');
		if(previousPost.length == 0){
			previousPost = jQuery('.post-slider-container > .post-slider-post:last-of-type');
		}
		jQuery(background).fadeOut(400);
		jQuery(activePost).fadeOut(400, function(){
			jQuery(background).css('background-image', 'url(' + jQuery(previousPost).attr('data-background') + ')')
			activePost.removeClass('active');
			previousPost.addClass('active');
			jQuery('.post-slider-container').height(jQuery('.post-slider-post.active').height());
			jQuery(background).fadeIn(500)
			jQuery(previousPost).fadeIn(400);
		});
	});

	jQuery('.post-slider .next-post').click(function(){
		var activePost = jQuery('.post-slider-post.active');
		var nextPost = jQuery(activePost).next();
		var background = jQuery('.post-slider-background');
		if(nextPost.length == 0){
			nextPost = jQuery('.post-slider-container > .post-slider-post:first-of-type');
		}
		jQuery(background).fadeOut(400);
		jQuery(activePost).fadeOut(400, function(){
			jQuery(background).css('background-image', 'url(' + jQuery(nextPost).attr('data-background') + ')')
			activePost.removeClass('active');
			nextPost.addClass('active');
			jQuery('.post-slider-container').height(jQuery('.post-slider-post.active').height());
			jQuery(background).fadeIn(500)
			jQuery(nextPost).fadeIn(400);
		});
	});


	// TOP BAR - SEARCH 

	jQuery('.searchnav').click(function(event){
		event.stopPropagation();
		var parent = jQuery(this).closest('.top-bar');
		jQuery('.searchbar', parent).fadeToggle(300);
		jQuery('.searchbar .query', parent).focus();
	});


	// FITVIDS

	jQuery('.format-video .post-thumbnail, .post-contents').fitVids();


	// POST COVER OPACITY FADE
	if(ecko_theme_vars.postpage_enable_cover_fade == "1"){
		if(jQuery('body.single-post').length > 0 && jQuery('.header').length > 0 &&jQuery(window).width() > 880){
			var header = jQuery('.header');
			var range = jQuery('.header').height();
			jQuery(window).resize(function(){
				header = jQuery('.header');
				range = jQuery('.header').height();
			});
			jQuery(window).on('scroll', function(){
				var st = jQuery(this).scrollTop();
				header.each(function(){
					var offset = jQuery(this).offset().top;
					var height = jQuery(this).outerHeight();
					offset = offset + height / 1;
					jQuery('.header .background').css({ 'opacity': 0.35 + (st - offset + range) / (range / 2) });
					jQuery('.header .post-title').css({ 'opacity': 1.0 - (st - offset + range) / (range / 4) });
				});
			});
		}
	}


	// WIDGET - SUBCRIBE 

	function configureSubscribeForm(){
		jQuery('.sidebar #mce-EMAIL').attr('placeholder', 'Email Address...');
		jQuery('.sidebar #mc-embedded-subscribe').attr('value', 'Go');
		jQuery('.footer-widgets #mce-EMAIL').attr('placeholder', 'Email Address...');
		jQuery('.footer-widgets #mc-embedded-subscribe').attr('value', 'Go');
	}


	// SEARCH SUBMIT

	jQuery('.searchform .submit').click(function(){
		jQuery(this).parent('form').submit();
	});


	// POST FORMAT - IMAGE GALLERY

	jQuery(window).load(function(){
		jQuery("article.format-gallery").each(function(index){
			jQuery('.post-thumbnail', this).height(jQuery('.post-thumbnail .eckogallery a', this).height());
			jQuery('.post-thumbnail', this).height(jQuery('.post-thumbnail .eckogallery a', this).height());
		});
	});

	function nextImage(post, callback){
		if(jQuery(post).find('.active').length == 0){
			jQuery(post).find('.eckogallery > a:first-child').first().addClass('active');
		}
		jQuery(post).find('.active').fadeOut(400);
		var next = jQuery(post).find('.active').next();
		if(next.length == 0){
			var next = jQuery(post).find('.eckogallery > a').first();
		}
		jQuery(post).find('.active').removeClass('active');
		jQuery(next).addClass('active');
		jQuery(next).fadeIn(400);
		callback();
	}

	function previousImage(post, callback){
		if(jQuery(post).find('.active').length == 0){
			jQuery(post).find('.eckogallery > a:first-child').first().addClass('active');
		}
		jQuery(post).find('.active').fadeOut(400);
		var previous = jQuery(post).find('.active').prev();
		if(previous.length == 0){
			var previous = jQuery(post).find('.eckogallery > a').last();
		}
		jQuery(post).find('.active').removeClass('active');
		jQuery(previous).addClass('active');
		jQuery(previous).fadeIn(400);
		callback();
	}

	jQuery('.post-thumbnail').on('click', '.next', function(){
		var post = jQuery(this).closest('article');
		nextImage(post, function(){
			jQuery('.post-thumbnail', post).height(jQuery('.post-thumbnail .eckogallery .active img', post).height());
		});
	});

	jQuery('.post-thumbnail').on('click', '.previous', function(){
		var post = jQuery(this).closest('article');
		previousImage(post, function(){
			jQuery('.post-thumbnail', post).height(jQuery('.post-thumbnail .eckogallery .active img', post).height());
		});
	});


	// WIDGET - NAVIGATION

	jQuery('.widget.navigation li.menu-item-has-children').on("click", "a", function(){
		var parent = jQuery(this).parent();
		jQuery('a i', parent).toggleClass('fa-chevron-down');
		jQuery('a i', parent).toggleClass('fa-chevron-up');
		jQuery('.sub-menu', parent).slideToggle();
		return false;
	});

	jQuery('li.menu-item-has-children').on("click", "a", function(){
		if(jQuery(this).attr('href') == "#"){
			return false;
		}
	});


	// LIGHTBOX

	jQuery('.post-contents-image').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom',
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});

	jQuery('.post-contents a').each(function(){
		if(jQuery(this).attr('href').match(/\.(jpg|png|gif)/g)){
			jQuery(this).magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				fixedContentPos: true,
				mainClass: 'mfp-no-margins mfp-with-zoom',
				image: {
					verticalFit: true
				},
				gallery: {
					enabled:true
				},
				zoom: {
					enabled: true,
					duration: 300
				}
			});
		}
	})

	jQuery('.eckogallery, .gallery').each(function() {
		jQuery(this).magnificPopup({
			delegate: 'a',
			type: 'image',
			mainClass: 'mfp-no-margins mfp-with-zoom',
			gallery: {
				enabled:true
			},
			image: {
				verticalFit: true
			},
			zoom: {
				enabled: true,
				duration: 300
			}
		});
	});


	// GALLERY

	jQuery(".post-contents .eckogallery").justifiedGallery({
		rowHeight: 160,
		maxRowHeight: 220,
		margins: 3,
		border: 0,
		lastRow: 'justify',
		captions: false,
		cssAnimation: true,
		imagesAnimationDuration: 300
	});


	// POST GRID

	function resizePostGrid(){
		var gridMax = 0;
		jQuery('.post-grid .post').css('min-height', '450px');
		jQuery('.post-grid .post').each(function(){
			var height = jQuery(this).innerHeight();
			if(height > gridMax) gridMax = height;
		});
		if(gridMax > 450) jQuery('.post-grid .post').css('min-height', gridMax);
	}


	// PAGINATION

	function configurePagination(){
		if((jQuery('.sidebar').innerHeight() - 200) < jQuery('.page-main').innerHeight()){
			jQuery('.post-list .pagination').remove();
		}
	}


	// WINDOW RESIZE
	
	function resized(){
		jQuery('.format-gallery').each(function() {
			jQuery('.post-thumbnail', this).height(jQuery('.post-thumbnail .eckogallery li:first-of-type img', this).height());
			jQuery('.post-thumbnail', this).height(jQuery('.post-thumbnail .eckogallery .active img', this).height());
		});
		jQuery('.post-slider-container').height(jQuery('.post-slider-post.active').height());
		resizePostGrid();
	}

	var resizeTimer;
	jQuery(window).resize(function(){
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(resized, 100);
	});


});
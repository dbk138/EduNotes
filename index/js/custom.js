// Custom Script
// Author: PixelArtInc.
// Email: info@pixelartinc.com
// http://www.pixelartinc.com



jQuery(document).ready(function(){



	$ = (jQuery);
	
	
	
	//Focus and Blur Effect with Inputs
	var addFocusAndBlur = function($input, $val){
		
		$input.focus(function(){
			if (this.value == $val) {this.value = '';}
		});
		
		$input.blur(function(){
			if (this.value == '') {this.value = $val;}
		});
	}

	addFocusAndBlur(jQuery('.email'),'Enter Your Email Here');
	addFocusAndBlur(jQuery('.field'),'Search Here');
	
	
	
	// Close Button
	$('.close').click(function(e){
		e.preventDefault();
		$(this).parents('.project-detail').slideUp(500);
	});
	$('.item .button').click(function(e){
		e.preventDefault();
		$(this).parents('#project-container').prev('.project-detail').slideDown(500);
		});
		
		
	
	// Hover Effect
	$(".main-menu > ul > li ul li a").hover(function () {
	    $(this).stop().animate({ left: "20px" }, "slow");  },
		function () {
	    $(this).stop().animate({ left: "0" }, "fast");  
	});
	$(".main-menu > ul > li").hover(function () {
	    $(this).children('ul').stop().show() },
		function () {
	    $(this).children('ul').stop().hide() ;  
	});
	$(".project-post").hover(function () {
	    $(this).children('.caption').stop().fadeIn(500) },
		function () {
	    $(this).children('.caption').stop().fadeOut(500);  
	});
	$('.item').children('figure').children('.button').hide();
	$(".item").hover(function () {
	    $(this).children('figure').children('.button').stop().fadeIn(500) },
		function () {
	    $(this).children('figure').children('.button').stop().fadeOut(500);  
	});
				
				
	
	//Career Toogle
	$(".career-single").tabs(".career-single div.pane", {tabs: 'h4', effect: 'slide'});
	
	
	
	// Home Cycle Plugin
	$('#slider').cycle({
			fx: 'scrollLeft,scrollDown,scrollRight,scrollUp',
			pager: 	'.pager',
			timeout: 4000,
			prev:	'.slider-left',
			next:	'.slider-right',
			after: onAfter,
			pause: 1
		});	 
	 function onAfter(curr, next, opts) 
	  {	
		  var index = parseInt(opts.currSlide);	
		  $('#slider .slide:eq('+ index +') .caption').slideDown(900).delay(2500).slideUp(600);
	 }
	 
	 
	 
	 // Project Single Slider
	 $('.project-single-slider').cycle({
			fx: 'scrollHorz',
			next: '.project-single-slider-next',
			prev: '.project-single-slider-prev'
		})
		
		
	 
	 // Sidebar Cycle Plugin
	$('.sidebar-slider').cycle({
			fx: 'scrollHorz',
			next: '.sidebar-slider-right',
			prev: '.sidebar-slider-left'
		});
		
		
	
	// Testimonial Cycle Plugin
	$('.testimonial-slider > div').cycle({
			fx: 'fade'
		});
		
		
	
	//jCrousal Lite
	$("#crousal").jCarouselLite({
		btnNext: ".next",
		btnPrev: ".prev",
		auto: 2000,
		speed: 2000,
		easing:  'easeInOutBack',
		visible: 5
	});
	
	
	
	//Form Validation
	var contact_options = { 
						target: '#message-sent',
						beforeSubmit: function(){
												$('#contact-loader').fadeIn('fast');
										}, 
						success: function(){											
											$('#contact-loader').fadeOut('fast');
											$('#message-sent').fadeIn('fast');
											$('.contact-form').resetForm();
										}
		};
	$('#subscription-form').validate();
	$('.contact-form').validate({
		submitHandler: function(form) {
			$(form).ajaxSubmit(contact_options);
	   }
	});
	
	
	
	//Twitter
	$(".tweet").tweet({
          username: "envato",
          count: 4
        });
		
		
	
	// Bottom link to animate to top
	$('.go-top').click(function(){
		$('html,body').animate({scrollTop: 0}, 1500);
		return false;
	});
	
	
	
	//Fixes
	$('#home-services div article:last-child').css('margin-right', '0px');
  	$('#middle article:last-child').css('margin-right', '0px');
	$('#bottom article:last-child').css('margin', '0px');
	$('#sidebar ul > li:last-child').css('border', '0px');
	
	
	
  //PrettyPhoto
  $("a[rel^='prettyPhoto']").prettyPhoto({
		deeplinking : false,
		counter_separator_label : ' of ',
		gallery_markup : '',
		social_tools : '',
		slideshow : false,
		opacity : 0.60
	});
	
	
	
	// Accordian
	$(".accordion").tabs(".accordion div.pane", {tabs: 'h6', effect: 'slide'});
	
	
	
	// Toggle
	$('.toggle .pane').not('.current').hide();	
	$('.toggle h6').click(function(e){
		e.preventDefault();
		$(this).next('.pane').slideToggle(500);	
	});
	
	
	
	// Tabs
	$(".tabs").tabs(".panes > .tab-pane");
	
	
	
	//Portfolio Toggle view
	$('.list-btn').click(function(){
			$('#content').children('div').removeClass('grid');
			$(this).parent('h2').parent('#content').children('div').addClass('list');
		});
	$('.grid-btn').click(function(){
			$('#content').children('div').removeClass('list');
			$('#content').children('div').addClass('grid');
		});
	
	
		
	//Slider Thumbneil
	$('#slider_thumbnail').adGallery({
		loader_image : 'images/loader.gif',
		width : false,
		height : false,
		description_wrapper : false,
		display_next_and_prev : false,
		slideshow : {
			enable : false
		},
		effect : 'fade',
		enable_keyboard_move : false
	});
	
	
		
	//Isotope
	$(function(){
      
      var $container = $('#project-container');

      $container.isotope({
        itemSelector : '.item'
      });
      
      
      var $optionSets = $('.option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // otherwise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });
			   });


});
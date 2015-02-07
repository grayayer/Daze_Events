/**
 * Functionality specific to Events.
 **/
(function($) {	
    $(document).ready(function(){
	    // fit videos
	    $(".video-wrapper").fitVids();
	    
	    // login popup
    	if($('#gk-popup-login').length > 0) {
    		var popup_overlay = $('#gk-popup-overlay');
    		popup_overlay.css({'display': 'block', 'opacity': '0'}).fadeOut();
    
    		var opened_popup = null;
    		var popup_login = null;
    
    		if($('#gk-popup-login').length > 0 && $('.gk-login').length > 0) {
    			popup_login = $('#gk-popup-login');
    			$('.gk-login').click(function(e) {
    				e.preventDefault();
    				e.stopPropagation();
    				popup_overlay.css('opacity', 0.01);
    				popup_login.css('opacity', 0.01);
    				popup_login.css('display', 'block');
    				popup_overlay.css('height', $('body').height());
    				popup_overlay.fadeTo('slow', 0.45 );
    
    				setTimeout(function() {
    					popup_login.animate({'opacity': 1}, 500);
    					opened_popup = 'login';
    				}, 50);
    			});
    		}
    
    		popup_overlay.click(function() {
    			if(opened_popup === 'login')	{
    				popup_overlay.fadeOut();
    				popup_login.animate({'opacity' : 0}, 500);
    				setTimeout(function() {
    					popup_login.css('display', 'none');
    				}, 450);
    			}
    		});		
    	}
	    
	    // Agenda tabs
    	$(document).find('.gk-agenda').each(function(i, el) {
    		el = $(el);
    		var tabs = el.find('.gk-agenda-tab');
    		var items = el.find('.gk-agenda-nav li');
    		var tabs_wrapper = $(el.find('.gk-agenda-tabs')[0]);
    		var config = [];
    		config.current_tab = 0;
    		config.previous_tab = null;
    		//
    		tabs_wrapper.css('height', 'auto');
    		// add events to tabs
    		items.each(function(i, item){
    			item = $(item);
    			item.bind('click', function(){
    				gkAgendaTabsAnimation(i-1, tabs_wrapper, tabs, items, config);
    			});
    		});
    	});
	    
	    var gkAgendaTabsAnimation = function(i, tabs_wrapper, tabs, items, config) {
	    	if(i != config.current_tab) {
	    		config.previous_tab = config.current_tab;
	    		config.current_tab = i;
	    		
	    		tabs_wrapper.css('min-height', tabs_wrapper.outerHeight() + 'px');
	    		$(tabs).removeClass('gk-active');
	    		$(tabs[i]).removeClass('gk-hide').removeClass('gk-hidden').addClass('gk-active');
	    		$(tabs[config.previous_tab]).removeClass('gk-active').addClass('gk-hidden');
	    		$(items).removeClass('active');
	    		$(items[i+1]).addClass('active');
	    
	    		var prev = config.previous_tab;
	    
	    		setTimeout(function() {
	    			if($(tabs[prev]).hasClass('gk-hidden') && !$(tabs[prev]).hasClass('gk-active')) {
	    				$(tabs[prev]).removeClass('gk-hidden');
	    				$(tabs[prev]).addClass('gk-hide');
	    			}
	    		}, 350);
	    
	    		//
    			tabs_wrapper.css('min-height', jQuery(tabs[i]).outerHeight() + "px");
    
    			setTimeout(function() {
    				tabs_wrapper.css('height', 'auto');
    			}, 350);
	    	}
	    };
	    
	    // FAQ
    	$('.gk-faq').each(function(i, faq) {
    		var dt_list = $(faq).find('dt');
    		dt_list.each(function(i, dt) {
    			$(dt).click(function() {
    				dt_list.each(function(j, dt_element) {
    					if(i != j) {
    						$(dt_element).removeClass('active');
    					}
    				});
    				$(dt).toggleClass('active');
    			});
    		});
    	});
    	
	    var menu_ID = false;

        if (jQuery('#menu-main-menu').length) {
            menu_ID = '#menu-main-menu';
        }

        if (menu_ID) {
            // fix for the iOS devices		
            jQuery(menu_ID + ' li').each(function (i, el) {

                if (jQuery(el).children('.sub-menu').length > 0) {
                    jQuery(el).addClass('haschild');
                }
            });
            // main element for the iOS fix - adding the onmouseover attribute
            // and binding with the data-dblclick property to emulate dblclick event on
            // the mobile devices
            jQuery(menu_ID + ' li a').each(function (i, el) {
                el = jQuery(el);

                el.attr('onmouseover', '');

                if (el.parent().hasClass('haschild') && jQuery(document.body).attr('data-tablet') !== null) {
                    el.click(function (e) {
                        if (el.attr("data-dblclick") === undefined) {
                            e.stop();
                            el.attr("data-dblclick", new Date().getTime());
                        } else {
                            var now = new Date().getTime();
                            if (now - el.attr("data-dblclick") < 500) {
                                window.location = el.attr('href');
                            } else {
                                e.stop();
                                el.attr("data-dblclick", new Date().getTime());
                            }
                        }
                    });
                }
            });
            // main menu element handler
            var base = jQuery(menu_ID);
            // if the main menu exists
            if (base.length > 0) {
                base.find('li.haschild').each(function (i, el) {
                    el = jQuery(el);

                    if (el.children('.sub-menu').length > 0) {
                        var content = jQuery(el.children('.sub-menu').first());
                        var prevh = content.outerHeight();
                        var prevw = content.outerWidth();
						var duration = 250;

                        var fxStart = {
                            'height': 0,
                            'width': prevw,
                            'opacity': 0
                        };
                        var fxEnd = {
                            'height': prevh,
                            'width': prevw,
                            'opacity': 1
                        };

                        content.css(fxStart);
                        content.css({
                            'left': 'auto',
                            'overflow': 'hidden'
                        });

                        el.mouseenter(function () {
                            content.css('display', 'block');

                            if (content.attr('data-base-margin') !== null) {
                                content.css({
                                    'margin-left': content.attr('data-base-margin') + "px"
                                });
                            }

                            var pos = content.offset();
                            var winWidth = jQuery(window).outerWidth();
                            var winScroll = jQuery(window).scrollLeft();

                            if (pos.left + prevw > (winWidth + winScroll)) {
                                var diff = (winWidth + winScroll) - (pos.left + prevw) - 5;
                                var base = parseInt(content.css('margin-left'), 10);
                                var margin = base + diff;

                                if (base > 0) {
                                    margin = -prevw + 10;
                                }
                                content.css('margin-left', margin + "px");

                                if (content.attr('data-base-margin') === null) {
                                    content.attr('data-base-margin', base);
                                }
                            }
                            //
                            content.stop(false, false, false);

                            content.animate(
                                fxEnd,
                                duration,
                                function () {
                                    if (content.outerHeight() === 0) {
                                        content.css('overflow', 'hidden');
                                    } else if (
                                        content.outerHeight() - prevh < 30 &&
                                        content.outerHeight() - prevh >= 0
                                    ) {
                                        content.css('overflow', 'visible');
                                    }
                                }
                            );
                        });
                        el.mouseleave(function () {
                            content.css({
                                'overflow': 'hidden'
                            });
                            //
                            content.animate(
                                fxStart,
                                duration,
                                function () {
                                    if (content.outerHeight() === 0) {
                                        content.css('overflow', 'hidden');
                                    } else if (
                                        content.outerHeight() - prevh < 30 &&
                                        content.outerHeight() - prevh >= 0
                                    ) {
                                        content.css('overflow', 'visible');
                                    }

                                    content.css('display', 'none');
                                }
                            );
                        });
                    }
                });

                base.find('li.haschild').each(function (i, el) {
                    el = jQuery(el);
                    var content = jQuery(el.children('.sub-menu').first());
                    content.css({
                        'display': 'none'
                    });
                });
            }
        }
	    
		// Aside menu
		var toggler = jQuery('#aside-menu-toggler');

		toggler.click(function() {
			gkOpenAsideMenu();
		});

		jQuery('#close-menu').click(function() {
			jQuery('#close-menu').toggleClass('menu-open');
			jQuery('#gk-bg').toggleClass('menu-open');
			jQuery('#aside-menu').toggleClass('menu-open');
		});

		// detect android browser
		var ua = navigator.userAgent.toLowerCase();
		var isAndroid = ua.indexOf("android") > -1 && !window.chrome;
	
		if(isAndroid) {
			jQuery(document.body).addClass('android-stock-browser');
		}
		// Android stock browser fix for the aside menu
		if(jQuery(document.body).hasClass('android-stock-browser') && jQuery('#aside-menu').length) {
			jQuery('#aside-menu-toggler').click(function() {
				window.scrollTo(0, 0);
			});
			// menu dimensions
			var asideMenu = jQuery('#aside-menu');
			var menuHeight = jQuery('#aside-menu').outerHeight();
			//
			window.scroll(function() {
				if(asideMenu.hasClass('menu-open')) {
		    		// get the necessary values and positions
		    		var currentPosition = jQuery(window).scrollTop();
		    		var windowHeight = jQuery(window).height();
	
					// compare the values
		    		if(currentPosition > menuHeight - windowHeight) {
		    			jQuery('#close-menu').trigger('click');
		    		}
				}
			});
		}
	});
	
	function gkOpenAsideMenu() {
		jQuery('#gk-bg').toggleClass('menu-open');
		jQuery('#aside-menu').toggleClass('menu-open');
	
		if(!jQuery('#close-menu').hasClass('menu-open')) {
			setTimeout(function() {
				jQuery('#close-menu').toggleClass('menu-open');
			}, 300);
		} else {
			jQuery('#close-menu').removeClass('menu-open');
		}
	}
	
	if($('#gk-header-nav') && !$('#gk-header-nav').hasClass('active')) {		
		$(window).scroll(function() {
			var currentPosition = $(window).scrollTop();

			if(
				currentPosition >= $('#gk-header').outerHeight() && 
				!$('#gk-header-nav').hasClass('active')
			) {
				$('#gk-header-nav').addClass('active');
			} else if(
				currentPosition < $('#gk-header').outerHeight() && 
				$('#gk-header-nav').hasClass('active')
			) {
				$('#gk-header-nav').removeClass('active');
			}
		});
	}
})(jQuery);
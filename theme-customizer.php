<?php

global $wp_customize;

get_template_part('theme-customizer-extensions/textarea');
get_template_part('theme-customizer-extensions/color-utils');

if (isset($wp_customize)) {
	
	/* Add additional options to Theme Customizer */
	function events_init_customizer( $wp_customize ) {
// Used fonts
$body_font = '//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700';
$header_font = '//fonts.googleapis.com/css?family=Nunito:400,700,300';
$other_font = '';
// Selectors for the used fonts
$body_font_selectors = 'body,
input,
button,
select,
textarea,
.btn-video';
$header_font_selectors = '#gk-header-mod p,
#gk-header-mod .big-btn';
$other_font_selectors = '';


		// Add new settings sections
	    $wp_customize->add_section(
		    'events_font_options',
		    array(
		        'title'     => __('Font options', 'events'),
		        'capability' => 'edit_theme_options',
		        'priority'  => 200
	    	)
	    );
	    
	    $wp_customize->add_section(
		    'events_layout_options',
		    array(
		        'title'     => __('Layout', 'events'),
		        'capability' => 'edit_theme_options',
		        'priority'  => 300
	    	)
	    );
	    
	    $wp_customize->add_section(
		    'events_features_options',
		    array(
		        'title'     => __('Features', 'events'),
		        'capability' => 'edit_theme_options',
		        'priority'  => 400
	    	)
	    );
	    
	    // Add new settings
	    $wp_customize->add_setting( 
	    	'events_primary_color', 
	    	array( 
	    		'default' => '#00bcf2', 
	    		'capability' => 'edit_theme_options',
	    		'transport' => 'postMessage'
	    	)
	    );
	    
	    $wp_customize->add_setting( 
	    	'events_secondary_color', 
	    	array( 
	    		'default' => '#f21b23', 
	    		'capability' => 'edit_theme_options',
	    		'transport' => 'postMessage'
	    	)
	    );
	    
	    $wp_customize->add_setting( 
	    	'events_blocks_color', 
	    	array( 
	    		'default' => 'events-light-blocks', 
	    		'capability' => 'edit_theme_options'
	    	)
	    );
	    
		$wp_customize->add_setting(
			'events_body_font',
			array(
			    'default'   => 'google',
			    'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
		    'events_body_google_font',
		    array(
		        'default'   => $body_font,
		        'capability' => 'edit_theme_options'
		    )
		);
		
		$wp_customize->add_setting(
			'events_body_font_selectors',
			array(
			    'default'   => $body_font_selectors,
			    'capability' => 'edit_theme_options',
                'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_headers_font',
			array(
			    'default'   => 'google',
			    'capability' => 'edit_theme_options'
			)
		);

		$wp_customize->add_setting(
		    'events_headers_google_font',
		    array(
		        'default'   => $header_font,
		        'capability' => 'edit_theme_options'
		    )
		);

		$wp_customize->add_setting(
			'events_headers_font_selectors',
			array(
			    'default'   => $header_font_selectors
			)
		);

        $wp_customize->add_setting(
            'events_other_font',
            array(
                'default'   => 'google',
                'capability' => 'edit_theme_options'
                )
            );

        $wp_customize->add_setting(
            'events_other_google_font',
            array(
                'default'   => $other_font,
                'capability' => 'edit_theme_options'
            )
        );

        $wp_customize->add_setting(
            'events_other_font_selectors',
            array(
                'default'   => $other_font_selectors,
                'capability' => 'edit_theme_options',
                'capability' => 'edit_theme_options'
            )
        );
		
		$wp_customize->add_setting(
			'events_theme_width',
			array( 
				'default'   => '1240',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_tablet_width',
			array( 
				'default'   => '1040',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_small_tablet_width',
			array( 
				'default'   => '840',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_mobile_width',
			array( 
				'default'   => '640',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_sidebar_width',
			array( 
				'default'   => '26',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_sidebar_pos',
			array( 
				'default'   => 'right',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_logo',
			array(
				'default' => '',
				'capability' => 'edit_theme_options'
			)
		);

		$wp_customize->add_setting(
            'events_word_break',
            array(
                'default'   => '0',
                'capability' => 'edit_theme_options'
            )
        );
		
		$wp_customize->add_setting(
			'events_scroll_reveal',
			array( 
				'default'   => '1',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_related_posts',
			array( 
				'default'   => '1',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_post_social_icons',
			array( 
				'default'   => '1',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_page_social_icons',
			array( 
				'default'   => '',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_speaker_page_social_icons',
			array( 
				'default'   => '',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_sponsor_page_social_icons',
			array( 
				'default'   => '',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_event_page_social_icons',
			array( 
				'default'   => '1',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_date_format',
			array( 
				'default'   => 'default',
				'capability' => 'edit_theme_options' 
			)
		);
		
		$wp_customize->add_setting(
			'events_copyright_text',
			array( 
				'default'   => '&copy; 2014 GavickPro. All rights reserved.',
				'capability' => 'edit_theme_options' 
			)
		);
		
		// Add control for the settings
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 
				'events_primary_color', 
				array( 
					'label' => __('Primary Color', 'events'), 
					'section' => 'colors', 
					'settings' => 'events_primary_color'
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize, 
				'events_secondary_color', 
				array( 
					'label' => __('Secondary Color', 'events'), 
					'section' => 'colors', 
					'settings' => 'events_secondary_color'
				)
			)
		);
		
		$wp_customize->add_control(
			'events_blocks_color',
			array(
			    'section'  => 'colors',
			    'label'    => __('Upcoming events items background color', 'events'),
			    'type'     => 'select',
			    'choices'  => array(
			    	'events-light-blocks'  => __('Lighter than background', 'events'),
			    	'events-dark-blocks'   => __('Darker than background', 'events')
			    )
			)
		);
		
		$wp_customize->add_control(
		    'events_body_font',
		    array(
		        'section'  => 'events_font_options',
		        'label'    => __('Body Font', 'events'),
		        'type'     => 'select',
		        'choices'  => array(
		        	'google'    		=> 'Google Font',
		        	'verdana'   		=> 'Verdana',
		        	'georgia'    		=> 'Georgia',
		        	'arial'      		=> 'Arial',
		        	'impact'     		=> 'Impact',
		        	'tahoma'     		=> 'Tahoma',
		            'times'      		=> 'Times New Roman',
		            'comic sans ms'     => 'Comic Sans MS',
		            'courier new'   	=> 'Courier New',
		            'helvetica'  		=> 'Helvetica'
		        ),
		        'priority' => 0
		   	 )
		);

		$wp_customize->add_control(
		    'events_body_google_font',
		    array(
		        'section'  => 'events_font_options',
		        'label'    => __('Google Font URL for the Body', 'events'),
		        'type'     => 'text',
		        'priority' => 1
	    	)
		);

		$wp_customize->add_control(
			new Events_Customize_Textarea_Control(
				$wp_customize,
				'events_body_font_selectors',
				array(
			    	'label' => __('Selectors for the body font', 'events'),
			    	'section' => 'events_font_options',
			    	'settings' => 'events_body_font_selectors',
			    	'priority' => 2
				)
			)
		);

        $wp_customize->add_control(
            'events_headers_font',
            array(
                'section'  => 'events_font_options',
                'label'    => __('Header Font', 'events'),
                'type'     => 'select',
                'choices'  => array(
                    'google'            => 'Google Font',
                    'verdana'           => 'Verdana',
                    'georgia'           => 'Georgia',
                    'arial'             => 'Arial',
                    'impact'            => 'Impact',
                    'tahoma'            => 'Tahoma',
                    'times'             => 'Times New Roman',
                    'comic sans ms'     => 'Comic Sans MS',
                    'courier new'       => 'Courier New',
                    'helvetica'         => 'Helvetica'
                ),
                'priority' => 3
             )
        );

        $wp_customize->add_control(
            'events_headers_google_font',
            array(
                'section'  => 'events_font_options',
                'label'    => __('Google Font URL for Header', 'events'),
                'type'     => 'text',
                'priority' => 4
            )
        );

        $wp_customize->add_control(
            new Events_Customize_Textarea_Control(
                $wp_customize,
                'events_headers_font_selectors',
                array(
                    'label' => __('Selectors for the header font', 'events'),
                    'section' => 'events_font_options',
                    'settings' => 'events_headers_font_selectors',
                    'priority' => 5
                )
            )
        );

        $wp_customize->add_control(
            'events_other_font',
            array(
                'section'  => 'events_font_options',
                'label'    => __('Other Elements Font', 'events'),
                'type'     => 'select',
                'choices'  => array(
                    'google'            => 'Google Font',
                    'verdana'           => 'Verdana',
                    'georgia'           => 'Georgia',
                    'arial'             => 'Arial',
                    'impact'            => 'Impact',
                    'tahoma'            => 'Tahoma',
                    'times'             => 'Times New Roman',
                    'comic sans ms'     => 'Comic Sans MS',
                    'courier new'       => 'Courier New',
                    'helvetica'         => 'Helvetica'
                ),
                'priority' => 6
             )
        );

        $wp_customize->add_control(
            'events_other_google_font',
            array(
                'section'  => 'events_font_options',
                'label'    => __('Google Font URL for the other elements', 'events'),
                'type'     => 'text',
                'priority' => 7
            )
        );

        $wp_customize->add_control(
            new Events_Customize_Textarea_Control(
                $wp_customize,
                'events_other_font_selectors',
                array(
                    'label' => __('Selectors for the other elements font', 'events'),
                    'section' => 'events_font_options',
                    'settings' => 'events_other_font_selectors',
                    'priority' => 8
                )
            )
        );
		
		$wp_customize->add_control(
		    'events_theme_width',
		    array(
		        'section'  => 'events_layout_options',
		        'label'    => __('Theme width (px)', 'events'),
		        'type'     => 'text',
		        'priority' => 0
			)
		);
		
		$wp_customize->add_control(
		    'events_tablet_width',
		    array(
		        'section'  => 'events_layout_options',
		        'label'    => __('Tablet width (px)', 'events'),
		        'type'     => 'text',
		        'priority' => 1
			)
		);
		
		$wp_customize->add_control(
		    'events_small_tablet_width',
		    array(
		        'section'  => 'events_layout_options',
		        'label'    => __('Small tablet width (px)', 'events'),
		        'type'     => 'text',
		        'priority' => 2
			)
		);
		
		$wp_customize->add_control(
		    'events_mobile_width',
		    array(
		        'section'  => 'events_layout_options',
		        'label'    => __('Mobile width (px)', 'events'),
		        'type'     => 'text',
		        'priority' => 3
			)
		);
		
		$wp_customize->add_control(
		    'events_sidebar_width',
		    array(
		        'section'  => 'events_layout_options',
		        'label'    => __('Sidebar width (%)', 'events'),
		        'type'     => 'text',
		        'priority' => 4
			)
		);
		
		$wp_customize->add_control(
		    'events_sidebar_pos',
		    array(
		        'section'  => 'events_layout_options',
		        'label'    => __('Sidebar position', 'events'),
		        'type'     => 'select',
		        'choices'  => array(
		            'left'     => __('Left', 'events'),
		            'right'    => __('Right', 'events')
		        ),
		        'priority' => 5
		    )
		);
		
		$wp_customize->add_control(
		   new WP_Customize_Image_Control(
		       $wp_customize,
		       'events_logo',
		       array(
		           'label'      => __('Upload a logo (leave blank to use the CSS logo)', 'events'),
		           'section'    => 'events_features_options',
		           'settings'   => 'events_logo',
		           'priority'   => 0
		       )
		   )
		);

		$wp_customize->add_control(
            'events_word_break',
            array(
                'section'  => 'events_features_options',
                'label'    => __('Enable word-break', 'events'),
                'type'     => 'checkbox',
                'priority' => 2
            )
        );
		
		$wp_customize->add_control(
		    'events_scroll_reveal',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Use Scroll Reveal', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 1
		    )
		);
		
		$wp_customize->add_control(
		    'events_related_posts',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Display related posts', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 2
		    )
		);
		
		$wp_customize->add_control(
		    'events_post_social_icons',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Post Social Icons', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 3
		    )
		);
		
		$wp_customize->add_control(
		    'events_page_social_icons',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Page Social Icons', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 4
		    )
		);
		
		$wp_customize->add_control(
		    'events_speaker_page_social_icons',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Speaker Page Social Icons', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 5
		    )
		);
		
		$wp_customize->add_control(
		    'events_sponsor_page_social_icons',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Sponsor Page Social Icons', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 6
		    )
		);
		
		$wp_customize->add_control(
		    'events_event_page_social_icons',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Event Page Social Icons', 'events'),
		        'type'     => 'checkbox',
		        'priority' => 7
		    )
		);
		
		$wp_customize->add_control(
		    'events_date_format',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Date format', 'events'),
		        'type'     => 'select',
		        'choices'  => array(
		            'default'     => __('Default theme format', 'events'),
		            'wordpress'     => __('WordPress Date Format', 'events')
		        ),
		        'priority' => 8
		    )
		);
		
		$wp_customize->add_control(
		    'events_copyright_text',
		    array(
		        'section'  => 'events_features_options',
		        'label'    => __('Copyright text', 'events'),
		        'type'     => 'text',
		        'priority' => 9
			)
		);
	}
	
	add_action( 'customize_register', 'events_init_customizer' );
}

function events_customizer_fonts($group, $font, $selectors) {
    // Set the font family
    $font = esc_attr(get_theme_mod('events_'.$group.'_font'));

    if (get_theme_mod('events_'.$group.'_font') == 'google') {
        // Parse the font
        $google = esc_attr(get_theme_mod('events_'.$group.'_google_font', $font));
        $fname = array();
        preg_match('@family=(.+)$@is', $google, $fname);
        $font = "'" . str_replace('+', ' ', preg_replace('@:.+@', '', preg_replace('@&.+@', '', $fname[1]))) . "'";
    }
    // Set the font selectors
    $font_selectors = esc_textarea(get_theme_mod('events_'.$group.'_font_selectors', $selectors));
    // Output the CSS code
    echo str_replace('&quot;', '"', $font_selectors) . ' { font-family: '.$font.'; }';
}

// Add CSS styles generated from GK Cusotmizer settings
function events_customizer_css() {
// Used fonts
$body_font = '//fonts.googleapis.com/css?family=Ubuntu:300,400,500,700';
$header_font = '//fonts.googleapis.com/css?family=Nunito:400,700,300';
$other_font = '';
// Selectors for the used fonts
$body_font_selectors = 'body,
input,
button,
select,
textarea,
.btn-video';
$header_font_selectors = '#gk-header-mod p,
#gk-header-mod .big-btn';
$other_font_selectors = '';

    // get colors
    $primary_color = esc_attr(get_theme_mod('events_primary_color', '#00bcf2'));
    $secondary_color = esc_attr(get_theme_mod('events_secondary_color', '#f21b23'));
    
    $theme_width = preg_replace('@[^0-9]@mi', '', esc_attr(get_theme_mod('events_theme_width', '1240')));
    $sidebar_width = preg_replace('@[^0-9]@mi', '', esc_attr(get_theme_mod('events_sidebar_width', '26')));
    $sidebar_pos = esc_attr(get_theme_mod('events_sidebar_pos', 'right'));
    
    ?>   
    <style type="text/css">
    	/* Font settings */
    	<?php events_customizer_fonts('body', $body_font, $body_font_selectors); ?>
    	
        <?php events_customizer_fonts('headers', $header_font, $header_font_selectors); ?>
        
        <?php events_customizer_fonts('other', $other_font, $other_font_selectors); ?>

        <?php if(get_theme_mod('events_word_break', '1') == '1') : ?>
        body {
            -ms-word-break: break-all;
            word-break: break-all;
            word-break: break-word;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            -ms-hyphens: auto;
            hyphens: auto;
        }
        <?php endif; ?>

    	/* Layout settings */ 
    	.site,
    	#gk-header-nav-wrap,
    	.frontpage-block-wrap,
    	#gk-header-widget .widget-area {
    		max-width: <?php echo $theme_width ?>px;
    		width: 100%;
    	}
    	<?php if(is_active_sidebar('sidebar')) : ?>
    	#content {
    		float: <?php echo ($sidebar_pos == 'right') ? 'left' : 'right' ?>;
    		width: <?php echo 100 - $sidebar_width; ?>%;
    	}
    	#sidebar {
    		float: <?php echo ($sidebar_pos == 'right') ? 'right' : 'left' ?>;
    		padding-<?php echo ($sidebar_pos == 'right') ? 'left' : 'right' ?>: 45px;
    		width: <?php echo $sidebar_width; ?>%;
    	}
    	<?php else : ?>
    	#content,
    	#sidebar {
    		width: 100%;
    	}
    	<?php endif; ?>
    	/* Header text color */
    	#gk-header-mod,
    	#gk-header-mod h1,
    	#gk-header-mod h2,
    	#gk-header-mod p.gk-desc {
    		color: <?php echo '#'.get_header_textcolor(); ?>;
    	}
    	/* Color settings */
        
        /* - primary color - */
        a,
        .inverse:active,
        .inverse:focus,
        .inverse:hover,
        .entry-title.sticky:after,
        .comment-metadata > strong.fn,
        .comment-awaiting-moderation,
        .comment-reply-title small a:hover,
        .gk-speakers figcaption a:active,
        .gk-speakers figcaption a:focus,
        .gk-speakers figcaption a:hover,
        .gk-faq dt:before,
        .gk-tweet-name a:active,
        .gk-tweet-name a:focus,
        .gk-tweet-name a:hover,
        .gk-tweet-date:before,
        .gk-tweet-date:active,
        .gk-tweet-date:focus,
        .gk-tweet-date:hover,
        .entry-content ul li:before,
        .entry-summary ul li:before {
        	color: <?php echo $primary_color; ?>;
        }
        button,
        .readon,
        input[type="submit"],
        input[type="button"],
        input[type="reset"] {
        	border: 1px solid <?php echo $primary_color; ?>;
        	border-bottom: 4px solid <?php echo Events_Color_Utils::color_change($primary_color, 0, 64, 83); ?>;
        }
        .gk-speakers > figure > a:before,
        .speakers-listing .entry-thumbnail a:before {
        	background: <?php echo Events_Color_Utils::color_rgba($primary_color, 0.9); ?>;
        }
        button,
        .readon,
        input[type="submit"],
        input[type="button"],
        input[type="reset"],
        .paging-navigation a:active,
        .paging-navigation a:focus,
        .paging-navigation a:hover,
        .frontpage-block.gk-color-bg,
        .widget.color1,
        .widget.color2,
        .gk-nsp-arts-nav ul li:hover,
        .gk-nsp-links-nav ul li:hover,
        .gk-nsp-arts-nav ul li.active,
        .gk-nsp-links-nav ul li.active,
        .gk-nsp-next:hover:after,
        .gk-nsp-prev:hover:after,
        .none .gk-tabs-wrap > ol li:hover,
        .none .gk-tabs-wrap > ol li.active,
        .none .gk-tabs-wrap > ol li.active:hover {
        	background: <?php echo $primary_color; ?>;
        }
        #gk-header-mod .btn-big {
        	border-bottom: 4px solid <?php echo $primary_color; ?>;
        }
        .none .gk-tabs-wrap > ol li:hover,
        .none .gk-tabs-wrap > ol li.active,
        .none .gk-tabs-wrap > ol li.active:hover {
        	border-bottom: 4px solid <?php echo Events_Color_Utils::color_change($primary_color, 0, 34, 34); ?>!important;
        }
        /* - secondary color - */
        .nav-menu li a:active,
        .nav-menu li a:focus,
        .nav-menu li a:hover,
        .nav-menu .sub-menu li a:active,
        .nav-menu .sub-menu li a:focus,
        .nav-menu .sub-menu li a:hover,
        .nav-menu .current-menu-item a,
        .format-gallery .entry-content .page-links a:hover,
        .format-audio .entry-content .page-links a:hover,
        .format-status .entry-content .page-links a:hover,
        .format-video .entry-content .page-links a:hover,
        .format-chat .entry-content .page-links a:hover,
        .format-quote .entry-content .page-links a:hover,
        .page-links a:hover,
        .attachment .entry-meta a,
        .attachment .entry-meta .edit-link:before,
        .attachment .full-size-link:before,
        #gk-footer a:active,
        #gk-footer a:focus,
        #gk-footer a:hover,
        .gk-nsp-header a:active,
        .gk-nsp-header a:focus,
        .gk-nsp-header a:hover,
        .entry-content blockquote:before,
        .entry-summary blockquote:before, 
        .widget.dark a:active,
        .widget.dark a:focus,
        .widget.dark a:hover {
        	color: <?php echo $secondary_color; ?>;
        }
        #gk-logo-css,
        #gk-logo-css:before,
        #gk-logo-css:after,
        #gk-logo-css-big,
        #gk-logo-css-big:before,
        #gk-logo-css-big:after,
        #gk-header-mod .btn-big:active,
        #gk-header-mod .btn-big:focus,
        #gk-header-mod .btn-big:hover,
        .format-status .entry-content .page-links a,
        .format-gallery .entry-content .page-links a,
        .format-chat .entry-content .page-links a,
        .format-quote .entry-content .page-links a,
        .page-links a,
        .hentry .mejs-controls .mejs-time-rail .mejs-time-current,
        .widget.color2 {
        	background: <?php echo $secondary_color; ?>;
        }
        #gk-header-mod .btn-big:active,
        #gk-header-mod .btn-big:focus,
        #gk-header-mod .btn-big:hover {
        	border-bottom-color: <?php echo Events_Color_Utils::color_change($secondary_color, 82, 21, 35); ?>;
        }
        .entry-content pre,
        .entry-summary pre {
        	border-left: 5px solid <?php echo $secondary_color; ?>;
        }
    </style>
    <?php   
}

add_action( 'wp_head', 'events_customizer_css' );

function events_customize_register($wp_customize) {
	if ( $wp_customize->is_preview() && ! is_admin() ) {
		add_action( 'wp_footer', 'events_customize_preview', 21);
    }
}

add_action( 'customize_register', 'events_customize_register' );

function events_customize_preview() {
    ?>
    <script>
    (function($){
    	// helper color change function
    	function color_change(color, diff_r, diff_g, diff_b) {
    		// validate the string
    		color = String(color).replace(/[^0-9a-f]/gi, '');
    		if (color.length < 6) {
    			return color;
    		}
    		// convert to decimal
    		var rgb = "#";
    		var subcolor;
    		var diff = [diff_r, diff_g, diff_b];
    		
    		for (var i = 0; i < 3; i++) {
    			subcolor = parseInt(color.substr(i*2,2), 16);
    			subcolor = (subcolor - diff[i]).toString(16);
    			rgb += ("00"+subcolor).substr(subcolor.length);
    		}
    	
    		return rgb;
    	}
    	// helper rgba converter
    	function color_rgba(color, alpha) {
    		// validate the string
			color = String(color).replace(/[^0-9a-f]/gi, '');
			if (color.length < 6) {
				return color;
			}
			// convert to decimal
			var rgb = [];
			var subcolor;
			
			for (var i = 0; i < 3; i++) {
				subcolor = parseInt(color.substr(i*2,2), 16);
				rgb[i] = subcolor;
			}
		
			return 'rgba('+rgb[0]+','+rgb[1]+','+rgb[2]+','+alpha+')';
    	}
    	// AJAX support for the color changes
    	// The CSS code can be compressed with this tool: http://refresh-sf.com/yui/
    	wp.customize('events_primary_color', function(value) {
    	    value.bind( function( to ) {
    	    	to = to ? to : '#00bcf2';
    	    	// set colors:
    	    	var new_css = 'a,.inverse:active,.inverse:focus,.inverse:hover,.entry-title.sticky:after,.comment-metadata>strong.fn,.comment-awaiting-moderation,.comment-reply-title small a:hover,.gk-speakers figcaption a:active,.gk-speakers figcaption a:focus,.gk-speakers figcaption a:hover,.gk-faq dt:before,.gk-tweet-name a:active,.gk-tweet-name a:focus,.gk-tweet-name a:hover,.gk-tweet-date:before,.gk-tweet-date:active,.gk-tweet-date:focus,.gk-tweet-date:hover,.entry-content ul li:before,.entry-summary ul li:before{color:'+to+'}button,.readon,input[type="submit"],input[type="button"],input[type="reset"]{border:1px solid '+to+';border-bottom:4px solid '+color_change(to, 0, 64, 83)+'}.gk-speakers>figure>a:before,.speakers-listing .entry-thumbnail a:before{background:'+color_rgba(to, 0.9)+'}button,.readon,input[type="submit"],input[type="button"],input[type="reset"],.paging-navigation a:active,.paging-navigation a:focus,.paging-navigation a:hover,.frontpage-block.gk-color-bg,.widget.color1,.widget.color2,.gk-nsp-arts-nav ul li:hover,.gk-nsp-links-nav ul li:hover,.gk-nsp-arts-nav ul li.active,.gk-nsp-links-nav ul li.active,.gk-nsp-next:hover:after,.gk-nsp-prev:hover:after,.none .gk-tabs-wrap>ol li:hover,.none .gk-tabs-wrap>ol li.active,.none .gk-tabs-wrap>ol li.active:hover{background:'+to+'}#gk-header-mod .btn-big{border-bottom:4px solid '+to+'}.none .gk-tabs-wrap>ol li:hover,.none .gk-tabs-wrap>ol li.active,.none .gk-tabs-wrap>ol li.active:hover{border-bottom:4px solid '+color_change(to, 0, 34, 34)+' !important}';

    	    	if($(document).find('#events-new-css-1').length) {
    	    		$(document).find('#events-new-css-1').remove();
    	    	}
    	    	
    	    	$(document).find('head').append($('<style id="events-new-css-1">' + new_css + '</style>'));
    	    });
    	});
    	
    	wp.customize('events_secondary_color', function(value) {
    	    value.bind( function( to ) {
    	    	to = to ? to : '#f21b23'
    	    	// set colors:
    	    	var new_css = '.nav-menu li a:active,.nav-menu li a:focus,.nav-menu li a:hover,.nav-menu .sub-menu li a:active,.nav-menu .sub-menu li a:focus,.nav-menu .sub-menu li a:hover,.nav-menu .current-menu-item a,.format-gallery .entry-content .page-links a:hover,.format-audio .entry-content .page-links a:hover,.format-status .entry-content .page-links a:hover,.format-video .entry-content .page-links a:hover,.format-chat .entry-content .page-links a:hover,.format-quote .entry-content .page-links a:hover,.page-links a:hover,.attachment .entry-meta a,.attachment .entry-meta .edit-link:before,.attachment .full-size-link:before,#gk-footer a:active,#gk-footer a:focus,#gk-footer a:hover,.gk-nsp-header a:active,.gk-nsp-header a:focus,.gk-nsp-header a:hover,.entry-content blockquote:before,.entry-summary blockquote:before,.widget.dark a:active,.widget.dark a:focus,.widget.dark a:hover{color:'+to+'}#gk-logo-css,#gk-logo-css:before,#gk-logo-css:after,#gk-logo-css-big,#gk-logo-css-big:before,#gk-logo-css-big:after,#gk-header-mod .btn-big:active,#gk-header-mod .btn-big:focus,#gk-header-mod .btn-big:hover,.format-status .entry-content .page-links a,.format-gallery .entry-content .page-links a,.format-chat .entry-content .page-links a,.format-quote .entry-content .page-links a,.page-links a,.hentry .mejs-controls .mejs-time-rail .mejs-time-current,.widget.color2{background:'+to+'}#gk-header-mod .btn-big:active,#gk-header-mod .btn-big:focus,#gk-header-mod .btn-big:hover{border-bottom-color:'+color_change(to, 82, 21, 35)+'}.entry-content pre,.entry-summary pre{border-left:5px solid '+to+'}';
    	    	
    	    	if($(document).find('#events-new-css-2').length) {
    	    		$(document).find('#events-new-css-2').remove();
    	    	}
    	    	
    	    	$(document).find('head').append($('<style id="events-new-css-2">' + new_css + '</style>'));
    	    });
    	});
    })(jQuery);
    </script>
    <?php
}

// EOF
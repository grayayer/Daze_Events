<?php 

/* 
 *
 * Shortcodes used in the theme
 *
 */

// [Speakers]
if(!function_exists('events_speakers')) {
	function events_speakers($atts) {
	     // get the shortcode params
	     $atts = shortcode_atts(array(
  	     	'cols' => '4',
  	     	'source' => ''
       	 ), $atts);
       	 // check the source
       	 if($atts['source'] !== '') {
		     // get the speakers page
		     $speakers = get_page_by_path($atts['source']);
		     
		     //create arguments for custom main loop
		     $args_global = array( 
		     	'post_type' => 'page',
		     	'post_parent' => $speakers->ID,
		     	'order' => 'ASC',
		     	'orderby' => 'menu_order',
		     	'posts_per_page' => 100
		     );
		     $loop_global = new WP_Query($args_global);
		     
		     $iter = 0;
		     
		     ob_start();
		     
		     ?>
		     
		     <?php if ( $loop_global->have_posts() ) : ?>
		     	<div class="gk-speakers" data-cols="<?php echo $atts['cols']; ?>">
		     	<?php while ( $loop_global->have_posts() ) : $loop_global->the_post(); ?>
		     		<?php if(get_post_thumbnail_id() !== '') : ?>
		     		<figure data-scroll-reveal="enter bottom and move 50px after <?php echo $iter++ * 0.15; ?>s">
		     			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		     				<img src="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>">
		     			</a>
		     			<figcaption>
		     				<h3>
		     					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		     						<?php 
		     							$title = explode('&#8212;', get_the_title()); 
		     							
		     							if(count($title) > 1) {
		     								echo $title[0];
		     								echo '<small>' . $title[1] . '</small>';
		     							} else {
		     								echo $title[0];
		     							}
		     						?>
		     					</a>
		     				</h3>
		     			</figcaption>
		     		</figure>
		     		<?php endif; ?>
		     	<?php endwhile; ?>
		     	</div>
		     <?php endif; ?>
		     
		     <?php
		     $output = ob_get_clean();
		     
		     return $output;
	     }
	     // if the source is blank - return the empty string
	     return '';
	}
	
	add_shortcode('Speakers', 'events_speakers');
}

// [Sponsors]
if(!function_exists('events_sponsors')) {
	function events_sponsors($atts) {
	    // get the shortcode params
	    $atts = shortcode_atts(array(
	      	'source' => ''
	    ), $atts);
     	// check the source
     	if($atts['source'] !== '') {
		     // get the sponsors page
		     $sponsors = get_page_by_path($atts['source']);
		     
		     //create arguments for custom main loop
		     $args_global = array( 
		     	'post_type' => 'page',
		     	'post_parent' => $sponsors->ID,
		     	'order' => 'ASC',
		     	'orderby' => 'menu_order',
		     	'posts_per_page' => 100
		     );
		     $loop_global = new WP_Query($args_global);
		     
		     $iter = 0;
		     
		     ob_start();
		     
		     ?>
		     
		     <?php if ( $loop_global->have_posts() ) : ?>
		     	<div class="gk-sponsors">
		     	<?php while ( $loop_global->have_posts() ) : $loop_global->the_post(); ?>
		     		<?php if(get_post_thumbnail_id() !== '') : ?>
		     		<a href="<?php the_permalink(); ?>" data-scroll-reveal="enter bottom and wait <?php echo $iter++ * 0.1; ?>s">
		     			<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>">
		     		</a>
		     		<?php endif; ?>
		     	<?php endwhile; ?>
		     	</div>
		     <?php endif; ?>
		     
		     <?php
		     $output = ob_get_clean();
		     
		     return $output;
		 }
		 // if the source is blank - return empty string
		 return '';
	}
	
	add_shortcode('Sponsors', 'events_sponsors');
}

// [Agenda]
if(!function_exists('events_agenda')) {
	function events_agenda($atts) {
		// get the shortcode params
		$atts = shortcode_atts(array(
			'text_before' => '',
			'posts_number' => 4,
			'source' => ''  	
		), $atts);
		// check the source
		if($atts['source'] !== '') {
			// get the page ID
			$agenda = get_page_by_path($atts['source']);
			// get the agenda days
			$args_days = array( 
				'post_type' => 'page',
				'post_parent' => $agenda->ID,
				'order' => 'ASC',
				'orderby' => 'menu_order',
				'posts_per_page' => 999
			);
			$loop_days = new WP_Query($args_days);
			// check if there a days
			if ($loop_days->have_posts()) {
				$output = '';
				$tabs = array();
				// tabs wrapper
				$output .= '<div class="gk-agenda">';
				$output .= '<ul class="gk-agenda-nav">';
				// check the text before param
				if($atts['text_before'] !== '') {
					$output .= '<li class="gk-agenda-text-before"><strong>' . $atts['text_before'] . '</strong></li>';
				}
				$iter_tab = 0;
				// 
				while ($loop_days->have_posts()) {
					$loop_days->the_post(); 
					$output .= '<li'.(($iter_tab == 0) ? ' class="active"' : '').'>' . get_the_title() . '</li>'; 
					
					//create arguments for custom sub-loop
					$args_events = array( 
						'post_type' => 'page',
						'post_parent' => get_the_ID(),
						'order' => 'ASC',
						'orderby' => 'menu_order',
						'posts_per_page' => $atts['posts_number']
					);
					$loop_events = new WP_Query($args_events);
					$item_output = '';
				
					if ($loop_events->have_posts()) {
						$iter_tab_item = 0;
						while ($loop_events->have_posts()) {
							$loop_events->the_post();
							
							// variable for the list items
							$event_hours = '';
							// get the post custom fields
							if ($keys = get_post_custom_keys()) {
								// generate the list
								foreach ((array) $keys as $key) {
									// trim the key name
									$key = trim($key);
									// filter the hours
									if($key === 'event-hours') {
										$event_hours = get_post_custom_values($key);
										break;
									}
								}
							}
							
							$item_output .= '<div class="gk-agenda-event-info"'.(($iter_tab == 0) ? ' data-scroll-reveal="enter top and wait '.($iter_tab_item * 0.25).'s"' : '').'><div>';
							
							if(has_post_thumbnail()) {
								$item_output .= '<a href="'.get_the_permalink().'" class="gk-agenda-image">'.get_the_post_thumbnail(get_the_ID(), 'thumbnail').'</a>';
							}
								
							$item_output .= '<div>';
							$item_output .= '<h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>';
							
							if(trim($event_hours[0]) !== '') {
								$item_output .= '<small><i class="gk-icon-clock"></i>'.$event_hours[0].'</small>';
							}
							
							$item_output .= '</div>';
							$item_output .= '</div></div>';
							$iter_tab_item++;
						}
					}
					array_push($tabs, $item_output);
					wp_reset_query();
					$iter_tab++;
				}
				wp_reset_query();
				
				$output .= '</ul>';
				$output .= '<div class="gk-agenda-tabs">';
				$iter_content = 0;
				foreach($tabs as $tab) {
					$output .= '<div class="gk-agenda-tab'.(($iter_content == 0) ? ' gk-active' : ' gk-hide').'">';
					$output .= $tab;
					$output .= '</div>';
					$iter_content++;
				}
				$output .= '</div>';
				$output .= '</div>';
				// return the final HTML code
				return $output;
			}
		}
		// return blank string if the source isn't set	
		return '';
	}
	
	add_shortcode('Agenda', 'events_agenda');
}

// [Tweets]
if(!function_exists('events_tweets')) {
	function events_tweets($atts) {
		// get the shortcode params
		$atts = shortcode_atts(array(
			'cols' => 4,
			'query' => '',
			'rpp' => 4,
			'result_type' => 'recent',
			'cache_time' => 10,
			'consumer_key' => '',
			'consumer_secret' => '',
			'user_token' => '',
			'user_secret' => ''
		), $atts);
		
		extract($atts);
		
		if($query == '') {
			return __('The query parameter cannot be empty', 'events'); 
		}
		
		if($rpp < 1) {
			return __('The amount of tweets must be bigger than 0', 'events');
		}
		
		$cache = get_transient(md5('events_tweets_' . serialize($atts)));

		if($cache) {
			return $cache;
		}
		
		// authorize user based od widget configuration keys
		$GKOAuth= new GKOAuth(array(
		               	 'consumer_key' => $consumer_key,
		               	 'consumer_secret' => $consumer_secret,
		               	 'user_token' => $user_token,
		               	 'user_secret' => $user_secret,
		               	 'curl_ssl_verifypeer' => false
		               	));

		// build twitter search query                 
		$GKOAuth->request('GET', 'https://api.twitter.com/1.1/search/tweets.json',array('q' => $query, 'count' => $rpp, 'result_type' => $result_type));

		$cache_output = '<div class="gk-tweets" data-cols="'.$cols.'">' . "\n";

		if($GKOAuth->response['error'] == '') {              
            // decode the received values
            $decode = $GKOAuth->response;
            // count the received data
            $count = count($decode['statuses']);
            // parse the data
            for($i = 0; $i < $count; $i++) {
            	$text = $decode['statuses'][$i]['text'];

            	preg_match_all('/#\w*/', $text, $matches, PREG_PATTERN_ORDER);
				foreach($matches as $key => $match) {
					foreach($match as $m) {
						$m = substr($m, 1);
						$text = str_replace($m, "<a href='https://twitter.com/#!/search/".$m."'>".$m."</a>", $text);
					}
				}

				preg_match_all('/@\w*/', $text, $matches, PREG_PATTERN_ORDER);
				foreach($matches as $key => $match) {
					foreach($match as $m) {
						$m = substr($m, 1);
						$text = str_replace($m, "<a href='https://twitter.com/#!/".$m."'>".$m."</a>", $text);
					}
				}

				preg_match_all('/http:\/\/\S*/', $text, $matches, PREG_PATTERN_ORDER);
				foreach($matches as $key => $match) {
					foreach($match as $m) {
						$text = str_replace($m, "<a href='".$m."'>".$m."</a>", $text);
					}
				}

            	$date = date('c', strtotime($decode['statuses'][$i]['created_at']));
            	$user = $decode['statuses'][$i]['user']['screen_name'];
            	$userURL = 'https://twitter.com/'.$user;
            	$tweet_url = $userURL.'/status/'.$decode['statuses'][$i]['id'];
            	
            	$cache_output .= '<div class="gk-tweet" data-scroll-reveal="enter bottom and wait '.($i * 0.2).'s">' . "\n";
            	$cache_output .= '<div>' . "\n";
            	$cache_output .= '<span class="gk-tweet-name"><a href="'.$userURL.'">@'.$user.'</a></span>' . "\n";
            	$cache_output .= '<p class="gk-tweet-content">' . $text . '</p>' . "\n";
            	$cache_output .= '<a class="gk-tweet-date" href="'.$tweet_url.'"><time datetime="'.$date.'">'.date('d M Y, G:i', strtotime($date)).'</time></a>' . "\n";
            	$cache_output .= '</div>' . "\n";
            	$cache_output .= '</div>' . "\n";
            }
		} else {
			$cache_output .= $GKOAuth->response['error'];
		}

		$cache_output .= '</div>' . "\n";
		// save the cache results	
		set_transient(md5('events_tweets_' . serialize($atts)) , $cache_output, $cache_time * 60);
		return $cache_output;
	}
	
	add_shortcode('Tweets', 'events_tweets');
}

// EOF
<?php
	/*
		Template for the content meta
	*/
?>
<aside class="post-meta">
	<?php
		if ('post' == get_post_type() ) {
			$date_format = esc_html(get_the_date('D j M, Y')); 
			
			if(get_theme_mod('events_date_format', 'default') == 'wordpress') {
				$date_format = get_the_date(get_option('date_format'));
			} 
			
			// Post Formats
			$post_format = '';
			
			if(get_post_format() != '') {
				$post_format = '<span class="format gk-format-'. get_post_format(). '"></span>';
			}
			
			$date = sprintf( '<time class="entry-date" datetime="'. esc_attr(get_the_date('c')) . '">'. $date_format . $post_format .'</time>' );
		
			echo $date;
		}
	?>
	
	<?php if (!post_password_required() && (comments_open() || get_comments_number())) : ?>
	<span class="comments-link">
		<?php comments_popup_link( __( 'Leave a comment', 'events' ), __( '1 Comment', 'events' ), __( '% Comments', 'events' ) ); ?>
	</span>
	<?php endif; ?>
	
	<?php
	
		if(current_user_can('edit_posts') || current_user_can('edit_pages')) {
			echo '<div>';
			edit_post_link(__( 'Edit', 'events'), '<span class="edit-link">', '</span>');
			echo '</div>';
		}
		
	?>
</aside><!-- .post-meta -->
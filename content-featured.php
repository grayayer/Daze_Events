<?php

	/*
		Template for the entry featured image/video
	*/

	$video_code = events_video_code();

?>

<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>			
	<?php do_action('events_before_post_image'); ?>
	<div class="entry-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div>
	<?php do_action('events_after_post_image'); ?>
<?php elseif($video_code) : ?>
	<?php do_action('events_before_post_video'); ?>
	<div class="video-wrapper">
		<?php echo $video_code; ?>
	</div>
	<?php do_action('events_after_post_video'); ?>
<?php endif; ?>
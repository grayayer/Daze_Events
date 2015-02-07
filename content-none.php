<?php
/**
 * The template for displaying a "No posts found" message
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(is_single() ? 'single-page' : 'archive-page'); ?>>
    <?php get_template_part( 'content', 'header'); ?>

    <header class="entry-summary no-desc">
        <h1 class="header">
            <span>
                <?php _e( 'Nothing Found', 'events' ); ?>
            </span>
        </h1>
    </header>

    <div class="entry-content">
        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'events' ), admin_url( 'post-new.php' ) ); ?></p>
        <?php elseif ( is_search() ) : ?>
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'events' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'events' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>

        <?php get_template_part( 'content', 'footer' ); ?>
    </div><!-- .page-content -->
    
</article><!-- #post -->
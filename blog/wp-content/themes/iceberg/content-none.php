<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @since Iceberg 1.0
 */
?>

<header class="page-header inner-box-small">
    <div class="content-container">
	   <h1 class="page-title not-found-title"><?php esc_html_e( 'Nothing Found', 'iceberg' ); ?></h1>
    </div>
</header>

<div class="page-content hentry not-found">
    <div class="inner-box">
        <div class="content-container">
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p>
              <?php esc_html_e( 'Ready to publish your first post?', 'iceberg' ); ?> <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php esc_html_e( 'Get started here', 'iceberg' ); ?></a>.
            </p>

            <?php elseif ( is_search() ) : ?>
            
            <h2 class="entry-title"><?php esc_html_e( 'No Results Found', 'iceberg' ); ?></h2>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'iceberg' ); ?></p>
            <?php get_search_form(); ?>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link"><?php esc_html_e( 'Back To Homepage &rarr;', 'iceberg' ); ?></a>
            
            <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'iceberg' ); ?></p>
            <?php get_search_form(); ?>

            <?php endif; ?>
        </div>
    </div>
</div><!-- .page-content -->

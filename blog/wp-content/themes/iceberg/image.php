<?php
/**
 * The template for displaying image attachments
 *
 * @since Iceberg 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>
			
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-attachment">
            <?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>

            <?php if ( has_excerpt() ) : ?>
              <div class="entry-caption">
                <?php the_excerpt(); ?>
              </div><!-- .entry-caption -->
            <?php endif; ?>
          </div><!-- .entry-attachment -->
				
          <div class="inner-box">
            <div class="content-container">
              <header class="entry-header">
                <?php 
                  the_title( '<h1 class="entry-title attachment-title">', '</h1>' );
                  iceberg_entry_meta( '<div class="entry-meta">', '</div>' ); 
                ?>
              </header><!-- .entry-header -->

              <?php if( get_the_content() ) : ?>
              <div class="entry-content">
                <?php
                  the_content();
                  
                  wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'iceberg' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => ' %',
                    'separator'   => ', ',
                  ) );
                ?>
              </div><!-- .entry-content -->
              <?php endif; ?>

              <?php iceberg_entry_footer( '<footer class="entry-footer">', '</footer>' ); ?>
            </div>
          </div>
				</article><!-- #post-## -->
			
        <?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
        ?>

        <nav id="image-navigation" class="navigation image-navigation">
          <div class="nav-links">
            <div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'iceberg' ) ); ?></div><div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'iceberg' ) ); ?></div>
          </div><!-- .nav-links -->
        </nav><!-- .image-navigation -->

      <?php
				// End the loop.
				endwhile;
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>

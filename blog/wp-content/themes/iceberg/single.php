<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @since Iceberg 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <?php
      // Start the loop.
      while ( have_posts() ) : the_post();

        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */
        get_template_part( 'content', get_post_format() );
        
        // Author bio.
        if ( get_the_author_meta( 'description' ) && get_theme_mod( 'display_published_by', 1 ) ) :
          get_template_part( 'author-bio' );
        endif;

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

        // Previous/next post navigation.
        the_post_navigation( array(
          'next_text' => '<span class="nav-meta">' . esc_html__( 'Next post', 'iceberg' ) . '</span> ' .
                         '<span class="post-title">%title</span>',
          'prev_text' => '<span class="nav-meta">' . esc_html__( 'Previous post', 'iceberg' ) . '</span> ' .
                         '<span class="post-title">%title</span>',
        ) ); 

      // End the loop.
      endwhile;
      ?>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
<?php get_footer(); ?>

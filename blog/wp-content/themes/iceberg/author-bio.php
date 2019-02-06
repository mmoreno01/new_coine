<?php
/**
 * The template for displaying Author bios
 *
 * @since Iceberg 1.0
 */
?>

<div class="author-info inner-box">
  <div class="content-container">
    <?php 
      printf( '<h3 class="author-heading section-title">%s</h3>', sprintf( esc_html__( 'Published by %s', 'iceberg' ), get_the_author() ) );
      printf( '<div class="author-avatar">%s</div>', get_avatar( get_the_author_meta( 'user_email' ), 150 ) ); 
    ?>

    <div class="author-description">
      <p class="author-bio">
        <?php the_author_meta( 'description' ); ?>
      </p><!-- .author-bio -->

      <?php iceberg_user_contacts( '<div class="author-contact-methods">', '</div>' ); ?>

      <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
        <?php printf( esc_html__( 'View all posts by %s &rarr;', 'iceberg' ), get_the_author() ); ?>
      </a>
    </div><!-- .author-description -->
  </div><!-- .author-inner -->
</div><!-- .author-info -->

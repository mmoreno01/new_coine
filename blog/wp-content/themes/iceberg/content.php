<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive.
 *
 * @since Iceberg 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php iceberg_post_thumbnail(); ?>
  
  <div class="inner-box">
    <div class="content-container">

      <header class="entry-header">
      <?php 
        iceberg_category_list();
        
        if ( is_single() ) :
          the_title( '<h1 class="entry-title">', '</h1>' );
        else :
          the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        endif;
        
        iceberg_entry_meta( '<div class="entry-meta">', '</div>' ); 
      ?>
      </header><!-- .entry-header -->

      <?php if( is_search() ) : ?>
        <div class="entry-summary">
        <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
      <?php else : ?>
        <div class="entry-content">
        <?php
          the_content( esc_html__( 'Continue reading &rarr;', 'iceberg' ) );
          
          wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'iceberg' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => ' %',
            'separator'   => ' ',
          ) );
        ?>  
        </div><!-- .entry-content -->
      <?php endif; ?>

      <?php iceberg_entry_footer( '<footer class="entry-footer">', '</footer>' ); ?>

    </div>
  </div>
</article><!-- #post-## -->

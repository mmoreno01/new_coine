<?php
/**
 * The Sidebar containing the main widget area
 *
 * @since Iceberg 1.0
 */
?>

<div id="sidebar" class="sidebar">

  <?php 
    $primary_navigation = wp_nav_menu( array( 
      'theme_location'  => 'primary', 
      'menu_class'      => 'nav-menu', 
      'container'       => false,
      'echo'            => false
    ) ); 
  ?>

  <header id="musthead" class="site-header">
    <div class="site-identity">
    <?php iceberg_site_identity(); ?>
    </div>
    
    <?php iceberg_social_profiles(); ?>

    <?php if( $primary_navigation || is_active_sidebar( 'widget-area' ) ) : ?>
    <div class="toggles">
      <a href="#" id="sidebar-toggle" class="sidebar-toggle"><i class="fa fa-reorder"></i><i class="fa fa-remove"></i></a>
    </div>
    <?php endif; ?>
  </header>

  <?php if( $primary_navigation || is_active_sidebar( 'widget-area' ) ) : ?>
    <div class="toggle-wrap">
      <?php 
        if( $primary_navigation )
         printf( '<nav id="primary-navigation" class="primary-navigation">%s</nav>', $primary_navigation );
      ?>
  
      <?php if( is_active_sidebar( 'widget-area' ) ) : ?>
      <div id="widget-area" class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'widget-area' ); ?>
      </div>
      <?php endif; ?>

      <footer id="colophon" class="site-footer">
      <?php iceberg_site_copyright( '<div class="site-info">', '</div>' ); ?>
      </footer>

    </div><!-- .toggle-wrap -->
  <?php endif; ?>

</div>
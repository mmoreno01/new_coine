<?php
/**
 * Custom template tags for Iceberg
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @since Iceberg 1.0
 */

if ( ! function_exists( '_wp_render_title_tag' ) ) :
  /**
   * Add wp_title on head if theme not supported "title-tag" feature.
   *
   * @since Iceberg 1.0
   */
  function iceberg_render_title() {
  ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
  <?php
  }

  add_action( 'wp_head', 'iceberg_render_title' );
endif;

if ( ! function_exists( 'iceberg_site_identity' ) ) :
  /**
   * Prints HTML with blog title and description.
   *
   * @since Iceberg 1.0
   */
  function iceberg_site_identity() {
    if( get_header_image() ) {
      printf( '<div class="header-image %s"><a href="%s" rel="home"><img src="%s" height="%d" width="%d" alt="%s" /></a></div>',
        get_theme_mod( 'header_image_rounded' ) ? 'rounded' : '',
        esc_url( home_url( '/' ) ),
        esc_url( get_header_image() ),
        absint( get_custom_header()->height ),
        absint( get_custom_header()->width ),
        esc_attr( get_bloginfo( 'title' ) )
      );
    }
    
    if( get_theme_mod( 'display_site_title', 1 ) ) {
      printf( '<%1$s class="site-title"><a href="%2$s" rel="home">%3$s</a></%1$s>', 
        is_front_page() && is_home() ? 'h1' : 'p', 
        esc_url( home_url( '/' ) ), 
        esc_html( get_bloginfo( 'name' ) ) 
      );
    }

    iceberg_tagline( '<div class="tagline">', '</div>' );
  }
endif;

if ( ! function_exists( 'iceberg_tagline' ) ) :
  /**
   * Prints HTML with custom header text.
   *
   * @since Iceberg 1.0
   */
  function iceberg_tagline( $before = '', $after = '' ) {
    $header_text = get_transient( 'iceberg_tagline' );
    
    if( $header_text === false || is_customize_preview() ) {
      $header_text = get_theme_mod( 'tagline' );
      
      if( $header_text ) {
        $header_text = wp_kses( $header_text, array(
            'a' => array(
              'href' => array(),
              'title' => array(),
              'target' => array()
            ),
            'p'      => array(),
            'b'      => array(),
            'strong' => array(),
            'em'     => array(),
            'i'      => array(),
            'br'     => array(),
            'span'   => array(),
            'img' => array(
              'src' => array(),
              'alt' => array(),
              'title' => array()
            )
          )
        );
      }
      set_transient( 'iceberg_tagline', $header_text );
    }
    
    if( $header_text || is_customize_preview() )
      printf( '%s%s%s', $before, $header_text, $after );
  }
endif;

if ( ! function_exists( 'iceberg_site_copyright' ) ) :
  /**
   * Prints HTML with custom or default copyright text.
   *
   * @since Iceberg 1.0
   */
  function iceberg_site_copyright( $before = '', $after = '' ) {
    $default_copyright = sprintf( '&copy; %1$d <a href="%2$s">%3$s</a>', date('Y'), esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name' ) ) );
    
    $copyright = get_transient( 'iceberg_copyright' );
    
    if( $copyright === false || is_customize_preview() ) {
      $copyright = get_theme_mod( 'copyright' );
      
      if( $copyright ) {
        $copyright = wp_kses( $copyright, array(
            'a' => array(
              'href' => array(),
              'title' => array(),
              'target' => array()
            ),
            'p'      => array(),
            'b'      => array(),
            'strong' => array(),
            'em'     => array(),
            'i'      => array(),
            'br'     => array(),
            'span'   => array(),
            'img' => array(
              'src' => array(),
              'alt' => array(),
              'title' => array()
            )
          )
        );
      }
      set_transient( 'iceberg_copyright', $copyright );
    }
    
    printf( '%s%s%s', $before, $copyright ? $copyright : $default_copyright, $after );
  }
endif;

if ( ! function_exists( 'iceberg_social_profiles' ) ) :
  /**
   * Prints HTML with social profiles buttons.
   *
   * @since Iceberg 1.0
   */
  function iceberg_social_profiles( $before = '', $after = '' ) {
    $social_profiles = get_theme_mod( 'social' );
    
    if( empty( $social_profiles ) )
      return;
    
    $output = '';
    
    if( is_array( $social_profiles ) ) {
      foreach( $social_profiles as $network_id => $url ) {
        if( $url )
          $output .= sprintf( 
            '<li><a href="%1$s" class="%2$s"><i class="fa fa-%2$s"></i></a></li>', 
            ( $network_id == 'email' ) ? 'mailto:' . esc_attr( $url ) : esc_url( $url ), 
            esc_attr( $network_id ) 
         );
      }
    }
    
    if( $output )
      printf( '%s<ul class="social-profiles">%s</ul>%s', $before, $output, $after );
  }
endif;

if ( ! function_exists( 'iceberg_post_thumbnail' ) ) :
  /**
   * Display an optional post thumbnail.
   *
   * Wraps the post thumbnail in an anchor element on index views, or a div
   * element when on single views.
   *
   * @since Iceberg 1.0
   */
  function iceberg_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail()  ) {
      return;
    }

    if ( is_singular() ) :
    ?>

    <div class="post-thumbnail">
      <?php the_post_thumbnail( 'iceberg-post-thumbnail-crop' ); ?>
    </div><!-- .post-thumbnail -->

    <?php else : ?>

    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
      <?php the_post_thumbnail( 'iceberg-post-thumbnail-crop', array( 'alt' => get_the_title() ) ); ?>
    </a>

    <?php endif; // End is_singular()
  }
endif;

if ( ! function_exists( 'iceberg_entry_meta' ) ) :
  /**
   * Prints HTML with meta information for the categories, post date.
   *
   * @since Iceberg 1.0
   */
  function iceberg_entry_meta( $before = '', $after = '' ) {
    $output = '';
    $post_type = get_post_type();

    if ( in_array( $post_type, array( 'post', 'attachment' ) ) && get_theme_mod( 'display_date', 1 ) ) {
      $time_string = sprintf( '<span class="entry-date published" datetime="%1$s">%2$s</span>', esc_attr( get_the_date( 'c' ) ), get_the_date() );
      $time_string = sprintf( esc_html_x( 'Posted on %s', 'Post date', 'iceberg' ), $time_string );

      $output .= sprintf( '<span class="posted-on post-meta">%s</span>', $time_string );
    }

    if ( 'post' == $post_type && ( is_multi_author() || get_theme_mod( 'display_author', 1 ) ) ) {
      $author_string = sprintf( '<a class="url fn" href="%s">%s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );
      $author_string = sprintf( esc_html_x( 'by %s', 'Post author', 'iceberg' ), $author_string );
    
      $output .= sprintf( '<span class="byline author vcard post-meta">%s</span>', $author_string );
    }
    
    if( $output )
      printf( '%s%s%s', $before, $output, $after );
  }
endif;

if ( ! function_exists( 'iceberg_category_list' ) ) :
  /**
   * Prints HTML with post categories list.
   *
   * @since Iceberg 1.2
   */
  function iceberg_category_list() {
    $post_type = get_post_type();
    
    if ( 'post' == $post_type && get_theme_mod( 'display_categories', 1 ) ) {
      $categories = get_the_category();
      $output = '';

      if( is_sticky() && is_home() && ! is_paged() ) {
        $output .= sprintf( '<span class="sticky-badge"><i class="fa fa-star"></i> %s</span>', get_theme_mod( 'sticky_post_title' ) ? esc_html( get_theme_mod( 'sticky_post_title' ) ) : esc_html__( 'Featured', 'iceberg' ) );
      }
    
      if( $categories ) {
        foreach( $categories as $category ) {
          $output .= sprintf( '<a href="%s" class="category-%d">%s</a>', esc_url( get_category_link( $category->term_id ) ), $category->term_id, esc_attr( $category->cat_name ) );
        }
      }
    
      if( $output ) {
        printf( '<div class="cat-links">%s</div>', $output );
      }  
    }
  }
endif;

if ( ! function_exists( 'iceberg_entry_footer' ) ) :
  /**
   * Prints HTML with post tags and share buttons in post footer
   *
   * @since Iceberg 1.0
   */
  function iceberg_entry_footer( $before = '', $after = '' ) {
    $output = '';
    $post = get_post();
    
    if ( is_singular( 'post' ) && get_theme_mod( 'display_tags_list', 1 ) ) {
      $tags_list = get_the_tag_list( '<div class="tags-list">',' ','</div>' );
    
      if ( $tags_list  ) 
        $output .= $tags_list;
    }

    if( is_singular() && get_theme_mod( 'display_share_buttons', 1 ) ) {
      $output .= sprintf( '<div class="entry-share">%s</div>', iceberg_get_share_buttons() );
    }
    
    if( $output )
      printf( '%s%s%s', $before, $output, $after );
  }
endif;

/**
 * Get HTML with post share buttons.
 *
 * @since Iceberg 1.0
 */
function iceberg_get_share_buttons() {
  $post = get_post();

  if( !$post )
    return;

  $thumbnail_src = '';
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' );
  
  if( $thumbnail )
    $thumbnail_src = urlencode( esc_url( $thumbnail['0'] ) );

  $post_permalink = urlencode( esc_url( get_permalink( $post->ID ) ) );
  $title          = urlencode( strip_tags( get_the_title() ) );
  $excerpt        = urlencode( strip_tags( get_the_excerpt() ) );
  
  $buttons = array(
    'facebook' => array(
      'text'   => esc_html__( 'Share', 'iceberg' ),
      'url'    => 'http://www.facebook.com/sharer/sharer.php?u=' . $post_permalink,
      'title'  => esc_html__( 'Share on Facebook', 'iceberg' ),
      'icon'   => '<i class="fa fa-facebook"></i>',
      'show'   => 1
     ),
    'twitter' => array(
      'text'   => esc_html__( 'Tweet It', 'iceberg' ),
      'url'    => 'https://twitter.com/intent/tweet?text=' . $title . '&amp;url=' . $post_permalink,
      'title'  => esc_html__( 'Tweet It', 'iceberg' ),
      'icon'   => '<i class="fa fa-twitter"></i>',
      'show'   => 1
     ),
    'pinterest' => array(
      'text'   => esc_html__( 'Pin It', 'iceberg' ),
      'url'    => 'https://www.pinterest.com/pin/create/button/?description=' . $title . '&amp;media=' . $thumbnail_src . '&amp;url=' . $post_permalink,
      'title'  => esc_html__( 'Pin It', 'iceberg' ),
      'icon'   => '<i class="fa fa-pinterest"></i>',
      'show'   => 1
     ),
    'tumblr' => array(
      'text'   => esc_html__( 'Share', 'iceberg' ),
      'url'    => 'http://www.tumblr.com/share/link?url=' . $post_permalink . '&amp;name=' . $title . '&amp;description=' . $excerpt,
      'title'  => esc_html__( 'Post on Tumblr', 'iceberg' ),
      'icon'   => '<i class="fa fa-tumblr"></i>',
      'show'   => 1
     ),
    'google' => array(
      'text'   => esc_html__( 'Share', 'iceberg' ),
      'url'    => 'https://plus.google.com/share?url=' . $post_permalink,
      'title'  => esc_html__( 'Share on Google Plus', 'iceberg' ),
      'icon'   => '<i class="fa fa-googleplus"></i>',
      'show'   => 0
     ),
    'linkedin' => array(
      'text'   => esc_html__( 'Share', 'iceberg' ),
      'url'    => 'https://www.linkedin.com/shareArticle?url=' . $post_permalink . '&amp;title=' . $title . '&amp;summary=' . $excerpt,
      'title'  => esc_html__( 'Share on LinkedIn', 'iceberg' ),
      'icon'   => '<i class="fa fa-linkedin"></i>',
      'show'   => 1
     )
  );
  
  $output = '';

  foreach( $buttons as $button_id => $button_data ) {
    if( get_theme_mod( 'display_' . $button_id . '_share_button', $button_data['show'] ) ) {
      $output .= sprintf( '<a href="%s" title="%s" class="share-button %s-share-button" rel="nofollow">%s</a>', esc_url( $button_data['url'] ), esc_attr( $button_data['title'] ), esc_attr( $button_id ), $button_data['icon'] );
    }
  } 
  
  if( $output )
    return sprintf( '<div class="share-buttons">%s</div>', $output );
}

if ( ! function_exists( 'iceberg_share_buttons' ) ) :
  /**
   * Prints HTML with post share buttons.
   *
   * @since Iceberg 1.0
   */
  function iceberg_share_buttons( $before = '', $after = '' ) {
    printf( '%s%s%s', $before, iceberg_get_share_buttons(), $after );
  }
endif;

if ( ! function_exists( 'iceberg_related_posts' ) ) :
  /**
   * Related posts for current post.
   *
   * @since Iceberg 1.0
   */
  function iceberg_related_posts( $before = '', $after = '' ) {
    global $post;
    
    if( !$post )
      return;

    if( $post->post_type !== 'post' )
      return;
      
    $query_args = array(
      'post__not_in'        => array( $post->ID ),
      'posts_per_page'      => 3,
      'orderby'             => 'rand',
      'ignore_sticky_posts' => true
    );
    
    $related_by = get_theme_mod( 'related_by', 'none' );
    
    switch ( $related_by ) {
      case 'category' :
        $categories = get_the_category( $post->ID );
        if ( $categories ) {
          $category_ids = array();
          foreach( $categories as $category ) 
            $category_ids[] = $category->term_id;
            
          $query_args['category__in'] = $category_ids;
        }
        break;
      
      case 'tags' :
        $tags = wp_get_post_tags( $post->ID );
        if ( $tags ) {
          $tag_ids = array();
          foreach( $tags as $tag ) 
            $tag_ids[] = $tag->term_id;
            
          $query_args['tag__in'] = $tag_ids;
        }
        break;
      case 'none' :
        $query_args['orderby'] = 'rand';
        break;
    }
    
    $related_posts = new WP_Query( $query_args );
    $output = '';
    
    if( $related_posts->have_posts() ) {
      printf( '%s<div class="related-posts row">', $before );
      
      while( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
      <div <?php post_class('related-post col-sm-4'); ?>>
      
        <?php if( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink()?>" class="post-thumbnail" rel="bookmark" title="<?php the_title(); ?>">
          <?php the_post_thumbnail( 'iceberg-post-thumbnail-crop' ); ?>
        </a>
        <?php endif; ?>
        
        <header class="related-content">
          <a href="<?php the_permalink(); ?>" class="related-post-title" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          <div class="post-meta">
            <?php echo get_the_date(); ?>
          </div>
        </header>
      </div>
    <?php 
      endwhile;
      
      printf( '</div>%s', $after );
    }

    wp_reset_postdata(); 
  }
endif;

if ( ! function_exists( 'iceberg_user_contacts' ) ) :
  /**
   * Display author social profiles and contacts.
   *
   * @since Iceberg 1.4
   */
  function iceberg_user_contacts( $before = '', $after = '' ) {
    $output = '';

    $url = get_the_author_meta( 'url' );

    if( $url ) {
      $output .= sprintf( 
        '<a href="%s" title="%s" class="contact-method contact-method-url" target="_blank"><i class="fa fa-globe"></i></a>', 
        esc_url( $url ),
        esc_html__( 'Website', 'iceberg' )
      );
    }

    $contact_methods = apply_filters( 'iceberg_contact_methods', 
      array(
        'facebook'   => esc_html__( 'Facebook', 'iceberg' ),
        'twitter'    => esc_html__( 'Twitter', 'iceberg' ),
        'googleplus' => esc_html__( 'Google Plus', 'iceberg' ),
        'instagram'  => esc_html__( 'Instagram', 'iceberg' ),
        'pinterest'  => esc_html__( 'Pinterest', 'iceberg' ),
        'linkedin'   => esc_html__( 'LinkedIn', 'iceberg' ),
        'vk'         => esc_html__( 'Vkontakte', 'iceberg' ),
        'dribbble'   => esc_html__( 'Dribbble', 'iceberg' ),
        'behance'    => esc_html__( 'Behance', 'iceberg' ),
        'tumblr'     => esc_html__( 'Tumblr', 'iceberg' ),
        'medium'     => esc_html__( 'Medium', 'iceberg' ),
        'flickr'     => esc_html__( 'Flickr', 'iceberg' ),
        'github'     => esc_html__( 'Github', 'iceberg' ),
        'youtube'    => esc_html__( 'YouTube', 'iceberg' ),
        'soundcloud' => esc_html__( 'SoundCloud', 'iceberg' ),
        'secondary_email' => esc_html__( 'Email', 'iceberg' )
      ) 
    );

    if( $contact_methods ) {
      foreach( $contact_methods as $contact_method_id => $contact_method_name ) {
        $contact_value = get_the_author_meta( $contact_method_id );

        if( $contact_value ) {
          if( $contact_method_id == 'secondary_email' ) {
            $contact_value = is_email( $contact_value ) ? $contact_value : '';
          } else {
            $contact_value = esc_url( $contact_value );
          }

          if( $contact_value ) {
            $output .= sprintf( 
              '<a href="%1$s" title="%2$s" class="contact-method contact-method-%3$s" %4$s><i class="fa fa-%3$s"></i></a>', 
              ( $contact_method_id == 'secondary_email' ) ? 'mailto:' . $contact_value : $contact_value, 
              $contact_method_name, 
              $contact_method_id,
              ( $contact_method_id == 'secondary_email' ) ? '' : 'target="_blank"'
            );
          }
        }
      }
    }

    if( $output ) {
      printf( '%s%s%s', $before, $output, $after );
    }
  }
endif;
?>
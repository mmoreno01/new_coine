<?php
/**
 * Theme setup class.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */

class Iceberg_Setup {

  // Theme version
  protected $version;
  
  // Theme unique id
  protected $theme_slug;
  
  public function __construct() {
    $this->version    = '1.4';
    $this->theme_slug = 'iceberg';
  }
  
  /**
   * Setup theme. Add actions, filters, features etc.
   *
   * @since Iceberg 1.0
   */   
  public function setup() {
    global $content_width;

    /**
     * Set up the content width value based on the theme's design.
     */
    if ( ! isset( $content_width ) ) {
      $content_width = 1180;
    }
  
    /*
     * Make theme available for translation.
     *
     * Translations can be added to the /languages/ directory.
     */
    load_theme_textdomain( 'iceberg', get_template_directory() . '/languages' );
  
    // Add RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // Enable support for Post Thumbnails, and declare two sizes.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 9999, false );
    add_image_size( 'iceberg-post-thumbnail-crop', 1200, 750, true );
    
    // Register navigation menus.
    register_nav_menus( array(
      'primary' => esc_html__( 'Primary Navigation', 'iceberg' )
    ) );
    
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
    
    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array( 'video', 'gallery' ) );
    add_post_type_support( 'page', 'post-formats' );
    
    // Add document title tag to HTML <head>.
    add_theme_support( 'title-tag' );
    
    // Setup the WordPress core custom header image.  
    add_theme_support( 'custom-header', array( 
      'width'       => 200,
      'height'      => 200,
      'flex-height' => true,
      'flex-width'  => true
    ) );
    
    // Setup the WordPress core custom background feature.    
    add_theme_support( 'custom-background', array( 
      'default-color' => 'f1f1f1'
    ) );
    
    // Add public scripts and styles
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );
    add_action( 'wp_enqueue_scripts', array( $this, 'post_nav_background' ), 10 );
    
    // Widgets init
    add_action( 'widgets_init', array( $this, 'widgets_init' ) );
    
    // Modify Read More link
    add_filter( 'the_content_more_link', array( $this, 'modify_read_more_link' ) );
    
    // Modify search form
    add_filter( 'get_search_form', array( $this, 'search_form' ) );
    
    // Set new excerpt more text
    add_filter('excerpt_more', array( $this, 'custom_excerpt_more' ));
    
    // This theme uses its own gallery styles.
    add_filter( 'use_default_gallery_style', '__return_false' );
    
    // Remove customizer transients
    add_action( 'customize_save_after', array( $this, 'reset_customizer_cache' ) );
    add_action( 'edited_category',      array( $this, 'reset_customizer_cache' ) );
    add_action( 'create_category',      array( $this, 'reset_customizer_cache' ) );
    
    // Add classes to body tag.
    add_filter( 'body_class', array( $this, 'add_body_class' ) );

    add_filter( 'wp_list_categories', array( $this, 'cat_count_span' ) );
    add_filter( 'get_archives_link',  array( $this, 'archive_count_span' ) );

    // Comment form fields
    add_filter( 'comment_form_default_fields', array( $this, 'comment_form_default_fields' ), 10, 1 );

    add_filter( 'user_contactmethods', array( $this, 'modify_contact_methods' ) );

    // Modification archives title
    add_filter( 'get_the_archive_title', array( $this, 'archive_title' ), 10, 1 );
  }
  
  /**
   * Register and enqueue theme scripts.
   *
   * @since Iceberg 1.0
   */  
  public function enqueue_scripts() {
    // Enqueue scripts
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
    
    wp_register_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );
    wp_register_script( 'owl-carousel-init', get_template_directory_uri() . '/js/owl.carousel.init.js', array( 'jquery' ), '1.0', true );
    
    wp_enqueue_script( 'iceberg-wait-for-images', get_template_directory_uri() . '/js/jquery.waitforimages.min.js', array( 'jquery' ), '2.2.0', true );
    wp_enqueue_script( 'iceberg-jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.min.js', array( 'jquery' ), '1.1', true );
    wp_enqueue_script( 'iceberg-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), $this->version, true );     
  }
  
  /**
   * Register and enqueue theme styles.
   *
   * @since Iceberg 1.0
   */    
  public function enqueue_styles() {
    // Add fonts, used in the main stylesheet.
    wp_enqueue_style( 'iceberg-fonts', $this->fonts_url(), array(), $this->version );
    
    // Font Awesome icons font style
    wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' ); 
    
    // Owl Carousel
    wp_register_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4' );  
    
    // Load our main stylesheet.
    wp_enqueue_style( 'iceberg-style', get_stylesheet_uri(), array( 'font-awesome' ), $this->version );
    
    // Add customizer css.
    wp_add_inline_style( 'iceberg-style', $this->inline_style() );
  }
  
  /**
   * Register Google fonts for Iceberg.
   *
   * @since Iceberg 1.0
   *
   * @return string Google fonts URL for the theme.
   */  
  public function fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Nunito, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_attr_x( 'on', 'Nunito font: on or off', 'iceberg' ) ) {
      $fonts[] = 'Nunito:300,300italic,400,400italic';
    }

    /* translators: If there are characters in your language that are not supported by PT Serif, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== esc_attr_x( 'on', 'PT Serif font: on or off', 'iceberg' ) ) {
      $fonts[] = 'PT Serif:400,400italic,700,700italic';
    }

    /* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
    $subset = esc_attr_x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'iceberg' );

    if ( 'cyrillic' == $subset ) {
      $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ( 'greek' == $subset ) {
      $subsets .= ',greek,greek-ext';
    } elseif ( 'devanagari' == $subset ) {
      $subsets .= ',devanagari';
    } elseif ( 'vietnamese' == $subset ) {
      $subsets .= ',vietnamese';
    }

    if ( $fonts ) {
      $fonts_url = esc_url( add_query_arg( array(
        'family' => urlencode( implode( '|', $fonts ) ),
        'subset' => urlencode( $subsets ),
      ), '//fonts.googleapis.com/css' ) );
    }

    return $fonts_url;
  }
  
  /**
   * Inline style. Used in wp_add_inline_style.
   *
   * @since Iceberg 1.0
   */  
  public function inline_style() {
    if( is_customize_preview() )
      return $this->get_inline_style();
      
    $inline_style = get_transient( 'iceberg_inline_style' );
    
    if( $inline_style === false ) {
      $inline_style = $this->get_inline_style();
      set_transient( 'iceberg_inline_style', $inline_style );
    }
    
    $inline_style .= '
        .site {
          visibility:hidden;
        }
        .loaded .site {
          visibility:visible;
        }
      ';
    
    if ( is_singular() && comments_open() ) {
    $inline_style .= '
        .bypostauthor .fn:after {
          content: "' . esc_html__( 'Post author', 'iceberg' ) . '";
        }';
    }
    
    return $inline_style;
  }
  
  /**
   * Get inline style CSS.
   *
   * @since Iceberg 1.0
   *
   * @return string Css with custom styles.
   */  
  public function get_inline_style() {
    $css = '';
    
    $background_image_size = get_theme_mod( 'background_image_size' );
    
    if( in_array( $background_image_size, array( 'auto', 'cover', 'contain' ) ) ) {
      $css .= "
        body{
          background-size: {$background_image_size};
      }";
    }
    
    $header_image_max_width = absint( get_theme_mod( 'header_image_max_width' ) );
    
    if( $header_image_max_width ){
      $css .= "
        .header-image img{
          max-width: {$header_image_max_width}px;
          height: auto;
        }";
    }

    $header_image_margin_bottom = absint( get_theme_mod( 'header_image_margin_bottom' ) );
    
    if( $header_image_margin_bottom ){
      $css .= "
        .header-image img {
          margin-bottom: {$header_image_margin_bottom}px;
        }";
    }
    
    $link_color = $this->sanitize_hex_color( get_theme_mod( 'link_color' ) );
    
    if( $link_color ) {
      $css .= "
        .page-content a,
        .entry-content a,
        .post-meta a,
        .author-link,
        .logged-in-as a,
        .comment-content a,
        .comment-edit-link,
        .textwidget a,
        .widget_calendar a {
          color: {$link_color};
        }";
    }
    
    $link_color_hover = $this->sanitize_hex_color( get_theme_mod( 'link_color_hover' ) );
    
    if( $link_color_hover ) {
      $css .= "
        .page-content a:hover,
        .entry-content a:hover,
        .post-meta a:hover,
        .author-link:hover,
        .logged-in-as a:hover,
        .comment-content a:hover,
        .comment-edit-link:hover,
        .textwidget a:hover,
        .widget_calendar a:hover {
          color: {$link_color_hover};
        }";
    }
    
    $button_background_color = $this->sanitize_hex_color( get_theme_mod( 'button_background_color' ) );
    
    if( $button_background_color ) {
      $css .= "
        button,
        input[type='button'],
        input[type='reset'],
        input[type='submit'],
        .pagination .page-numbers:hover,
        .pagination .page-numbers.current {
          background-color: {$button_background_color};
        }";
    }
    
    $button_background_color_hover = $this->sanitize_hex_color( get_theme_mod( 'button_background_color_hover' ) );
    
    if( $button_background_color_hover ) {
      $css .= "
        button:hover,
        input[type='button']:hover,
        input[type='reset']:hover,
        input[type='submit']:hover {
          background-color: {$button_background_color_hover};
        }";
    }
    
    $button_text_color = $this->sanitize_hex_color( get_theme_mod( 'button_text_color' ) );
    
    if( $button_text_color ) {
      $css .= "
        button,
        input[type='button'],
        input[type='reset'],
        input[type='submit'],
        .pagination .page-numbers:hover,
        .pagination .page-numbers.current {
          color: {$button_text_color};
        }";
    }

    $category_label_color = $this->sanitize_hex_color( get_theme_mod( 'category_label_color' ) );
    
    if( $category_label_color ) {
      $css .= sprintf( '
        .cat-links a {
          background: %s;
        }',
        $category_label_color
      );
    }
    
    $categories_color = get_option( 'iceberg_categories_color' );
    
    if( is_array( $categories_color ) ) {
      foreach( $categories_color as $category_id => $category_color ) {
        if( $this->sanitize_hex_color( $category_color ) ) {
          $css .= sprintf( '
        .cat-links .category-%d { 
          background: %s 
        }
          ', 
          absint( $category_id ), 
          $category_color 
         );
        }
      }
    }

    $custom_css = get_theme_mod( 'general_css' );
    
    if( $custom_css ) {
       $css .= wp_filter_nohtml_kses( $custom_css );
    }
    
    return $css;
  }
  
  /**
   * Sanitizes a hex color.
   *
   * @since Iceberg 1.0
   */  
  public function sanitize_hex_color( $color ) {
    if ( '' === $color )
      return '';
      
    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
      return $color; 
  }
  
  /**
   * Add featured image as background image to post navigation elements.
   *
   * @since Iceberg 1.0
   *
   * @see wp_add_inline_style()
   */  
  function post_nav_background() {
    if ( ! is_single() ) {
      return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
      return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
      $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
      $css .= '
        .post-navigation .nav-previous { 
          background-image: url(' . esc_url( $prevthumb[0] ) . '); 
        }
        .post-navigation .nav-previous .post-title, 
        .post-navigation .nav-previous a:hover .post-title { 
          color: #fff; 
        }
        .post-navigation .nav-previous .nav-meta {
          color: #ddd;
        }
        .post-navigation .nav-previous:before { 
          background-color: rgba(0, 0, 0, 0.5); 
        }
        .post-navigation .nav-previous:hover:before { 
          background-color: rgba(0, 0, 0, 0.8); 
        }
      ';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
      $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
      $css .= '
        .post-navigation .nav-next { 
          background-image: url(' . esc_url( $nextthumb[0] ) . '); 
        }
        .post-navigation .nav-next .post-title, 
        .post-navigation .nav-next a:hover .post-title { 
          color: #fff; 
        }
        .post-navigation .nav-next .nav-meta {
          color: #ddd;
        }
        .post-navigation .nav-next:before { 
          background-color: rgba(0, 0, 0, 0.5); 
        }
        .post-navigation .nav-next:hover:before { 
          background-color: rgba(0, 0, 0, 0.8); 
        }
      ';
    }

    wp_add_inline_style( 'iceberg-style', $css );
  }
  
  /**
   * Reset the cache when saving the customizer.
   *
   * @since Iceberg 1.0
   */
  function reset_customizer_cache() {
    delete_transient( 'iceberg_inline_style' );
    delete_transient( 'iceberg_tagline' );
    delete_transient( 'iceberg_copyright' );
  }

  /**
   * Register widget area.
   *
   * @since Iceberg 1.0
   *
   * @link https://codex.wordpress.org/Function_Reference/register_sidebar
   */
  public function widgets_init() {
    require get_template_directory() . '/inc/widgets.php';
    register_widget( 'Iceberg_Instagram_Widget' );
    register_widget( 'Iceberg_Recent_Posts' );
    
    // Register sidebar
    register_sidebar( array(
      'name'          => esc_html__( 'Widget Area', 'iceberg' ),
      'id'            => 'widget-area',
      'description'   => esc_html__( 'Add widgets here to appear in sidebar', 'iceberg' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ) );
  }
  
  /**
   * More link modification.
   *
   * @since Iceberg 1.0
   *
   * @return string Modified more link.
   */  
  public function modify_read_more_link() {
    $more_link_text = get_theme_mod( 'more_link_title' ) ? get_theme_mod( 'more_link_title' ) : esc_html__( 'Read More', 'iceberg' );
    
    return sprintf( '<p class="entry-more"><a class="more-link" href="%s">%s %s</a></p>', 
      esc_url( get_permalink() ), 
      esc_html( $more_link_text ), 
      is_rtl() ? '<i class="fa fa-angle-left"></i>' : '<i class="fa fa-angle-right"></i>' );
  }
  
  /**
   * Search form modification.
   *
   * @since Iceberg 1.0
   *
   * @return string HTML with search form.
   */   
  public function search_form( $form ) {
  
    $form = '
      <form method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
        <div class="search-wrap">
          <label>
            <input type="search" class="search-field" placeholder="' . esc_attr_x( 'Search', 'placeholder', 'iceberg' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'title tag', 'iceberg' ) . '" />
          </label>
          <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
        </div>
			</form>';
			
    return $form;
  }
  
  /**
   * Modification default excerpt more.
   *
   * @since Iceberg 1.0
   *
   * @return string Excerpt more text.
   */   
  public function custom_excerpt_more( $more ) {
    return '...';
  }
  
  /**
   * Add classes to body tag.
   *
   * @since Iceberg 1.0
   *
   * @return array Body classes array.
   */    
  public function add_body_class( $classes ) {
    if( ! get_theme_mod( 'show_preloader_screen', 1 ) ) {
      $classes[] = 'loaded';
    }
    
    if( in_array( get_theme_mod( 'basic_layout', 'sidebar-left' ), array( 'sidebar-left', 'sidebar-right' ) ) ) {
      $classes[] = get_theme_mod( 'basic_layout', 'sidebar-left' );
    }
    
    return $classes;
  }
  
  /**
   * Remove () and add <span> tag to posts count in categories list.
   *
   * @since Iceberg 1.0
   *
   * @return string Html with links
   */      
  function cat_count_span( $links ) {
    $links = str_replace( '</a> (', '</a> <span>', $links );
    $links = str_replace( ')', '</span>', $links );
    return $links;
  }
  
  /**
   * Remove () and add <span> tag to posts count in archives list.
   *
   * @since Iceberg 1.0
   *
   * @return string Html with links
   */   
  function archive_count_span( $link ) {
    $link = str_replace( '</a>&nbsp;(', '</a> <span>', $link );
    $link = str_replace( ')', '</span>', $link );
    return $link;
  }

  /**
   * Modification of the default fields of the comment form.
   *
   * @since Iceberg 1.4
   */  
  public function comment_form_default_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required='required'" : '' );
    $html5    = 'html5';

    $fields['author'] = '
      <p class="comment-form-author">
        <input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'iceberg' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
      </p>';

    $fields['email'] = '
      <p class="comment-form-email">
        <input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Email', 'iceberg' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
      </p>';

    $fields['url'] = '
      <p class="comment-form-url">
        <input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Website', 'iceberg' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
      </p>';

    return $fields;
  }

  /**
   * Adding contact info for users.
   *
   * @since Iceberg 1.4
   */ 
  function modify_contact_methods( $profile_fields ) {
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
        $profile_fields[ $contact_method_id ] = $contact_method_name;
      }
    }

    return $profile_fields;
  }

    /**
   * Changing default archive title for portfolio post type.
   *
   * @since Iceberg 1.4
   */    
  public function archive_title( $title ) {
    if ( is_category() ) {
      return single_cat_title( '', false );
    }

    if ( is_author() ) {
      return get_the_author();
    }

    return $title;
  }
}

$iceberg_setup = new Iceberg_Setup();

add_action( 'after_setup_theme', array( $iceberg_setup, 'setup' ), 10 );

/**
 * Customizer additions.
 *
 * @since Iceberg 1.0
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom template tags for this theme.
 *
 * @since Iceberg 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Post formats output class.
 *
 * @since Iceberg 1.0
 */
require get_template_directory() . '/inc/post-formats.php';

/**
 * Add fields to category form.
 *
 * @since Iceberg 1.2
 */
require get_template_directory() . '/inc/category-form-fields.php';
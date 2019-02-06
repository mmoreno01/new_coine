<?php
/**
 * Iceberg Posts Formats
 *
 * Extracting post format specific content from blog post.
 *
 * @since Iceberg 1.0
 */
 
class Iceberg_Post_Formats {
  
  protected $defaults;
  protected $formats;
  
  public function __construct() {
    global $content_width;
    
    $this->defaults = array(
      'before'          => '',
      'after'           => '',
      'content_width'   => $content_width,
      'images_size'     => 'post-thumbnail',
      'fallback_cb'     => '',
      'enqueue_scripts'  => array(),
      'enqueue_styles'   => array()
    );
    
    $this->formats = array( 'gallery', 'video' );
  }

  public function setup() {
		add_action( 'iceberg_format_content', array( $this, 'format_content' ), 10, 4 );
		add_filter( 'the_content', array( $this, 'remove_format_extracted_content' ), 5 );
  }

  public function format_content( $args = array(), $remove = true, $id = 0 ) {
  
    $extracted_content = '';
    $format_output = '';
    $output = '';
    
  	$post = empty( $id ) ? get_post() : get_post( $id );
  	
    if ( empty( $post ) )
      return $output;

    $content = $post->post_content;
    
    if ( empty( $content ) )
      return $output;
    
    $format = get_post_format( $post );
    
    if ( ! in_array( $format, $this->formats ) )
      return $output;
    
    $args = wp_parse_args( $args, $this->defaults );
    
    switch ( $format ) {
      case 'gallery' : 
        $galleries = array();
        
        if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER ) ) {
          foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
              $galleries[] = $shortcode;
            }
          }
        }
        
        if( ! empty( $galleries ) ) {
          $first_gallery_shortcode      = $galleries[0][0];
          $first_gallery_shortcode_atts = shortcode_parse_atts( $galleries[0][3] );
          
          if( isset( $first_gallery_shortcode_atts['ids'] ) ) {
          
            $gallery_ids = explode( ',', $first_gallery_shortcode_atts['ids'] );
            $gallery_ids = array_map( 'absint', $gallery_ids );
            
            if( $gallery_ids ) {
              foreach( $gallery_ids as $image_id ) {
                $image_caption = wp_get_attachment_caption( $image_id );
                $image_caption_output = '';

                if( $image_caption )
                  $image_caption_output .= sprintf( '<div class="gallery-image-caption">%s</div>', esc_attr( $image_caption ) );

                $format_output .= sprintf( '
                  <div class="gallery-image">%s %s</div>', 
                  wp_get_attachment_image( $image_id, $args['images_size'] ), 
                  $image_caption_output 
                );
              }
            }
          }
          
          if( $remove )
            $extracted_content = $first_gallery_shortcode;
        }
        break;
      case 'video' :
      case 'audio' :
        $tmp_content_width = $GLOBALS['content_width'];
        $GLOBALS['content_width'] = absint( $args['content_width'] ) ? $args['content_width'] : $tmp_content_width;
        
        $trimmed = trim( $content );
        
        if ( ( 0 === stripos( $trimmed, 'http' ) ) || ( 0 === stripos( $trimmed, 'https' ) ) ) {
          $lines = explode( "\n", $trimmed );
          $line = trim( array_shift( $lines ) );
          
          $embed_code = wp_oembed_get( esc_url_raw( $line ) );
          if( $embed_code ) {
            $format_output .= $embed_code;
            
            if( $remove )
              $extracted_content = $line;
          }
        } else {
          $medias = array();
          
          if ( preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER ) ) {
            foreach ( $matches as $shortcode ) {
              if ( $format === $shortcode[2] ) {
                $medias[] = $shortcode;
              }
            }
          }
          
          if( !empty( $medias ) ) {
            $first_media_shortcode = $medias[0][0];
            $format_output .= do_shortcode( $first_media_shortcode );
            
            if( $remove )
              $extracted_content = $first_media_shortcode;
          }
        }
        
        $GLOBALS['content_width'] = $tmp_content_width;

        break;
    }

    if( ! empty( $extracted_content ) )
      $post->format_extracted_content = $extracted_content;
    
    if( ! $format_output && $args['fallback_cb'] && is_callable( $args['fallback_cb'] ) )
      return call_user_func( $args['fallback_cb'] );
    
    if( $format_output && $args['enqueue_scripts'] && is_array( $args['enqueue_scripts'] ) ) {
      foreach( $args['enqueue_scripts'] as $handle ) {
        wp_enqueue_script( $handle );
      }
    }

    if( $format_output && $args['enqueue_styles'] && is_array( $args['enqueue_styles'] ) ) {
      foreach( $args['enqueue_styles'] as $handle ) {
        wp_enqueue_style( $handle );
      }
    }

    printf( '<div class="entry-format entry-format-%s">%s %s %s</div>', $format, $args['before'], $format_output, $args['after'] );
  }

  public function remove_format_extracted_content( $content ) {
    global $post;

    if( isset( $post->format_extracted_content ) )
      $content = str_replace( $post->format_extracted_content, '', $content );

    return $content;
  }
}

$iceberg_post_formats = new Iceberg_Post_Formats();

add_action( 'after_setup_theme', array( $iceberg_post_formats, 'setup' ), 15 );

if ( ! function_exists( 'iceberg_format_content' ) ) :
  /**
   * Prints HTML with post format specific content.
   *
   * @since Iceberg 1.0
   */
  function iceberg_format_content( $args = array(), $remove = true,  $id = 0 ) {
    do_action( 'iceberg_format_content', $args, $remove, $id );
  }
endif;
?>
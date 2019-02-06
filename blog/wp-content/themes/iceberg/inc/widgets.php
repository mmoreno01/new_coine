<?php
/**
 * Theme Widgets
 *
 * @package WordPress
 * @since Iceberg 1.0
 */

/**
 * Iceberg Instagram Widget
 *
 * Display Instagram feed in your blog.
 *
 * @since Iceberg 1.0
 */
class Iceberg_Instagram_Widget extends WP_Widget {
  /**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct( 'iceberg-instagram-feed', esc_html__( 'Iceberg &mdash; Instagram', 'iceberg' ), array(
			'classname'   => 'iceberg-instagram-feed',
			'description' => esc_html__( 'Displays your latest Instagram photos.', 'iceberg' ),
		) );
	}

	function widget( $args, $instance ) {

		extract( $args, EXTR_SKIP );

		$title    = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		$username = empty( $instance['username'] ) ? '' : $instance['username'];
		$number   = empty( $instance['number'] ) ? 9 : absint( $instance['number'] );
		$columns  = empty( $instance['cols'] ) ? 3 : absint( $instance['cols'] );

		echo wp_kses( 
      $args['before_widget'],
      array(
        'aside' => array(
          'id' => true,
          'class' => true
        )
      )
    );
		
		if ( ! empty( $title ) ) {
			printf( '%s%s%s', $args['before_title'], $title, $args['after_title'] );
		} 

		if ( $username && $number ) {

			$instagram_items = $this->parse_instagram( $username );
			$instagram_items = array_slice( $instagram_items, 0, $number );

			if ( is_wp_error( $instagram_items ) ) {
			   printf( '<div class="error-message">%s</div>', $instagram_items->get_error_message() );
      		} else {
      
	        	$intagram_output = '';
	        
		        foreach ( $instagram_items as $item ) {
		          $intagram_output .= sprintf( '<li><a href="%s" target="_blank" rel="nofollow"><img src="%s" alt="%s" title="%s" /></a></li>', esc_url( $item['link'] ), esc_url( $item['thumbnail'] ), esc_attr( $item['description'] ), esc_attr( $item['description'] ) );
		        } 
		        
		        if( $intagram_output ) {
		          printf( '<ul class="instagram-pics clearfix %1$s">%2$s</ul>', $columns ? 'cols-' . $columns : '', $intagram_output );
		        }
      		}
		}
		
		echo wp_kses( 
      $args['after_widget'],
      array(
        'aside' => array()
      )
    );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, 
      array( 
        'title'    => esc_html__( 'Instagram', 'iceberg' ), 
        'username' => '', 
        'number'   => 9, 
        'cols'     => 3
      ) 
    );
	?>
		<p>
      <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_html_e( 'Title:', 'iceberg' ); ?>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
      </label>
    </p>
    
		<p>
      <label for="<?php echo esc_attr( $this->get_field_id('username') ); ?>"><?php esc_html_e( 'Username:', 'iceberg' ); ?> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('username') ); ?>" name="<?php echo esc_attr( $this->get_field_name('username') ); ?>" type="text" value="<?php echo esc_attr( $instance['username'] ); ?>" />
      </label>
    </p>
    
		<p>
      <label for="<?php echo esc_attr( $this->get_field_id('number') ); ?>"><?php esc_html_e( 'Number of photos:', 'iceberg' ); ?> 
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('number') ); ?>" name="<?php echo esc_attr( $this->get_field_name('number') ); ?>" type="text" value="<?php echo absint( $instance['number'] ); ?>" />
      </label>
    </p>
    
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id('cols') ); ?>"><?php esc_html_e( 'Columns:', 'iceberg' ); ?> 
        <select class="widefat" id="<?php echo esc_attr( $this->get_field_id('cols') ); ?>" name="<?php echo esc_attr( $this->get_field_name('cols') ); ?>">
          <option value="2" <?php selected( absint( $instance['cols'] ), 2 ); ?>>2</option>
          <option value="3" <?php selected( absint( $instance['cols'] ), 3 ); ?>>3</option>
          <option value="4" <?php selected( absint( $instance['cols'] ), 4 ); ?>>4</option>
        </select>
      </label>
    </p>
		<?php
	}

	function update( $new_instance, $instance ) {
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['username'] = trim( strip_tags( $new_instance['username'] ) );
		$instance['number']   = $new_instance['number'] ? absint( $new_instance['number'] ) : 9;
		$instance['cols']     = $new_instance['cols'] ? absint( $new_instance['cols'] ) : 9;
		return $instance;
	}

	// based on https://gist.github.com/cosmocatalano/4544576.
  // https://github.com/scottsweb/wp-instagram-widget
  function parse_instagram( $username ) {

    $username = trim( strtolower( $username ) );

      switch ( substr( $username, 0, 1 ) ) {
        case '#':
          $url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
          $transient_prefix = 'h';
          break;

        default:
          $url              = 'https://instagram.com/' . str_replace( '@', '', $username );
          $transient_prefix = 'u';
          break;
      }

      if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {

        $remote = wp_remote_get( $url );

        if ( is_wp_error( $remote ) ) {
          return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'iceberg' ) );
        }

        if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
          return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'iceberg' ) );
        }

        $shards      = explode( 'window._sharedData = ', $remote['body'] );
        $insta_json  = explode( ';</script>', $shards[1] );
        $insta_array = json_decode( $insta_json[0], true );

        if ( ! $insta_array ) {
          return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'iceberg' ) );
        }

        if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
          $images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
        } elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
          $images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
        } else {
          return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'iceberg' ) );
        }

        if ( ! is_array( $images ) ) {
          return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'iceberg' ) );
        }

        $instagram = array();

        foreach ( $images as $image ) {
          if ( true === $image['node']['is_video'] ) {
            $type = 'video';
          } else {
            $type = 'image';
          }

          $caption = __( 'Instagram Image', 'iceberg' );
          if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
            $caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
          }

          $instagram[] = array(
            'description' => $caption,
            'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
            'time'        => $image['node']['taken_at_timestamp'],
            'comments'    => $image['node']['edge_media_to_comment']['count'],
            'likes'       => $image['node']['edge_liked_by']['count'],
            'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
            'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
            'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
            'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
            'type'        => $type,
          );
        } // End foreach().

        // do not set an empty transient - should help catch private or empty accounts.
        if ( ! empty( $instagram ) ) {
          $instagram = serialize( $instagram );
          set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'iceberg_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
        }
      }

      if ( ! empty( $instagram ) ) {
        return unserialize( $instagram );
      } else {
        return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'iceberg' ) );
      }
  	}
}

/**
 * Advanced recent posts widget class
 *
 * @since Iceberg 1.0
 */
class Iceberg_Recent_Posts extends WP_Widget {

	private $orderby;
	
	/**
	 * Constructor.
	 */
	public function __construct() {
	
		parent::__construct( 'iceberg-widget-recent-posts', esc_html__( 'Iceberg &mdash; Recent Posts', 'iceberg' ), array(
			'classname'   => 'iceberg-widget-recent-posts',
			'description' => esc_html__( 'Use this widget to list your recent posts.', 'iceberg' ),
		) );

    $this->orderby = array(
     'date'         => esc_html__( 'date', 'iceberg' ), 
     'comments_num' => esc_html__( 'number of comments', 'iceberg' ),
     'random'       => esc_html__( 'random', 'iceberg' )
    );
    
    add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}
	
		/**
	 * Enqueue admin widgets page scripts and styles.
	 *
	 * @access public
	 */	
	public function admin_enqueue_scripts( $hook ) {
    if ( 'widgets.php' != $hook )
          return;

    wp_enqueue_style( 'iceberg-widget-recent-posts-css', get_template_directory_uri() . '/css/admin/widget-recent-posts.css', array(), '1.0'); 
	}
	
	/**
	 * Output the HTML for this widget.
	 *
	 * @access public
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 */
	public function widget( $args, $instance ) {
	
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$title = ( ! empty( $instance['title'] ) ) ? strip_tags( $instance['title'] ) : esc_html__( 'Recent Posts', 'iceberg' );
	
		$query_args = array(
		  'order'          => 'DESC',
			'posts_per_page' => $number,
			'no_found_rows'  => true,
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
    $query_args['tax_query'] = array();
    
    if( ! empty( $instance['category'] ) ){
      $query_args['tax_query'][] = array(
          'taxonomy' => 'category',
          'terms'    => absint( $instance['category'] ),
          'field'    => 'term_id'
      );
		}
		
		if( ! empty( $instance['tags'] ) ) {
      $tags = explode( ',', $instance['tags'] );
      $query_args['tax_query'][] = array(
          'taxonomy' => 'post_tag',
          'terms'    => $tags,
          'field'    => 'name'
      );
		}

    if( count( $query_args['tax_query'] ) > 1 ){
      $query_args['tax_query']['relation'] = 'AND';
    }

		$orderby = isset( $instance['orderby'] ) ? $instance['orderby'] : 'date';
		
		switch ($orderby) {
      case 'comments_num':
        $query_args['orderby'] = 'comment_count';
        break;
      case 'random':
        $query_args['orderby'] = 'rand';
        break;
		}

		$recent_posts = new WP_Query( $query_args );

		if ( $recent_posts->have_posts() ) :
      $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

			echo wp_kses( 
        $args['before_widget'],
        array(
          'aside' => array(
            'id' => true,
            'class' => true
          )
        )
      );
	    
			if ( ! empty( $title ) ) {
        printf( '%s%s%s', $args['before_title'], $title, $args['after_title'] );
      } 
		?>
			
		<ul>
      <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
      
    	<li <?php if ( has_post_thumbnail() ) : ?>class="has-post-thumbnail"<?php endif; ?>>
    	
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="rp-thumbnail">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
        </div>
        <?php endif; ?>
        
        <div class="rp-content">
          <?php 
            if( ! get_the_title() ) {
              $format = get_post_format();
              $default_title = ( ! $format || $format == 'standard' ) ? esc_html__( 'Untitled Post', 'iceberg' ) : get_post_format_string( $format );
            }
          ?>
          <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : printf( $default_title ); ?></a>
          <?php 
            if( $show_date ) {
              printf( '<span class="post-date">%s</span>', get_the_date() );
            } 
          ?>
        </div>
			</li>  
      <?php endwhile; ?>
		</ul>	
			
	  <?php
			echo wp_kses( 
        $args['after_widget'],
        array(
          'aside' => array()
        )
      );

			// Reset the post globals as this query will have stomped on it.
			wp_reset_postdata();
		endif;
	}
	
	/**
	 * Deal with the settings when they are saved by the admin.
	 *
	 * Here is where any validation should happen.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $instance     Original widget instance.
	 * @return array Updated widget instance.
	 */
	function update( $new_instance, $instance ) {
    $instance['title']  = strip_tags( $new_instance['title'] );
    $instance['number'] = ( !empty( $new_instance['number'] ) ) ? absint( $new_instance['number'] ) : 5;
    
    if( array_key_exists( $new_instance['orderby'], $this->orderby ) ){
      $instance['orderby'] = $new_instance['orderby'];
    }

		$instance['category']   = isset( $new_instance['category'] ) ? absint( $new_instance['category'] ) : 0;
		$instance['tags']       = strip_tags( $new_instance['tags'] );
		$instance['show_date']  = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
    return $instance;
	}
	
	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 * @param array $instance
	 */
	function form( $instance ) {
    $instance = wp_parse_args( (array) $instance, array( 
      'title'      => '', 
      'number'     => 5, 
      'orderby'    => 'date',
      'category'   => 0,
      'tags'       => '',
      'show_date'  => true
    ) );
	?>
		
    <p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'iceberg' ); ?></label>
    <input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"></p>

    <p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'iceberg' ); ?></label>
    <input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo absint( $instance['number'] ); ?>" size="3"></p>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Order by:', 'iceberg' ); ?></label>
      <select id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'orderby' ) ); ?>">
        <?php foreach ( $this->orderby as $slug => $name ) : ?>
        <option value="<?php echo esc_attr( $slug ); ?>"<?php selected( $instance['orderby'], $slug ); ?>><?php echo esc_attr( $name ); ?></option>
        <?php endforeach; ?>
      </select>
    </p>
    
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Category:', 'iceberg' ); ?></label>
      <?php
        wp_dropdown_categories( array(
          'show_option_all' => esc_html__( 'All Categories', 'iceberg' ),
          'selected'        => absint( $instance['category'] ),
          'name'            => esc_attr( $this->get_field_name( 'category' ) ),
          'id'              => esc_attr( $this->get_field_id( 'category' ) ),
          'class'           => 'widefat'
        ) );
      ?>
    </p>
    
    <p><label for="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>"><?php esc_html_e( 'Tags (separated by commas):', 'iceberg' ); ?></label>
    <input id="<?php echo esc_attr( $this->get_field_id( 'tags' ) ); ?>" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'tags' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['tags'] ); ?>"></p>
    
    <p><input class="checkbox" type="checkbox" <?php checked( $instance['show_date'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'iceberg' ); ?></label></p>
		
  <?php
	}
}
?>
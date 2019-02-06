<?php
/**
 * Iceberg Customizer support
 *
 * @package WordPress
 * @since Iceberg 1.0
 */
 
/**
 * Implement Customizer additions and adjustments.
 *
 * @since Iceberg 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function iceberg_customize_register( $wp_customize ) {
  /*
   * Modify default Wordpress sections and controls
   */
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogdescription' )->label = esc_html__( 'Site Description', 'iceberg' );
	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Logo Image', 'iceberg' );
	$wp_customize->remove_control('display_header_text');
  $wp_customize->remove_control('header_textcolor');
  
  /*
   * Site Title & Tagline
   */   
  $wp_customize->add_setting( 'display_site_title',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize'
    )
  );
  
  $wp_customize->add_control( 'display_site_title', array(
    'type'     => 'checkbox',
    'priority' => 10,
    'label'    => esc_html__( 'Display Site Title', 'iceberg' ),
    'section'  => 'title_tagline',
  ) );
  
  $wp_customize->add_setting(
    'tagline',
    array(
      'default' => '',
      'sanitize_callback' => 'iceberg_textarea_sanitize',
      'transport' => 'postMessage'
    )
  );
 
  $wp_customize->add_control(
      'tagline',
      array(
        'type'        => 'textarea',
        'label'       => esc_html__( 'Tagline', 'iceberg' ),
        'description' => esc_html__( 'You may use these HTML tags and attributes: a[href,title,target], strong, b, em, i, p, span, br, img[src,title,alt]', 'iceberg' ),
        'section'     => 'title_tagline',
      )
  );
  
  /*
   * Header Image
   */
  $wp_customize->add_setting( 'header_image_max_width',
    array(
      'default' => 150,
      'sanitize_callback' => 'absint'
    )
  );
  
  $wp_customize->add_control( 'header_image_max_width', array(
    'type'     => 'text',
    'priority' => 20,
    'section'  => 'header_image',
    'label'    => esc_html__( 'Max width (px)', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'header_image_margin_bottom',
    array(
      'default' => 0,
      'sanitize_callback' => 'absint'
    )
  );
  
  $wp_customize->add_control( 'header_image_margin_bottom', array(
    'type'     => 'text',
    'priority' => 30,
    'section'  => 'header_image',
    'label'    => esc_html__( 'Margin bottom (px)', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'header_image_rounded',
    array(
      'default' => 0,
      'sanitize_callback' => 'iceberg_checkbox_sanitize'
    )
  );
  
  $wp_customize->add_control( 'header_image_rounded', array(
    'type'     => 'checkbox',
    'priority' => 40,
    'section'  => 'header_image',
    'label'    => esc_html__( 'Rounded (recomended for square images)', 'iceberg' ),
  ) );
  
  /*
   * Layout
   */ 
  $wp_customize->add_section( 'layout',
    array(
      'title' => esc_html__( 'Layout', 'iceberg' )
    )
  );
  
  $wp_customize->add_setting(
    'basic_layout',
    array(
      'default' => 'sidebar-left',
      'sanitize_callback' => 'iceberg_basic_layout_sanitize',
    )
  );
  
  $wp_customize->add_control(
      'basic_layout',
      array(
        'type'    => 'select',
        'label'   => esc_html__( 'Sidebar', 'iceberg' ),
        'section' => 'layout',
        'choices' => array(
          'sidebar-left'  => is_rtl() ? esc_html__( 'Right (default)', 'iceberg' ) : esc_html__( 'Left (default)', 'iceberg' ),
          'sidebar-right' => is_rtl() ? esc_html__( 'Left', 'iceberg' ) : esc_html__( 'Right', 'iceberg' )
        )
      )
  );
  
  /*
   * Colors
   */
  $wp_customize->add_setting( 'link_color',
    array(
      'default' => '#57ad68',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  
  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'link_color',
          array(
              'label' => esc_html__( 'Link color', 'iceberg' ),
              'section' => 'colors',
              'settings' => 'link_color',
          )
      )
  ); 

  $wp_customize->add_setting( 'link_color_hover',
    array(
      'default' => '#468c54',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'link_color_hover',
          array(
              'label' => esc_html__( 'Link color on hover', 'iceberg' ),
              'section' => 'colors',
              'settings' => 'link_color_hover',
          )
      )
  ); 
  
  $wp_customize->add_setting( 'button_background_color',
    array(
      'default' => '#57ad68',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  
  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'button_background_color',
          array(
              'label' => esc_html__( 'Button Color', 'iceberg' ),
              'section' => 'colors',
              'settings' => 'button_background_color',
          )
      )
  ); 
  
  $wp_customize->add_setting( 'button_background_color_hover',
    array(
      'default' => '#468c54',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );
  
  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'button_background_color_hover',
          array(
              'label' => esc_html__( 'Button Color on Hover', 'iceberg' ),
              'section' => 'colors',
              'settings' => 'button_background_color_hover',
          )
      )
  ); 
  
  $wp_customize->add_setting( 'button_text_color',
    array(
      'default' => '#ffffff',
      'sanitize_callback' => 'sanitize_hex_color',
      'transport' => 'postMessage'
    )
  );
  
  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'button_text_color',
          array(
              'label' => esc_html__( 'Button Text Color', 'iceberg' ),
              'section' => 'colors',
              'settings' => 'button_text_color',
          )
      )
  ); 

  $wp_customize->add_setting( 'category_label_color',
    array(
      'default' => '#5aa1e2',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );
  
  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          'category_label_color',
          array(
              'label' => esc_html__( 'Category color', 'iceberg' ),
              'section' => 'colors',
              'settings' => 'category_label_color',
          )
      )
  ); 
  
  /*
   * Social Profiles
   */ 
  $wp_customize->add_section( 'social',
    array(
      'title' => esc_html__( 'Social Profiles', 'iceberg' )
    )
  );

  $wp_customize->add_setting( 'social[facebook]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[facebook]', array(
    'type'     => 'url',
    'priority' => 10,
    'section'  => 'social',
    'label'    => esc_html__( 'Facebook', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[twitter]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[twitter]', array(
    'type'     => 'url',
    'priority' => 15,
    'section'  => 'social',
    'label'    => esc_html__( 'Twitter', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[googleplus]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[googleplus]', array(
    'type'     => 'url',
    'priority' => 20,
    'section'  => 'social',
    'label'    => esc_html__( 'Google Plus', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[bloglovin]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[bloglovin]', array(
    'type'     => 'url',
    'priority' => 20,
    'section'  => 'social',
    'label'    => esc_html__( 'Bloglovin', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[instagram]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[instagram]', array(
    'type'     => 'url',
    'priority' => 25,
    'section'  => 'social',
    'label'    => esc_html__( 'Instagram', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[pinterest]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[pinterest]', array(
    'type'     => 'url',
    'priority' => 30,
    'section'  => 'social',
    'label'    => esc_html__( 'Pinterest', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[linkedin]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[linkedin]', array(
    'type'     => 'url',
    'priority' => 35,
    'section'  => 'social',
    'label'    => esc_html__( 'LinkedIn', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[flickr]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[flickr]', array(
    'type'     => 'url',
    'priority' => 40,
    'section'  => 'social',
    'label'    => esc_html__( 'Flickr', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[medium]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[medium]', array(
    'type'     => 'url',
    'priority' => 45,
    'section'  => 'social',
    'label'    => esc_html__( 'Medium', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[vkontakte]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[vkontakte]', array(
    'type'     => 'url',
    'priority' => 50,
    'section'  => 'social',
    'label'    => esc_html__( 'Vkontakte', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[f500px]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[f500px]', array(
    'type'     => 'url',
    'priority' => 55,
    'section'  => 'social',
    'label'    => esc_html__( '500px', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[tumblr]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[tumblr]', array(
    'type'     => 'url',
    'priority' => 60,
    'section'  => 'social',
    'label'    => esc_html__( 'Tumblr', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[dribbble]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[dribbble]', array(
    'type'     => 'url',
    'priority' => 65,
    'section'  => 'social',
    'label'    => esc_html__( 'Dribbble', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[behance]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[behance]', array(
    'type'     => 'url',
    'priority' => 70,
    'section'  => 'social',
    'label'    => esc_html__( 'Behance', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[youtube]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[youtube]', array(
    'type'     => 'url',
    'priority' => 75,
    'section'  => 'social',
    'label'    => esc_html__( 'YouTube', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[vimeo]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[vimeo]', array(
    'type'     => 'url',
    'priority' => 80,
    'section'  => 'social',
    'label'    => esc_html__( 'Vimeo', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[github]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[github]', array(
    'type'     => 'url',
    'priority' => 85,
    'section'  => 'social',
    'label'    => esc_html__( 'Github', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[soundcloud]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[soundcloud]', array(
    'type'     => 'url',
    'priority' => 90,
    'section'  => 'social',
    'label'    => esc_html__( 'SoundCloud', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[rss]',
    array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw'
    )
  );
  
  $wp_customize->add_control( 'social[rss]', array(
    'type'     => 'url',
    'priority' => 95,
    'section'  => 'social',
    'label'    => esc_html__( 'Rss', 'iceberg' ),
  ) );
  
  $wp_customize->add_setting( 'social[email]',
    array(
      'default' => '',
      'sanitize_callback' => 'iceberg_email_sanitize'
    )
  );
  
  $wp_customize->add_control( 'social[email]', array(
    'type'     => 'url',
    'priority' => 100,
    'section'  => 'social',
    'label'    => esc_html__( 'Email', 'iceberg' ),
  ) );
  
  /*
   * Titles & Headings
   */  
  $wp_customize->add_section( 'titles_and_headings',
    array(
      'title' => esc_html__( 'Titles & Headings', 'iceberg' )
    )
  );
  
  $wp_customize->add_setting( 'sticky_post_title',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  
  $wp_customize->add_control( 'sticky_post_title', array(
    'type'        => 'text',
    'priority'    => 0,
    'label'       => esc_html__( 'Sticky post', 'iceberg' ),
    'section'     => 'titles_and_headings',
    'description' => esc_html__( 'Default: &laquo;Featured&raquo;', 'iceberg' )
   ) );
   
  
  $wp_customize->add_setting( 'more_link_title',
    array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  
  $wp_customize->add_control( 'more_link_title', array(
    'type'        => 'text',
    'priority'    => 0,
    'label'       => esc_html__( 'Read More', 'iceberg' ),
    'section'     => 'titles_and_headings',
    'description' => esc_html__( 'Default: &laquo;Read More&raquo;', 'iceberg' )
   ) );
   
  /*
   * Post Options
   */
  $wp_customize->add_section( 'post_options',
    array(
      'title' => esc_html__( 'Post Options', 'iceberg' )
    )
  ); 
  
  $wp_customize->add_setting( 'display_categories',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_categories', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Display categories', 'iceberg' ),
    'section'  => 'post_options',
  ) );
  
  $wp_customize->add_setting( 'display_date',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_date', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Display post date', 'iceberg' ),
    'section'  => 'post_options',
  ) );
  
  $wp_customize->add_setting( 'display_tags_list',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_tags_list', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Display tags list', 'iceberg' ),
    'section'  => 'post_options',
  ) );
  
  $wp_customize->add_setting( 'display_share_buttons',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_share_buttons', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Display share buttons', 'iceberg' ),
    'section'  => 'post_options',
  ) );
  
  $wp_customize->add_setting( 'display_author',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_author', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Display author', 'iceberg' ),
    'section'  => 'post_options',
  ) );
  
  /*
   * Page Options
   */
  $wp_customize->add_section( 'page_options',
    array(
      'title' => esc_html__( 'Page Options', 'iceberg' )
    )
  ); 
  
  $wp_customize->add_setting( 'display_page_share_buttons',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_page_share_buttons', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Display share buttons', 'iceberg' ),
    'section'  => 'page_options',
  ) );
  
  /*
   * Share Buttons
   */
  $wp_customize->add_section( 'share_buttons',
    array(
      'title' => esc_html__( 'Share Buttons', 'iceberg' )
    )
  ); 
  
  $wp_customize->add_setting( 'display_facebook_share_button',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_facebook_share_button', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Facebook', 'iceberg' ),
    'section'  => 'share_buttons',
  ) );
  
  $wp_customize->add_setting( 'display_twitter_share_button',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_twitter_share_button', array(
    'type'     => 'checkbox',
    'priority' => 5,
    'label'    => esc_html__( 'Twitter', 'iceberg' ),
    'section'  => 'share_buttons',
  ) );
  
  $wp_customize->add_setting( 'display_google_share_button',
    array(
      'default' => 0,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_google_share_button', array(
    'type'     => 'checkbox',
    'priority' => 10,
    'label'    => esc_html__( 'Google Plus', 'iceberg' ),
    'section'  => 'share_buttons',
  ) );
  
  $wp_customize->add_setting( 'display_pinterest_share_button',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_pinterest_share_button', array(
    'type'     => 'checkbox',
    'priority' => 15,
    'label'    => esc_html__( 'Pinterest', 'iceberg' ),
    'section'  => 'share_buttons',
  ) );
  
  $wp_customize->add_setting( 'display_tumblr_share_button',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_tumblr_share_button', array(
    'type'     => 'checkbox',
    'priority' => 15,
    'label'    => esc_html__( 'Tumblr', 'iceberg' ),
    'section'  => 'share_buttons',
  ) );
  
  $wp_customize->add_setting( 'display_linkedin_share_button',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'display_linkedin_share_button', array(
    'type'     => 'checkbox',
    'priority' => 20,
    'label'    => esc_html__( 'LinkedIn', 'iceberg' ),
    'section'  => 'share_buttons',
  ) );
  
  /*
   * Footer
   */  
  $wp_customize->add_section( 'footer',
    array(
      'title' => esc_html__( 'Footer', 'iceberg' )
    )
  ); 

  $wp_customize->add_setting(
    'copyright',
    array(
      'default' => '',
      'sanitize_callback' => 'iceberg_textarea_sanitize',
    )
  );
 
  $wp_customize->add_control(
      'copyright',
      array(
        'type'    => 'textarea',
        'label'   => esc_html__( 'Copyright', 'iceberg' ),
        'description' => esc_html__( 'You may use these HTML tags and attributes: a[href,title,target], strong, b, em, i, p, span, br, img[src,title,alt]', 'iceberg' ),
        'section' => 'footer',
      )
  );
  
  /*
   * Custom CSS
   */
  $wp_customize->add_section( 'custom_css',
    array(
      'title' => esc_html__( 'Custom CSS', 'iceberg' )
    )
  ); 
  
  $wp_customize->add_setting(
		'general_css',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control(
		'general_css',
		array(
			'section'  => 'custom_css',
			'type'     => 'textarea'
		)
	);
	
  /*
   * Other Options
   */    
  $wp_customize->add_section( 'other_options',
    array(
      'title' => esc_html__( 'Other Options', 'iceberg' )
    )
  ); 
  
  $wp_customize->add_setting( 'show_preloader_screen',
    array(
      'default' => 1,
      'sanitize_callback' => 'iceberg_checkbox_sanitize',
    )
  );
  
  $wp_customize->add_control( 'show_preloader_screen', array(
    'type'     => 'checkbox',
    'priority' => 0,
    'label'    => esc_html__( 'Show preloader', 'iceberg' ),
    'section'  => 'other_options',
  ) );

}
add_action( 'customize_register', 'iceberg_customize_register' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Iceberg 1.0
 */
function iceberg_customize_preview_js() {
	wp_enqueue_script( 'iceberg-customize-preview', get_template_directory_uri() . '/js/admin/customize-preview.js', array( 'customize-preview' ), '20181013', true );
}
add_action( 'customize_preview_init', 'iceberg_customize_preview_js' );

if ( ! function_exists( 'iceberg_background_size_sanitize' ) ) :
  /**
   * Sanitization callback for background size option.
   *
   * @since Iceberg 1.0
   */
  function iceberg_background_size_sanitize( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'auto';
    }

    return $value;
  }
endif;

if ( ! function_exists( 'iceberg_textarea_sanitize' ) ) :
  /**
   * Sanitization callback for textarea field.
   *
   * @since Iceberg 1.0
   * @return string Textarea value.
   */
  function iceberg_textarea_sanitize( $value ) {
    if ( !current_user_can('unfiltered_html') )
			$value  = stripslashes( wp_filter_post_kses( addslashes( $value ) ) ); // wp_filter_post_kses() expects slashed

    return $value;
  }
endif;

if ( ! function_exists( 'iceberg_checkbox_sanitize' ) ) :
  /**
   * Sanitization callback for checkbox.
   *
   * @since Iceberg 1.0
   */
  function iceberg_checkbox_sanitize( $value ) {
    if ( $value == 1 ) {
        return 1;
    } else {
        return '';
    }
  }
endif;

if ( ! function_exists( 'iceberg_background_size_sanitize' ) ) :
  /**
   * Sanitization callback for background size option.
   *
   * @since Iceberg 1.0
   */
  function iceberg_background_size_sanitize( $value ) {
    $background_sizes = array( 'auto', 'cover', 'contain' );
    if ( ! in_array( $value, $background_sizes ) ) {
      $value = 'cover';
    }

    return $value;
  }
endif;

if ( ! function_exists( 'iceberg_basic_layout_sanitize' ) ) :
  /**
   * Sanitization callback for basic layout select.
   *
   * @since Iceberg 1.0
   */
  function iceberg_basic_layout_sanitize( $value ) {
    $layouts = array( 'sidebar-left', 'sidebar-right' );
    
    if ( in_array( $value, $layouts ) )
      return $value;

    return 'sidebar-left';
  }
endif;

if ( ! function_exists( 'iceberg_email_sanitize' ) ) :
  /**
   * Sanitization callback for email field.
   *
   * @since Iceberg 1.0
   * @return string|null Verified email adress or null.
   */
  function iceberg_email_sanitize( $value ) {
    return ( is_email( $value ) ) ? $value : '';
  }
endif;
?>
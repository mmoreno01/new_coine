<?php
/**
 * Adding fields on the page add/edit categories.
 *
 * @since Iceberg 1.2
 */
 
class Iceberg_Category_Form_Fields_Setup {

  // Option name with categories color array
  protected $categories_color_option_name = 'iceberg_categories_color';
  
  // Default category label color
  protected $default_category_color = '#5aa1e2';

  public function setup() {
    add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

    add_action( 'category_add_form_fields',  array( $this, 'add_category_form_fields' ) );
    add_action( 'category_edit_form_fields', array( $this, 'edit_category_form_fields' ) );
    add_action( 'edited_category',           array( $this, 'save_category_form_fields' ), 10, 2 );
    add_action( 'create_category',           array( $this, 'save_category_form_fields' ), 10, 2 );
  }
  
  /**
	 * Enqueue meta boxes scripts and styles.
	 */	
	public function admin_enqueue_scripts() {
    $screen = get_current_screen();
    
    if( $screen->base == 'edit-tags' || $screen->base == 'term' ) {
      wp_enqueue_style( 'wp-color-picker');
      wp_enqueue_script( 'wp-color-picker');
      wp_enqueue_script( 'iceberg-category-color-js',  get_template_directory_uri() . '/js/admin/category-color.js', array( 'jquery' ), '1.0', true );
    }
	}

  public function add_category_form_fields() {
  ?>
    <div class="form-field">
      <label for="iceberg-category-color"><?php esc_html_e( 'Color', 'iceberg' ); ?></label>
      <input type="hidden" id="iceberg-category-color" name="iceberg_category_color" value="<?php echo esc_attr( $this->default_category_color ); ?>" data-default-color="<?php echo esc_attr( $this->default_category_color ); ?>" />
    </div>
  <?php
  }
  
  public function edit_category_form_fields( $term ) {
    $term_id = $term->term_id;
    $categories_color = get_option( $this->categories_color_option_name );

    $category_color = isset( $categories_color[ $term_id ] ) && $this->sanitize_hex_color( $categories_color[ $term_id ] ) ? $categories_color[ $term_id ] : $this->default_category_color;
  ?>
    <tr class="form-field">
			<th scope="row"><label for="description"><?php esc_html_e( 'Color', 'iceberg' ); ?></label></th>
			<td>
        <input type="hidden" id="iceberg-category-color" name="iceberg_category_color" value="<?php echo esc_attr( $category_color ); ?>" data-default-color="<?php echo esc_attr( $this->default_category_color ); ?>" />
			</td>
		</tr>
  <?php
  }
  
  /**
	 * Save category color.
	 */	  
  public function save_category_form_fields( $term_id ) {
    if ( isset( $_POST['iceberg_category_color'] ) ) {
      $category_color = $_POST['iceberg_category_color'];
      
      $categories_color_array = get_option( $this->categories_color_option_name );
      
      if( isset( $categories_color_array[ $term_id ] ) && $category_color == $this->default_category_color ) {
        unset( $categories_color_array[ $term_id ] );
        update_option( $this->categories_color_option_name, $categories_color_array );
        return;
      }
      
      if( $this->sanitize_hex_color( $category_color ) && $category_color !== $this->default_category_color ) {
        if( empty( $categories_color_array ) || ! is_array( $categories_color_array ) )
          $categories_color_array = array();
          
        $categories_color_array[ $term_id ] = $category_color;
        update_option( $this->categories_color_option_name, $categories_color_array );
      }
    }
  }
  
  /**
	 * Sanitize hex color function.
	 */	
  public function sanitize_hex_color( $color ) {
    if ( '' === $color )
      return '';
      
    // 3 or 6 hex digits, or the empty string.
    if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
      return $color; 
  }
}

$iceberg_category_form_fields = new Iceberg_Category_Form_Fields_Setup();

add_action( 'after_setup_theme', array( $iceberg_category_form_fields, 'setup' ), 16 );
?>
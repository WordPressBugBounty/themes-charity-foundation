<?php
/**
 * Theme functions and definitions
 *
 * @package Charity Foundation
 */

// enque files
if ( ! function_exists( 'charity_foundation_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function charity_foundation_enqueue_styles() {
		wp_enqueue_style( 'ngo-charity-donation-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'charity-foundation-style', get_stylesheet_directory_uri() . '/style.css', array( 'ngo-charity-donation-style-parent' ), '1.0.0' );

		// Theme Customize CSS.
		require get_parent_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'charity-foundation-style',$ngo_charity_donation_custom_style );

		require get_theme_file_path( 'inc/extra_customization.php' );
		wp_add_inline_style( 'charity-foundation-style',$ngo_charity_donation_custom_style );

		// blocks css
      wp_enqueue_style( 'charity-foundation-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'charity-foundation-style' ), '1.0' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'charity_foundation_enqueue_styles', 99 );

// theme setup
function charity_foundation_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'charity-foundation-featured-image', 2000, 1200, true );
	add_image_size( 'charity-foundation-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'charity-foundation' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, and column width.
	*/
	add_editor_style( array( 'assets/css/editor-style.css' ) );
}
add_action( 'after_setup_theme', 'charity_foundation_setup' );

// custom header setup
function charity_foundation_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'charity_foundation_custom_header_args', array(
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header-img-2.png' ),
		'default-text-color'     => 'fff',
		'header-text' 			 		 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'			 			 => true,
		'wp-head-callback'       => 'ngo_charity_donation_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'charity_foundation_custom_header_setup' );

// widgets
function charity_foundation_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'charity-foundation' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'charity-foundation' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'charity-foundation' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget wow zoomIn %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'charity-foundation' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget wow %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'charity-foundation' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget wow %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'charity-foundation' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'charity-foundation' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'charity-foundation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'charity_foundation_widgets_init' );

// remove section
function charity_foundation_customize_register() {
  	global $wp_customize;

  	$wp_customize->remove_section( 'ngo_charity_donation_pro' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_footer_text' );
  	$wp_customize->remove_control( 'ngo_charity_donation_footer_text' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_primary_color' );
  	$wp_customize->remove_control( 'ngo_charity_donation_primary_color' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_secondary_color' );
  	$wp_customize->remove_control( 'ngo_charity_donation_secondary_color' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_section_bg' );
  	$wp_customize->remove_control( 'ngo_charity_donation_section_bg' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_heading_color' );
  	$wp_customize->remove_control( 'ngo_charity_donation_heading_color' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_text_color' );
  	$wp_customize->remove_control( 'ngo_charity_donation_text_color' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_primary_fade' );
  	$wp_customize->remove_control( 'ngo_charity_donation_primary_fade' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_footer_bg' );
  	$wp_customize->remove_control( 'ngo_charity_donation_footer_bg' );

  	$wp_customize->remove_setting( 'ngo_charity_donation_slider_opacity' );
  	$wp_customize->remove_control( 'ngo_charity_donation_slider_opacity' );
}
add_action( 'customize_register', 'charity_foundation_customize_register', 11 );

// dropdown pages
function charity_foundation_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// customizer
function charity_foundation_customize( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_stylesheet_directory_uri() ). '/assets/css/customizer.css');

	require get_theme_file_path( 'inc/custom-control.php' );

	// pro section
	$wp_customize->add_section('charity_foundation_pro', array(
		'title'    => __('UPGRADE CHARITY PREMIUM', 'charity-foundation'),
		'priority' => 1,
	));
	$wp_customize->add_setting('charity_foundation_pro', array(
		'default'           => null,
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control(new Charity_Foundation_Pro_Control($wp_customize, 'charity_foundation_pro', array(
		'label'    => __('CHARITY PREMIUM', 'charity-foundation'),
		'section'  => 'charity_foundation_pro',
		'settings' => 'charity_foundation_pro',
		'priority' => 1,
	)));

	$wp_customize->add_setting('charity_foundation_slider_opacity',array(
        'default' => '1',
        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
	));
	$wp_customize->add_control('charity_foundation_slider_opacity',array(
		'type' => 'radio',
		'label'     => __('Slider Opacity', 'charity-foundation'),
		'section' => 'ngo_charity_donation_slider_section',
		'type' => 'select',
		'choices' => array(
			'0' => __('0','charity-foundation'),
			'0.1' => __('0.1','charity-foundation'),
			'0.2' => __('0.2','charity-foundation'),
			'0.3' => __('0.3','charity-foundation'),
			'0.4' => __('0.4','charity-foundation'),
			'0.5' => __('0.5','charity-foundation'),
			'0.6' => __('0.6','charity-foundation'),
			'0.7' => __('0.7','charity-foundation'),
			'0.8' => __('0.8','charity-foundation'),
			'0.9' => __('0.9','charity-foundation'),
			'1' => __('1','charity-foundation')
		),
	) );

	//Our Causes Section
	$wp_customize->add_section('charity_foundation_causes_section',array(
		'title'	=> __('Our Causes Section','charity-foundation'),
		'priority' => 5,
		'panel' => 'ngo_charity_donation_custompage_panel',
	));
	$wp_customize->add_setting( 'charity_foundation_section_causes_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new Charity_Foundation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'charity_foundation_section_causes_heading', array(
		'label'       => esc_html__( 'Our Causes Section Settings', 'charity-foundation' ),
		'section'     => 'charity_foundation_causes_section',
		'settings'    => 'charity_foundation_section_causes_heading',
	) ) );
	$wp_customize->add_setting(
		'charity_foundation_causes_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new Charity_Foundation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'charity_foundation_causes_show_hide',
			array(
				'settings'        => 'charity_foundation_causes_show_hide',
				'section'         => 'charity_foundation_causes_section',
				'label'           => __( 'Check To Show Section', 'charity-foundation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'charity-foundation' ),
					'off'    => __( 'Off', 'charity-foundation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('charity_foundation_causes_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('charity_foundation_causes_section_title',array(
		'label'	=> __('Section Heading Title','charity-foundation'),
		'section' => 'charity_foundation_causes_section',
		'type'	 => 'text',
	));

	$charity_foundation_categories = get_categories();
		$charity_foundation_cat_posts = array();
			$i = 0;
			$charity_foundation_cat_posts[]='Select';
		foreach($charity_foundation_categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$charity_foundation_cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('charity_foundation_causes_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'ngo_charity_donation_sanitize_choices',
	));
	$wp_customize->add_control('charity_foundation_causes_section_category',array(
		'type'    => 'select',
		'choices' => $charity_foundation_cat_posts,
		'label' => __('Select Category to display Latest Post','charity-foundation'),
		'section' => 'charity_foundation_causes_section',
	));

	$wp_customize->add_setting('charity_foundation_causes_order_type',array(
        'default' => 'ascending',
        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
	));
	$wp_customize->add_control('charity_foundation_causes_order_type',array(
        'type' => 'select',
        'label' => __('Post Order','charity-foundation'),
        'section' => 'charity_foundation_causes_section',
        'choices' => array(
            'ascending' => __('Oldest to Newest','charity-foundation'),
            'descending' => __('Newest to Oldest','charity-foundation'),
            'a-to-z' => __('A&rarr;Z','charity-foundation'),
            'z-to-a' => __('Z&rarr;A','charity-foundation'),
        ),
	) );

	$wp_customize->add_setting('charity_foundation_causes_count',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('charity_foundation_causes_count',array(
		'label'	=> esc_html__('Post Count','charity-foundation'),
		'section'	=> 'charity_foundation_causes_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		)
	));

	$wp_customize->add_setting('charity_foundation_footer_text',array(
		'default'	=> 'Charity Foundation WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('charity_foundation_footer_text',array(
		'label'	=> esc_html__('Copyright Text','charity-foundation'),
		'section'	=> 'ngo_charity_donation_footer_copyright',
		'type'		=> 'textarea'
	));

	$wp_customize->add_setting('charity_foundation_primary_color', array(
	    'default' => '#f9c416',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'charity_foundation_primary_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Color', 'charity-foundation'),
	 
	)));

	$wp_customize->add_setting('charity_foundation_section_bg', array(
	    'default' => '#f8f5ef',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'charity_foundation_section_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Homepage Section Bg color', 'charity-foundation'),
	 
	)));

	$wp_customize->add_setting('charity_foundation_heading_color', array(
	    'default' => '#1d1c1c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'charity_foundation_heading_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Heading Color', 'charity-foundation'),
	 
	)));

	$wp_customize->add_setting('charity_foundation_text_color', array(
	    'default' => '#9f9f9f',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'charity_foundation_text_color', array(
	    'section' => 'colors',
	    'label' => esc_html__('Theme Text Color', 'charity-foundation'),
	 
	)));

	$wp_customize->add_setting('charity_foundation_footer_bg', array(
	    'default' => '#1d1c1c',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'transport' => 'refresh',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'charity_foundation_footer_bg', array(
	    'section' => 'colors',
	    'label' => esc_html__('Footer Bg color', 'charity-foundation'),
	)));

}
add_action( 'customize_register', 'charity_foundation_customize' );

// comments
function charity_foundation_enqueue_comments_reply() {
  if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
    // Load comment-reply.js (into footer)
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
  }
}
add_action(  'wp_enqueue_scripts', 'charity_foundation_enqueue_comments_reply' );

// Footer Text
function charity_foundation_copyright_link() {
    $charity_foundation_footer_text = get_theme_mod('charity_foundation_footer_text', esc_html__('Charity Foundation WordPress Theme', 'charity-foundation'));
    $charity_foundation_credit_link = esc_url('https://www.ovationthemes.com/products/free-charity-foundation-wordpress-theme');

    echo '<a href="' . $charity_foundation_credit_link . '" target="_blank">' . esc_html($charity_foundation_footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'charity-foundation') . '</span></a>';
}

// post meta
function charity_foundation_custom_goal_raised() {
  add_meta_box( 'bn_meta', __( 'Donation Meta Feilds', 'charity-foundation' ), 'charity_foundation_meta_goal_raised_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  add_action('admin_menu', 'charity_foundation_custom_goal_raised');
}
function charity_foundation_meta_goal_raised_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'charity_foundation_goal_raised_meta' );
  $charity_foundation_bn_stored_meta = get_post_meta( $post->ID );
  $charity_foundation_raised = get_post_meta( $post->ID, 'charity_foundation_raised', true );
  $charity_foundation_goal = get_post_meta( $post->ID, 'charity_foundation_goal', true );
  ?>
  <div id="custom_meta_feilds">
    <table id="list">
      <tbody id="the-list" data-wp-lists="list:meta">
        <tr id="meta-8">
          <td class="left">
            <?php esc_html_e( 'Raised Price', 'charity-foundation' )?>
          </td>
          <td class="left">
            <input type="number" name="charity_foundation_raised" id="charity_foundation_raised" value="<?php echo esc_attr($charity_foundation_raised); ?>" />
          </td>
        </tr>
        <tr id="meta-8">
          <td class="left">
            <?php esc_html_e( 'Goal Price', 'charity-foundation' )?>
          </td>
          <td class="left">
            <input type="number" name="charity_foundation_goal" id="charity_foundation_goal" value="<?php echo esc_attr($charity_foundation_goal); ?>" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <?php
}
function charity_foundation_save( $post_id ) {
	if (!isset($_POST['charity_foundation_goal_raised_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['charity_foundation_goal_raised_meta']) ), basename(__FILE__))) {
  		return;
  	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if( isset( $_POST[ 'charity_foundation_raised' ] ) ) {
	update_post_meta( $post_id, 'charity_foundation_raised', strip_tags( wp_unslash( $_POST[ 'charity_foundation_raised' ]) ) );
	}
	if( isset( $_POST[ 'charity_foundation_goal' ] ) ) {
	update_post_meta( $post_id, 'charity_foundation_goal', strip_tags( wp_unslash( $_POST[ 'charity_foundation_goal' ]) ) );
	}
}
add_action( 'save_post', 'charity_foundation_save' );

define('CHARITY_FOUNDATION_PRO_LINK',__('https://www.ovationthemes.com/products/charity-donation-wordpress-theme','charity-foundation'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Charity_Foundation_Pro_Control')):
    class Charity_Foundation_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
            <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( CHARITY_FOUNDATION_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CHARITY PREMIUM','charity-foundation');?> </a>
            </div>
            <div class="col-md">
                <img class="charity_foundation_img_responsive " src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png">
            </div>
            <div class="col-md">
                <h3 style="margin-top:10px; margin-left: 20px; font-size:12px; text-decoration:underline; color:#333;"><?php esc_html_e('CHARITY PREMIUM - Features', 'charity-foundation'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'charity-foundation');?> </li>
                    <li class="upsell-charity_foundation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'charity-foundation');?> </li>
                </ul>
            </div>
            <div class="col-md upsell-btn upsell-btn-bottom">
                <a href="<?php echo esc_url( CHARITY_FOUNDATION_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE CHARITY PREMIUM','charity-foundation');?> </a>
            </div>
        </label>
    <?php } }
endif;

if ( ! defined( 'NGO_CHARITY_DONATION_SUPPORT' ) ) {
define('NGO_CHARITY_DONATION_SUPPORT',__('https://wordpress.org/support/theme/charity-foundation','charity-foundation'));
}
if ( ! defined( 'NGO_CHARITY_DONATION_REVIEW' ) ) {
define('NGO_CHARITY_DONATION_REVIEW',__('https://wordpress.org/support/theme/charity-foundation/reviews/#new-post','charity-foundation'));
}
if ( ! defined( 'NGO_CHARITY_DONATION_LIVE_DEMO' ) ) {
define('NGO_CHARITY_DONATION_LIVE_DEMO',__('https://trial.ovationthemes.com/charity-foundation/','charity-foundation'));
}
if ( ! defined( 'NGO_CHARITY_DONATION_BUY_PRO' ) ) {
define('NGO_CHARITY_DONATION_BUY_PRO',__('https://www.ovationthemes.com/products/charity-donation-wordpress-theme','charity-foundation'));
}
if ( ! defined( 'NGO_CHARITY_DONATION_PRO_DOC' ) ) {
define('NGO_CHARITY_DONATION_PRO_DOC',__('https://trial.ovationthemes.com/docs/ot-charity-foundation-pro-doc/','charity-foundation'));
}
if ( ! defined( 'NGO_CHARITY_DONATION_FREE_DOC' ) ) {
define('NGO_CHARITY_DONATION_FREE_DOC',__('https://trial.ovationthemes.com/docs/ot-charity-foundation-free-doc/','charity-foundation'));
}
if ( ! defined( 'NGO_CHARITY_DONATION_THEME_NAME' ) ) {
define('NGO_CHARITY_DONATION_THEME_NAME',__('Premium Donation Theme','charity-foundation'));
}
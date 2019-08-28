<?php
/**
 * designart functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package designart
 */
if ( ! function_exists( 'designart_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function designart_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on designart, use a find and replace
		 * to change 'designart' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'designart', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'designart' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'designart_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'designart_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function designart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'designart_content_width', 640 );
}
add_action( 'after_setup_theme', 'designart_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function designart_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'designart' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'designart' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'designart_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function designart_scripts() {
	wp_enqueue_style( 'designart-style', get_stylesheet_uri() );

	wp_enqueue_script( 'designart-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'designart-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'designart_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//define
define('DIR_STATICS',get_template_directory().'/statics');
define('URL_STATICS',get_template_directory_uri().'/statics');

//include helpers.php
require get_template_directory() . '/includes/configs.php';
require get_template_directory() . '/includes/helpers.php';

//custom css
require get_template_directory() . '/statics/hooks.php';

//add post type
require get_template_directory() . '/custom-types/exhibitor.php';
require get_template_directory() . '/custom-types/architecture.php';
require get_template_directory() . '/custom-types/event-party.php';
require get_template_directory() . '/custom-types/artist-brand.php';
require get_template_directory() . '/custom-types/interview.php';
require get_template_directory() . '/custom-types/conference.php';




//shortcode
require get_template_directory() . '/shortcode/shortcode.php';



// add sub menu page
function add_submenu_pages(){

	add_submenu_page( 'edit.php?post_type=conference', esc_html__( 'Panelist', 'encoton' ), esc_html__( 'Panelist', 'encoton' ), 'edit_posts', 'edit.php?post_type=panelist' );
}
add_action('admin_menu', 'add_submenu_pages' );


//custom ACF
function my_acf_google_map_api( $api ){
    global $cfg_api_google_map;
    $api['key'] = $cfg_api_google_map;

    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function custom_rewrite_basic() {
    add_rewrite_rule('^en/([^/]*)/?', 'index.php?pagename=$matches[1]', 'top');
    add_rewrite_rule('^cn/([^/]*)/?', 'index.php?pagename=$matches[1]', 'top');
}
add_action('init', 'custom_rewrite_basic');

add_action('meta_share', 'custom_meta_share');

function custom_meta_share() {
    global $post, $custom_page;
    $language = get_key_languagle();
    $prefix_varible = get_prefix_languagle($language, "_");

    $page = $post;
    if (isset($custom_page) && !empty($custom_page) ) {
        $page = $custom_page;
    }
    $page = (array)$page;

    if (!empty($page)) {
        $post_id = -1;
        if (isset($page['ID'])) {
            $post_id = $page['ID'];
        }
		$og_meta_image='';
	    if(class_exists('acf') ) :
	    $og_meta_image = get_field('og:image', $post_id, '');
		endif;
        if (!empty($og_meta_image)) {
            $og_meta_image_url = wp_get_attachment_url($og_meta_image);
            echo '<meta property="og:image"              content="'.$og_meta_image_url.'" />';
        }
    }
}

add_filter( 'body_class', function( $classes ) {
    $key = get_key_languagle();
    if (!empty($key)) {
    	$key = 'language-'.$key;
	}
    return array_merge( $classes, array( $key) );
} );


function get_custom_post_type_template($single_template) {
	global $post;

	if ($post->post_type == 'interview') {

		$single_template = dirname( __FILE__ ) . '/page-template/single-interview.php';
	}
	return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );

add_action('wp_ajax_send_lang_content', 'change_lang_content');
add_action('wp_ajax_nopriv_send_lang_content', 'change_lang_content');
function change_lang_content(){
    $post_id = $_POST["get_id"];
    $get_ck = $_POST["get_ck"];
//    echo $get_ck;
////    if(isset($_POST["id"])) {
////        if($get_ck == 'en'){
////            echo "okokokok";
////        }else{
////            echo "wrong";
////        }
//        $prefix_varible = get_prefix_languagle( $get_ck, "_" );
//        $content_lang = get_field($prefix_varible.'description', $post_id, false );
    $content_lang = get_field('jp_description', $post_id, false );
    echo $content_lang;

}












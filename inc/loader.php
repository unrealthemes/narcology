<?php

/**
 * Get instance of helper
 */
function ut_help() {
  	return UT_Theme_Helper::get_instance();
}

/**
 * Main class of all tehe,e settings
 */
class UT_Theme_Helper {

  	private static $_instance = null;

	  public $guneberg_blocks;
  	// public $example;

  	private function __construct() {

  	}

  	protected function __clone() {

  	}

  	static public function get_instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
  	}

	/**
	 * Load files, plugins, add hooks and filters and do all magic
	 */
	function init() {

		// load needed files
		$this->import();
		$this->load_classes();
		$this->register_hooks();

		return $this;
	}

	function load_classes() {

		$this->guneberg_blocks = UT_Guneberg_Blocks::get_instance();
		// $this->example = UT_Example::get_instance();
	}

	/**
	 * Register all needed hooks
	 */
	public function register_hooks() {

		add_action( 'wp_enqueue_scripts', [ $this, 'load_scripts_n_styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'load_admin_scripts_n_styles' ] );
		add_action( 'after_setup_theme',  [ $this, 'register_menus' ] );
		add_action( 'after_setup_theme',  [ $this, 'add_theme_support' ] );
		// add_action( 'widgets_init', [ $this, 'widgets_init' ] );
	}

	function register_menus() {

		register_nav_menus( [
			'menu_1' => esc_html__( 'Header', 'unreal-theme' ),
			'menu_2' => esc_html__( 'Service', 'unreal-theme' ),
			'menu_3' => esc_html__( 'Footer 1', 'unreal-theme' ),
			'menu_4' => esc_html__( 'Footer 2', 'unreal-theme' ),
			'menu_5' => esc_html__( 'Footer 3', 'unreal-theme' ),
			'menu_6' => esc_html__( 'Footer 4', 'unreal-theme' ),
			'menu_7' => esc_html__( 'Copyright', 'unreal-theme' ),
		] );
	}

	public function add_theme_support() {

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		] );
		add_theme_support( 'woocommerce' );
	}

	// public function widgets_init() {
	
		// 	register_sidebar( array(
		// 		'name'          => 'UT Widget Area',
		// 		'id'            => 'ut-widget',
		// 		'before_widget' => '<div class="chw-widget">',
		// 		'after_widget'  => '</div>',
		// 		'before_title'  => '<h2 class="chw-title">',
		// 		'after_title'   => '</h2>',
		// 	) );
		
		// }

	function load_scripts_n_styles() {
		// ========================================= CSS ========================================= //
		wp_enqueue_style( 'ut-style', get_stylesheet_uri() );
		wp_enqueue_style( 'ut-style-css', THEME_URI . '/css/style.css' );
		wp_enqueue_style( 'ut-owl-carousel-css', THEME_URI . '/css/owl.carousel.min.css' );
		wp_enqueue_style( 'ut-jquery-ui-css', THEME_URI . '/css/jquery-ui.css' );
		wp_enqueue_style( 'ut-responsive-css', THEME_URI . '/css/responsive.css' );
		// ========================================= JS ========================================= //
		//////////////////////////////////////
		wp_deregister_script('jquery-core');
		wp_register_script('jquery-core', THEME_URI . '/js/jquery-3.6.3.min.js', false, null, true);
		wp_deregister_script('jquery');
		wp_register_script('jquery', false, ['jquery-core'], null, true);
		//////////////////////////////////////
		wp_enqueue_script( 'ut-inputmask', THEME_URI . '/js/jquery.inputmask.min.js', ['jquery'], date("Ymd"), true );
		wp_enqueue_script( 'ut-jquery-ui', THEME_URI . '/js/jquery-ui.js', ['jquery'], date("Ymd"), true );
		wp_enqueue_script( 'ut-modernizr', THEME_URI . '/js/modernizr.js', ['jquery'], date("Ymd"), false );
		wp_enqueue_script( 'ut-owl-carousel', THEME_URI . '/js/owl.carousel.min.js', ['jquery'], date("Ymd"), true );
		wp_enqueue_script( 'ut-custom', THEME_URI . '/js/custom.js', ['jquery'], date("Ymd"), true );
		wp_enqueue_script( 'ut-scripts', THEME_URI . '/js/scripts.js', ['jquery'], date("Ymd"), true );
		wp_localize_script( 
			'ut-scripts', 
			'ut_params', [
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'ut_check' ),
			] 
		);

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		// add_filter( 'script_loader_tag', [ $this, 'add_async_defer_attr' ], 10, 3 );
	}

	function load_admin_scripts_n_styles() {
		// ========================================= CSS ========================================= //
		// wp_enqueue_style( 'ut-admin', THEME_URI . '/admin.css' );
		// ========================================= JS ========================================= //
	}

	// public function add_async_defer_attr( $tag, $handle, $src ) {

	// 	if ( 'ut-googleapis' === $handle ) {
	// 		return str_replace( ' src', ' async defer src', $tag );
	// 	}

	//   return $tag;
	// }

	public function import() {

		include_once 'helpers.php';
		include_once 'class.gutenberg-blocks.php';
		// include_once 'woo-functions.php';
		// include_once 'disable-editor.php';
		// include_once 'pagination.php';
		// include_once 'walker-nav-menu.php';
		// include_once 'class.example.php';
	}

}

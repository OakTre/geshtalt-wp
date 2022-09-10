<?php
/**
 * main functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package main
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'main_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function main_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on main, use a find and replace
		 * to change 'main' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'main', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'main' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'main_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'main_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function main_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'main_content_width', 640 );
}
add_action( 'after_setup_theme', 'main_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function main_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'main' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'main' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'main_widgets_init' );

/**
 * Enqueue scripts and styles.
 */


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

//Регистрация нового типа поста
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('info', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Информация', // основное название для типа записи
			'singular_name'      => 'Информация', // название для одной записи этого типа
			'add_new'            => 'Добавить информацию', // для добавления новой записи
			'add_new_item'       => 'Добавление информацию', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование информацию', // для редактирования типа записи
			'new_item'           => 'Новая информация', // текст новой записи
			'view_item'          => 'Смотреть информацию', // для просмотра записи этого типа.
			'search_items'       => 'Искать информацию', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Информация', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-format-gallery', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','author','thumbnail','excerpt','editor','trackbacks','comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	)
 ); 
	register_post_type('doc', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Документы', // основное название для типа записи
			'singular_name'      => 'Документы', // название для одной записи этого типа
			'add_new'            => 'Добавить документ', // для добавления новой записи
			'add_new_item'       => 'Добавление документа', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование документа', // для редактирования типа записи
			'new_item'           => 'Новый документ', // текст новой записи
			'view_item'          => 'Смотреть документ', // для просмотра записи этого типа.
			'search_items'       => 'Искать документ', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Документы', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-format-gallery', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','author','thumbnail','excerpt','editor','trackbacks','comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	)
 ); 
	register_post_type('obr', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Программы', // основное название для типа записи
			'singular_name'      => 'Программы', // название для одной записи этого типа
			'add_new'            => 'Добавить программу', // для добавления новой записи
			'add_new_item'       => 'Добавление программы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование программы', // для редактирования типа записи
			'new_item'           => 'Новая программа', // текст новой записи
			'view_item'          => 'Смотреть программу', // для просмотра записи этого типа.
			'search_items'       => 'Искать программу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Программы', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-format-gallery', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','author','thumbnail','excerpt','editor','trackbacks','comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('category'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	)
 ); 
	register_post_type('sotrudniki', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Сотрудники', // основное название для типа записи
			'singular_name'      => 'Сотрудники', // название для одной записи этого типа
			'add_new'            => 'Добавить сотрудника', // для добавления новой записи
			'add_new_item'       => 'Добавление сотрудника', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование сотрудника', // для редактирования типа записи
			'new_item'           => 'Новый сотрудника', // текст новой записи
			'view_item'          => 'Смотреть сотрудника', // для просмотра записи этого типа.
			'search_items'       => 'Искать сотрудника', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Сотрудники', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => false, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-format-gallery', 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor','author','thumbnail','excerpt','editor','trackbacks','comments'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array('category'),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	)
 ); 
}

//
//Регистрация меню
add_action( 'after_setup_theme', 'add_menu' );
function add_menu() {

register_nav_menu( 'menu-2', 'Второстепенное меню' );

add_theme_support( 'post-thumbnails', array( 'post', 'portfolio', 'format' ) ); 
add_image_size( 'post_img', 44, 44, true );  
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
global $post;
return '...';}

}
add_filter( 'excerpt_length', function(){
	return 20;
} );
//
//Регистрация скриптов
add_action( 'wp_head', 'style_theme' );
add_action( 'wp_footer', 'script_theme' );
function script_theme() {
  wp_enqueue_script('init2', get_template_directory_uri() . '/js/libs.min.js', array('jquery') );

  wp_enqueue_script('init', get_template_directory_uri() . '/js/common.js', array('jquery') );
}
function style_theme() {
	wp_enqueue_style( 'stylecss', get_stylesheet_uri() );
  wp_enqueue_style( 'maincss2', get_template_directory_uri() . '/css/libs.min.css', 100  );
  wp_enqueue_style( 'maincss', get_template_directory_uri() . '/css/main.css', 100  );
}
//
//Удаление стилизации CF7
add_action( 'wpcf7_autop_or_not', '__return_false' );
define('WPCF7_AUTOP', false );
add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

	return $content;
});

//Создание шорткода
function my_ads_shortcode( $attr ) {
	ob_start();
	get_template_part( 'form' );
	return ob_get_clean();
}
add_shortcode( 'form', 'my_ads_shortcode' );
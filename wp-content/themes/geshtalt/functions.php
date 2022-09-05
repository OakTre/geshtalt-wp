<<<<<<< HEAD
<?php
add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action("wp_enqueue_scripts", "site_scripts");

function site_scripts() {
  wp_dequeue_style( 'wp-block-library' );
  wp_deregister_script( 'wp-embed' );

  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'backend', get_template_directory_uri() . '/assets/css/backend.css', array(), '1.1.0' );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.2.1', true );
  wp_enqueue_script( 'backend-js', get_template_directory_uri() . '/assets/js/backend.js', array(), '1.1.0', true );
}



add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
  register_nav_menu( 'main_menu', 'Меню главное' );
  add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields() {
  require_once( 'includes/carbon-fields-options/theme-options.php' );
  require_once( 'includes/carbon-fields-options/post-meta.php' );
}

add_action('init', 'create_global_variable');
function create_global_variable() {
  global $geshtalt;

  $geshtalt = [
    'phone' => carbon_get_theme_option( 'phone' ),
    'phone_digits' => substr_replace( preg_replace( "/[^0-9]/" , '' , carbon_get_theme_option( 'phone' ) ) , '+7' , 0 , 1 ),
    'address' => carbon_get_theme_option( 'adres'),
    'wt' => carbon_get_theme_option( 'wt' ),
    'tg' => carbon_get_theme_option( 'tg' ),
    'work_time' => carbon_get_theme_option( 'work_time' ),
  ];
}


add_action( 'init', 'register_event_types' );
function register_event_types() {
  register_post_type('event', [
    'labels' => [
      'name'               => 'Мероприятия', // основное название для типа записи
      'singular_name'      => 'Мероприятие', // название для одной записи этого типа
      'add_new'            => 'Добавить Мероприятие', // для добавления новой записи
      'add_new_item'       => 'Добавление Мероприятия', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование Мероприятия', // для редактирования типа записи
      'new_item'           => 'Новое Мероприятие', // текст новой записи
      'view_item'          => 'Смотреть Мероприятие', // для просмотра записи этого типа.
      'search_items'       => 'Искать Мероприятие', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'menu_name'          => 'Мероприятия', // название меню
    ],
    'menu_icon'          => 'dashicons-format-status',
    'public'             => true,
    'menu_position'      => 5,
    'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    'has_archive'        => true,
    'rewrite'            => ['slug' => 'event']
   ] );

   register_taxonomy('event-categories', 'event', [
    'labels'        => [
      'name'                        => 'Мероприятия',
      'singular_name'               => 'Мероприятие',
      'search_items'                =>  'Искать категорию',
      'popular_items'               => 'Популярные категории',
      'all_items'                   => 'Все категории',
      'edit_item'                   => 'Изменить категорию',
      'update_item'                 => 'Обновить категорию',
      'add_new_item'                => 'Добавить новую категорию',
      'new_item_name'               => 'Новое название категории',
      'separate_items_with_commas'  => 'Separate categories with commas',
      'add_or_remove_items'         => 'Доабвить или удалить категорию',
      'choose_from_most_used'       => 'Выбрать самую популярную категорию',
      'menu_name'                   => 'Категории',
    ],
    'hierarchical'  => true,
  ]);
};

add_action( 'init', 'register_program_types' );
function register_program_types() {
  register_post_type('program', [
    'labels' => [
      'name'               => 'Программы', // основное название для типа записи
      'singular_name'      => 'Программа', // название для одной записи этого типа
      'add_new'            => 'Добавить Программу', // для добавления новой записи
      'add_new_item'       => 'Добавление Программы', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование Программы', // для редактирования типа записи
      'new_item'           => 'Новая Программа', // текст новой записи
      'view_item'          => 'Смотреть Программу', // для просмотра записи этого типа.
      'search_items'       => 'Искать Программу', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'menu_name'          => 'Программы', // название меню
    ],
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'public'             => true,
    'menu_position'      => 5,
    'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    'has_archive'        => true,
    'rewrite'            => ['slug' => 'program']
   ] );

   register_taxonomy('program-categories', 'program', [
    'labels'        => [
      'name'                        => 'Программы',
      'singular_name'               => 'Программа',
      'search_items'                =>  'Искать категорию',
      'popular_items'               => 'Популярные категории',
      'all_items'                   => 'Все категории',
      'edit_item'                   => 'Изменить категорию',
      'update_item'                 => 'Обновить категорию',
      'add_new_item'                => 'Добавить новую категорию',
      'new_item_name'               => 'Новое название категории',
      'separate_items_with_commas'  => 'Separate categories with commas',
      'add_or_remove_items'         => 'Доабвить или удалить категорию',
      'choose_from_most_used'       => 'Выбрать самую популярную категорию',
      'menu_name'                   => 'Категории',
    ],
    'hierarchical'  => true,
  ]);
};

?>
=======
<?php
add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',             'print_emoji_detection_script', 7 );
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('wp_print_styles',     'print_emoji_styles' );
remove_action('admin_print_styles',  'print_emoji_styles' );

remove_action('wp_head', 'wp_resource_hints', 2 ); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); //remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); // remove EditURI
remove_action('wp_head', 'rest_output_link_wp_head');// remove 'https://api.w.org/
remove_action('wp_head', 'rel_canonical'); //remove canonical
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate

add_action("wp_enqueue_scripts", "site_scripts");

function site_scripts() {
  wp_dequeue_style( 'wp-block-library' );
  wp_deregister_script( 'wp-embed' );

  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'backend', get_template_directory_uri() . '/assets/css/backend.css', array(), '1.1.0' );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.2.1', true );
  wp_enqueue_script( 'backend-js', get_template_directory_uri() . '/assets/js/backend.js', array(), '1.1.0', true );
}



add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
  register_nav_menu( 'main_menu', 'Меню главное' );
  add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields() {
  require_once( 'includes/carbon-fields-options/theme-options.php' );
  require_once( 'includes/carbon-fields-options/post-meta.php' );
}

add_action('init', 'create_global_variable');
function create_global_variable() {
  global $geshtalt;

  $geshtalt = [
    'phone' => carbon_get_theme_option( 'phone' ),
    'phone_digits' => substr_replace( preg_replace( "/[^0-9]/" , '' , carbon_get_theme_option( 'phone' ) ) , '+7' , 0 , 1 ),
    'address' => carbon_get_theme_option( 'adres'),
    'wt' => carbon_get_theme_option( 'wt' ),
    'tg' => carbon_get_theme_option( 'tg' ),
    'work_time' => carbon_get_theme_option( 'work_time' ),
  ];
}


add_action( 'init', 'register_event_types' );
function register_event_types() {
  register_post_type('event', [
    'labels' => [
      'name'               => 'Мероприятия', // основное название для типа записи
      'singular_name'      => 'Мероприятие', // название для одной записи этого типа
      'add_new'            => 'Добавить Мероприятие', // для добавления новой записи
      'add_new_item'       => 'Добавление Мероприятия', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование Мероприятия', // для редактирования типа записи
      'new_item'           => 'Новое Мероприятие', // текст новой записи
      'view_item'          => 'Смотреть Мероприятие', // для просмотра записи этого типа.
      'search_items'       => 'Искать Мероприятие', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'menu_name'          => 'Мероприятия', // название меню
    ],
    'menu_icon'          => 'dashicons-format-status',
    'public'             => true,
    'menu_position'      => 5,
    'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    'has_archive'        => true,
    'rewrite'            => ['slug' => 'event']
   ] );

   register_taxonomy('event-categories', 'event', [
    'labels'        => [
      'name'                        => 'Мероприятия',
      'singular_name'               => 'Мероприятие',
      'search_items'                =>  'Искать категорию',
      'popular_items'               => 'Популярные категории',
      'all_items'                   => 'Все категории',
      'edit_item'                   => 'Изменить категорию',
      'update_item'                 => 'Обновить категорию',
      'add_new_item'                => 'Добавить новую категорию',
      'new_item_name'               => 'Новое название категории',
      'separate_items_with_commas'  => 'Separate categories with commas',
      'add_or_remove_items'         => 'Доабвить или удалить категорию',
      'choose_from_most_used'       => 'Выбрать самую популярную категорию',
      'menu_name'                   => 'Категории',
    ],
    'hierarchical'  => true,
  ]);
};

add_action( 'init', 'register_program_types' );
function register_program_types() {
  register_post_type('program', [
    'labels' => [
      'name'               => 'Программы', // основное название для типа записи
      'singular_name'      => 'Программа', // название для одной записи этого типа
      'add_new'            => 'Добавить Программу', // для добавления новой записи
      'add_new_item'       => 'Добавление Программы', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Редактирование Программы', // для редактирования типа записи
      'new_item'           => 'Новая Программа', // текст новой записи
      'view_item'          => 'Смотреть Программу', // для просмотра записи этого типа.
      'search_items'       => 'Искать Программу', // для поиска по этим типам записи
      'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
      'menu_name'          => 'Программы', // название меню
    ],
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'public'             => true,
    'menu_position'      => 5,
    'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    'has_archive'        => true,
    'rewrite'            => ['slug' => 'program']
   ] );

   register_taxonomy('program-categories', 'program', [
    'labels'        => [
      'name'                        => 'Программы',
      'singular_name'               => 'Программа',
      'search_items'                =>  'Искать категорию',
      'popular_items'               => 'Популярные категории',
      'all_items'                   => 'Все категории',
      'edit_item'                   => 'Изменить категорию',
      'update_item'                 => 'Обновить категорию',
      'add_new_item'                => 'Добавить новую категорию',
      'new_item_name'               => 'Новое название категории',
      'separate_items_with_commas'  => 'Separate categories with commas',
      'add_or_remove_items'         => 'Доабвить или удалить категорию',
      'choose_from_most_used'       => 'Выбрать самую популярную категорию',
      'menu_name'                   => 'Категории',
    ],
    'hierarchical'  => true,
  ]);
};

?>
>>>>>>> 080ca8b4fc2331ba3ae275109a10f57bc3141c25

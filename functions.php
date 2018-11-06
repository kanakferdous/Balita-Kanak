<?php
if (!isset($content_width))
    $content_width = 900;

function wordkanak_adjust_content_width()
{
    global $content_width;

    if (is_page_template('full-width.php'))
        $content_width = 780;
}
add_action('template_redirect', 'wordkanak_adjust_content_width');
function balitakanak_theme_setup()
{
    load_theme_textdomain('balitakanak', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tags');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'balitakanak'),
        'secondary' => __('Secondary Menu', 'balitakanak')
    ));
    add_theme_support('post_formats', array('aside', 'gallery', 'quote', 'image', 'video'));
    add_theme_support('html5', array('search-form'));
    add_theme_support('supports', array('title', 'editor', 'thumbnail', 'custom-fields'));

    $headerlogo = array(
        'height' => 200,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $headerlogo);
    add_image_size('homepage-thumb', 400, 300, true); // (cropped)
    add_image_size('ppost-thumb', 90, 90);
    $balitakanak_custom_header = array(
        'default-image' => '',
        'width' => 0,
        'height' => 0,
        'flex-height' => false,
        'flex-width' => false,
        'uploads' => true,
        'random-default' => false,
        'header-text' => true,
        'default-text-color' => '',
        'wp-head-callback' => '',
        'admin-head-callback' => '',
        'admin-preview-callback' => '',
    );
    add_theme_support('custom-header', $balitakanak_custom_header);

    $balitakanak_custom_background = array(
        'default-color' => '',
        'default-image' => '',
        'default-repeat' => 'repeat',
        'default-position-x' => 'left',
        'default-position-y' => 'top',
        'default-size' => 'auto',
        'default-attachment' => 'scroll',
        'wp-head-callback' => '_custom_background_cb',
        'admin-head-callback' => '',
        'admin-preview-callback' => ''
    );
    add_theme_support('custom-background', $balitakanak_custom_background);
}
add_action('after_setup_theme', 'balitakanak_theme_setup');

function wpdocs_theme_add_editor_styles()
{
    add_editor_style('custom-editor-style.css');
}
add_action('admin_init', 'wpdocs_theme_add_editor_styles');

function balita_theme_scripts()
{
    wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.1', 'all');
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.css', array(), '1.1', 'all');
    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.1', 'all');
    wp_enqueue_style('ionicons-css', get_template_directory_uri() . '/fonts/ionicons/css/ionicons.min.css', array(), '1.1', 'all');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css', array(), '1.1', 'all');
    wp_enqueue_style('flaticon-css', get_template_directory_uri() . '/fonts/flaticon/font/flaticon.css', array(), '1.1', 'all');
    wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css', array(), '1.1', 'all');
    wp_enqueue_style('theme-css', get_stylesheet_uri());

    wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array('jquery'), '1.0', false);
    wp_enqueue_script('query-migrate-js', get_template_directory_uri() . '/js/jquery-migrate-3.0.0.js', array('jquery'), '1.0', true);
    wp_enqueue_script('popper-js', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-waypoints-js', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-stellar-js', get_template_directory_uri() . '/js/jquery.stellar.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'balita_theme_scripts');

function balitakanak_widgets_init()
{
    register_sidebar(array(
        'name' => __('Contact Us Sidebar', 'balitakanak'),
        'id' => 'contact-sidebar',
        'description' => __('Widgets in this area will be shown on contact us page widget content.', 'balitakanak'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Footer Paragraph Sidebar', 'balitakanak'),
        'id' => 'footerp-sidebar',
        'description' => __('Widgets in this area will be shown on Footer Paragraph widget content.', 'balitakanak'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Page links Sidebar', 'balitakanak'),
        'id' => 'pagelinks-sidebar',
        'description' => __('Widgets in this area will be shown on page links widget content.', 'balitakanak'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Socail links Sidebar', 'balitakanak'),
        'id' => 'sociallinks-sidebar',
        'description' => __('Widgets in this area will be shown on social links widget content.', 'balitakanak'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Copyright Sidebar', 'balitakanak'),
        'id' => 'copyright-sidebar',
        'description' => __('Widgets in this area will be shown on copyright widget content.', 'balitakanak'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Author Social link', 'balitakanak'),
        'id' => 'author-social-link',
        'description' => __('Widgets in this area will be shown on author social link', 'balitakanak'),
        'before_widget' => '<p class="social">',
        'after_widget' => '</p>',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Search Form', 'balitakanak'),
        'id' => 'search-form',
        'description' => __('Widgets in this area will be shown search from', 'balitakanak'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}
add_action('widgets_init', 'balitakanak_widgets_init');

function balitakanak_enqueue_comments_reply()
{
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'balitakanak_enqueue_comments_reply');


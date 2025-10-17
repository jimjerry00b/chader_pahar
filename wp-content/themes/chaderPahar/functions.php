<?php

// Register Navigation Menus
function chaderpahar_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'chaderpahar'),
    ));
}

add_theme_support( 'post-thumbnails' );
add_action('after_setup_theme', 'chaderpahar_register_menus');

// Add custom classes to menu items
function add_menu_link_class($atts, $item, $args) {
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function add_menu_list_item_class($classes, $item, $args) {
    if (property_exists($args, 'add_li_class')) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);

// Register Custom Post Type for Videos
function register_videos_post_type() {
    $labels = array(
        'name'                  => 'Videos',
        'singular_name'         => 'Video',
        'menu_name'             => 'Videos',
        'name_admin_bar'        => 'Video',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Video',
        'new_item'              => 'New Video',
        'edit_item'             => 'Edit Video',
        'view_item'             => 'View Video',
        'all_items'             => 'All Videos',
        'search_items'          => 'Search Videos',
        'not_found'             => 'No videos found.',
        'not_found_in_trash'    => 'No videos found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'videos'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-video-alt3',
        'supports'              => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('videos', $args);
}
add_action('init', 'register_videos_post_type');

// Register Custom Post Type for Photos
function register_photos_post_type() {
    $labels = array(
        'name'                  => 'Photos',
        'singular_name'         => 'Photo',
        'menu_name'             => 'Photos',
        'name_admin_bar'        => 'Photo',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Photo',
        'new_item'              => 'New Photo',
        'edit_item'             => 'Edit Photo',
        'view_item'             => 'View Photo',
        'all_items'             => 'All Photos',
        'search_items'          => 'Search Photos',
        'not_found'             => 'No photos found.',
        'not_found_in_trash'    => 'No photos found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'photos'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-format-gallery',
        'supports'              => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('photos', $args);
}
add_action('init', 'register_photos_post_type');

// Add meta box for YouTube URL
function add_youtube_url_meta_box() {
    add_meta_box(
        'youtube_url_meta_box',
        'YouTube Video URL',
        'youtube_url_meta_box_callback',
        'videos',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_youtube_url_meta_box');

// Meta box callback function
function youtube_url_meta_box_callback($post) {
    wp_nonce_field('youtube_url_meta_box', 'youtube_url_meta_box_nonce');
    $youtube_url = get_post_meta($post->ID, '_youtube_url', true);
    ?>
    <label for="youtube_url">Enter YouTube Video URL:</label>
    <input type="text" id="youtube_url" name="youtube_url" value="<?php echo esc_attr($youtube_url); ?>" style="width: 100%; padding: 5px;" placeholder="https://www.youtube.com/watch?v=...">
    <p class="description">Paste the full YouTube video URL here.</p>
    <?php
}

// Save YouTube URL meta data
function save_youtube_url_meta_box_data($post_id) {
    if (!isset($_POST['youtube_url_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['youtube_url_meta_box_nonce'], 'youtube_url_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['youtube_url'])) {
        update_post_meta($post_id, '_youtube_url', sanitize_text_field($_POST['youtube_url']));
    }
}
add_action('save_post', 'save_youtube_url_meta_box_data');

// Convert English date to Bengali
function convert_to_bengali_date($englishDate) {
    $engDigits  = ['0','1','2','3','4','5','6','7','8','9'];
    $bngDigits  = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];

    $engMonths = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    $bngMonths = [
        'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন',
        'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'
    ];

    $bengaliDate = str_replace($engDigits, $bngDigits, $englishDate);
    $bengaliDate = str_replace($engMonths, $bngMonths, $bengaliDate);

    return $bengaliDate;
}
add_filter('get_the_date', 'convert_to_bengali_date');
add_filter('the_date', 'convert_to_bengali_date');
add_filter('get_the_time', 'convert_to_bengali_date');
add_filter('the_time', 'convert_to_bengali_date');

// Convert English numbers to Bengali
function convert_to_bengali_number($number) {
    $engDigits = ['0','1','2','3','4','5','6','7','8','9'];
    $bngDigits = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
    return str_replace($engDigits, $bngDigits, (string)$number);
}

// Enable pagination on page templates
function enable_page_pagination() {
    global $wp_rewrite;
    $wp_rewrite->add_rule('(.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
}
add_action('init', 'enable_page_pagination');

// Add 'paged' query var support
function add_paged_query_var($vars) {
    $vars[] = 'paged';
    return $vars;
}
add_filter('query_vars', 'add_paged_query_var');

?>
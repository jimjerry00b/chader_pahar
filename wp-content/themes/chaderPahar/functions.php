<?php

// Register Navigation Menus
function chaderpahar_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'chaderpahar'),
    ));
}

add_theme_support( 'post-thumbnails' );
add_post_type_support( 'post', 'page-attributes' );
add_action('after_setup_theme', 'chaderpahar_register_menus');

// Set posts per page for goddo category
function chaderpahar_goddo_posts_per_page( $query ) {
    if ( !is_admin() && $query->is_main_query() && $query->is_category('goddo') ) {
        $query->set( 'posts_per_page', 9 );
    }

    // Keep main query pagination in sync with the custom child-category template.
    if ( !is_admin() && $query->is_main_query() && $query->is_category('shishu-shahitto') ) {
        $query->set( 'posts_per_page', 1 );
    }

    if ( !is_admin() && $query->is_main_query() && $query->is_category('pradarshany') ) {
        $query->set( 'posts_per_page', 9 );
    }

    if ( !is_admin() && $query->is_main_query() && $query->is_category('godya') ) {
        $query->set( 'posts_per_page', 9 );
    }

    if ( !is_admin() && $query->is_main_query() && $query->is_category('probondho') ) {
        $query->set( 'posts_per_page', 9 );
    }
}
add_action( 'pre_get_posts', 'chaderpahar_goddo_posts_per_page' );

// Create OTP table on theme activation
function create_otp_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'otp';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        otp varchar(6) NOT NULL,
        expires_at datetime NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY email (email),
        KEY expires_at (expires_at)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'create_otp_table');
// Also run on init to ensure table exists
add_action('init', 'create_otp_table', 1);

// Create members table
function create_members_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'members';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(20) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        UNIQUE KEY email (email),
        KEY phone (phone)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_switch_theme', 'create_members_table');
add_action('init', 'create_members_table', 1);

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

// Extract YouTube video ID from URL
function get_youtube_id_from_url($url) {
    preg_match('/[\?\&]v=([^\?\&]+)/', $url, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
    preg_match('/youtu\.be\/([^\?\&]+)/', $url, $matches);
    return isset($matches[1]) ? $matches[1] : '';
}

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

// Add meta box for custom author field on Posts
function add_custom_author_meta_box() {
    add_meta_box(
        'custom_author_meta_box',
        'লেখক (Author)',
        'custom_author_meta_box_callback',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_author_meta_box');

// Meta box callback
function custom_author_meta_box_callback($post) {
    wp_nonce_field('custom_author_meta_box', 'custom_author_meta_box_nonce');
    $custom_author = get_post_meta($post->ID, '_custom_author', true);
    $custom_class  = get_post_meta($post->ID, '_custom_class', true);
    ?>
    <label for="custom_author"><strong>লেখকের নাম:</strong></label>
    <input type="text" id="custom_author" name="custom_author" value="<?php echo esc_attr($custom_author); ?>" style="width: 100%; padding: 5px; margin-top: 4px;" placeholder="লেখকের নাম লিখুন">
    <p class="description">এখানে লেখকের নাম লিখুন। এটি সাইটে প্রদর্শিত হবে।</p>
    <br>
    <label for="custom_class"><strong>শ্রেণী:</strong></label>
    <input type="text" id="custom_class" name="custom_class" value="<?php echo esc_attr($custom_class); ?>" style="width: 100%; padding: 5px; margin-top: 4px;" placeholder="শ্রেণী লিখুন (যেমন: ৭ম শ্রেণী)">
    <p class="description">এখানে শ্রেণী লিখুন। এটি সাইটে প্রদর্শিত হবে।</p>
    <?php
}

// Save custom author meta data
function save_custom_author_meta_box_data($post_id) {
    if (!isset($_POST['custom_author_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['custom_author_meta_box_nonce'], 'custom_author_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['custom_author'])) {
        update_post_meta($post_id, '_custom_author', sanitize_text_field($_POST['custom_author']));
    }
    if (isset($_POST['custom_class'])) {
        update_post_meta($post_id, '_custom_class', sanitize_text_field($_POST['custom_class']));
    }
}
add_action('save_post', 'save_custom_author_meta_box_data');

// ── Register Custom Post Type: Slider ──
function register_slider_post_type() {
    $labels = array(
        'name'               => 'Slider',
        'singular_name'      => 'Slide',
        'menu_name'          => 'Slider',
        'name_admin_bar'     => 'Slide',
        'add_new'            => 'Add New Slide',
        'add_new_item'       => 'Add New Slide',
        'new_item'           => 'New Slide',
        'edit_item'          => 'Edit Slide',
        'view_item'          => 'View Slide',
        'all_items'          => 'All Slides',
        'search_items'       => 'Search Slides',
        'not_found'          => 'No slides found.',
        'not_found_in_trash' => 'No slides found in Trash.',
        'featured_image'     => 'Slide Image',
        'set_featured_image'  => 'Set slide image',
        'remove_featured_image' => 'Remove slide image',
        'use_featured_image'    => 'Use as slide image',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array( 'title', 'thumbnail', 'page-attributes' ),
    );

    register_post_type( 'slider', $args );
}
add_action( 'init', 'register_slider_post_type' );

// Slider meta box: Author + Custom Link
function add_slider_meta_boxes() {
    add_meta_box(
        'slider_details_meta_box',
        'Slide Details',
        'slider_details_meta_box_callback',
        'slider',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_slider_meta_boxes' );

function slider_details_meta_box_callback( $post ) {
    wp_nonce_field( 'slider_details_meta_box', 'slider_details_meta_box_nonce' );
    $slider_author = get_post_meta( $post->ID, '_slider_author', true );
    $slider_link   = get_post_meta( $post->ID, '_slider_link', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="slider_author">Author Name:</label></th>
            <td>
                <input type="text" id="slider_author" name="slider_author"
                       value="<?php echo esc_attr( $slider_author ); ?>"
                       class="regular-text" placeholder="Enter author name">
                <p class="description">Displayed as the author on the slide.</p>
            </td>
        </tr>
        <tr>
            <th><label for="slider_link">Link URL:</label></th>
            <td>
                <input type="url" id="slider_link" name="slider_link"
                       value="<?php echo esc_url( $slider_link ); ?>"
                       class="regular-text" placeholder="https://...">
                <p class="description">Where the slide links to when clicked. Leave empty for no link.</p>
            </td>
        </tr>
    </table>
    <?php
}

function save_slider_details_meta_box( $post_id ) {
    if ( ! isset( $_POST['slider_details_meta_box_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['slider_details_meta_box_nonce'], 'slider_details_meta_box' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    if ( get_post_type( $post_id ) !== 'slider' ) {
        return;
    }
    if ( isset( $_POST['slider_author'] ) ) {
        update_post_meta( $post_id, '_slider_author', sanitize_text_field( $_POST['slider_author'] ) );
    }
    if ( isset( $_POST['slider_link'] ) ) {
        update_post_meta( $post_id, '_slider_link', esc_url_raw( $_POST['slider_link'] ) );
    }
}
add_action( 'save_post', 'save_slider_details_meta_box' );

// Show slider thumbnail & order columns in admin list
function slider_admin_columns( $columns ) {
    $new = array();
    foreach ( $columns as $key => $val ) {
        if ( $key === 'title' ) {
            $new['slider_thumb'] = 'Image';
        }
        $new[ $key ] = $val;
        if ( $key === 'title' ) {
            $new['slider_author_col'] = 'Author';
            $new['menu_order']        = 'Order';
        }
    }
    unset( $new['date'] );
    $new['date'] = $columns['date'];
    return $new;
}
add_filter( 'manage_slider_posts_columns', 'slider_admin_columns' );

function slider_admin_column_content( $column, $post_id ) {
    if ( $column === 'slider_thumb' ) {
        $thumb = get_the_post_thumbnail( $post_id, array( 60, 60 ) );
        echo $thumb ? $thumb : '—';
    }
    if ( $column === 'slider_author_col' ) {
        echo esc_html( get_post_meta( $post_id, '_slider_author', true ) );
    }
    if ( $column === 'menu_order' ) {
        echo intval( get_post_field( 'menu_order', $post_id ) );
    }
}
add_action( 'manage_slider_posts_custom_column', 'slider_admin_column_content', 10, 2 );

function slider_sortable_columns( $columns ) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-slider_sortable_columns', 'slider_sortable_columns' );

// ── Post Admin: Order Column (like Slider) ──
function post_admin_order_column( $columns ) {
    $new = array();
    foreach ( $columns as $key => $val ) {
        $new[ $key ] = $val;
        if ( $key === 'title' ) {
            $new['menu_order'] = 'Order';
        }
    }
    return $new;
}
add_filter( 'manage_posts_columns', 'post_admin_order_column' );

function post_admin_order_column_content( $column, $post_id ) {
    if ( $column === 'menu_order' ) {
        echo intval( get_post_field( 'menu_order', $post_id ) );
    }
}
add_action( 'manage_posts_custom_column', 'post_admin_order_column_content', 10, 2 );

function post_admin_sortable_order_column( $columns ) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'post_admin_sortable_order_column' );

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

// AJAX Handler for Sending OTP
function handle_send_otp_ajax() {
    // Validate input
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    
    if (empty($email) || empty($phone)) {
        wp_send_json_error([
            'message' => 'Email and phone are required'
        ], 400);
    }
    
    // Validate email format
    if (!is_email($email)) {
        wp_send_json_error([
            'message' => 'Invalid email format'
        ], 400);
    }
    
    // Generate 6-digit OTP
    $otp = sprintf('%06d', mt_rand(0, 999999));
    
    // Store OTP in database
    global $wpdb;
    $table_name = $wpdb->prefix . 'otp';
    
    // Calculate expiration time (5 minutes from now)
    $expires_at = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    
    // Delete any existing OTP for this email
    $wpdb->delete($table_name, array('email' => $email));
    
    // Insert new OTP
    $wpdb->insert(
        $table_name,
        array(
            'email' => $email,
            'otp' => $otp,
            'expires_at' => $expires_at
        ),
        array('%s', '%s', '%s')
    );
    
    if ($wpdb->last_error) {
        error_log('Failed to insert OTP: ' . $wpdb->last_error);
        wp_send_json_error([
            'message' => 'Failed to store OTP'
        ], 500);
    }
    
    // Send OTP via email
    $subject = 'Your OTP Code - Chander Pahar';
    $message = "Hello $name,\n\nYour OTP code is: $otp\n\nThis code will expire in 5 minutes.\n\nThank you,\nChander Pahar Team";
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    // Send email
    $email_sent = wp_mail($email, $subject, $message, $headers);
    
    if (!$email_sent) {
        //error_log('Failed to send OTP email to: ' . $email);
        die('Failed to send OTP email to: ' . $email);
    }
    
    // Success response (return OTP for development - remove in production)
    wp_send_json_success([
        'message' => 'OTP sent successfully',
        'email' => $email,
        // 'otp' => $otp
    ]);
}

// Register AJAX handlers for both logged-in and non-logged-in users
add_action('wp_ajax_send_otp', 'handle_send_otp_ajax');
add_action('wp_ajax_nopriv_send_otp', 'handle_send_otp_ajax');

// AJAX Handler for Verifying OTP
function handle_verify_otp_ajax() {
    // Validate input
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $otp = isset($_POST['otp']) ? sanitize_text_field($_POST['otp']) : '';
    
    if (empty($email) || empty($otp)) {
        wp_send_json_error([
            'message' => 'Email and OTP are required'
        ], 400);
    }
    
    // Verify OTP from database (also deletes it if valid)
    $is_valid = verify_otp_from_database($email, $otp);
    
    if ($is_valid) {
        wp_send_json_success([
            'message' => 'OTP verified successfully'
        ]);
    } else {
        wp_send_json_error([
            'message' => 'Invalid or expired OTP'
        ], 400);
    }
}

// Register AJAX handlers for OTP verification
add_action('wp_ajax_verify_otp', 'handle_verify_otp_ajax');
add_action('wp_ajax_nopriv_verify_otp', 'handle_verify_otp_ajax');

// AJAX Handler for Saving Member Registration
function handle_save_member_ajax() {
    // Validate input
    $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    
    if (empty($name) || empty($email) || empty($phone)) {
        wp_send_json_error([
            'message' => 'Name, email and phone are required'
        ], 400);
    }
    
    // Validate email format
    if (!is_email($email)) {
        wp_send_json_error([
            'message' => 'Invalid email format'
        ], 400);
    }
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'members';
    
    // Check if email already exists
    $existing = $wpdb->get_var($wpdb->prepare(
        "SELECT id FROM $table_name WHERE email = %s",
        $email
    ));
    
    if ($existing) {
        wp_send_json_error([
            'message' => 'Email already registered'
        ], 400);
    }
    
    // Insert member data
    $inserted = $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        ),
        array('%s', '%s', '%s')
    );
    
    if ($inserted === false) {
        error_log('Failed to insert member: ' . $wpdb->last_error);
        wp_send_json_error([
            'message' => 'Failed to save registration data'
        ], 500);
    }
    
    wp_send_json_success([
        'message' => 'Registration saved successfully',
        'member_id' => $wpdb->insert_id
    ]);
}

// Register AJAX handlers for member registration
add_action('wp_ajax_save_member', 'handle_save_member_ajax');
add_action('wp_ajax_nopriv_save_member', 'handle_save_member_ajax');

// Helper function to verify OTP
function verify_otp_from_database($email, $otp) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'otp';
    
    // Get the OTP record for this email
    $result = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM $table_name WHERE email = %s AND otp = %s ORDER BY id DESC LIMIT 1",
        $email,
        $otp
    ));
    
    if (!$result) {
        return false; // OTP not found
    }
    
    // Check if OTP has expired
    $current_time = current_time('mysql');
    if ($current_time > $result->expires_at) {
        // Delete expired OTP
        $wpdb->delete($table_name, array('id' => $result->id));
        return false; // OTP expired
    }
    
    // OTP is valid - delete it to prevent reuse
    $wpdb->delete($table_name, array('id' => $result->id));
    
    return true; // OTP is valid
}

// Clean up expired OTPs (runs daily)
function cleanup_expired_otps() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'otp';
    $current_time = current_time('mysql');
    
    $wpdb->query($wpdb->prepare(
        "DELETE FROM $table_name WHERE expires_at < %s",
        $current_time
    ));
}
// Schedule cleanup to run daily
if (!wp_next_scheduled('cleanup_expired_otps_event')) {
    wp_schedule_event(time(), 'daily', 'cleanup_expired_otps_event');
}
add_action('cleanup_expired_otps_event', 'cleanup_expired_otps');

// Add Members admin menu
function add_members_admin_menu() {
    add_menu_page(
        'Members',                    // Page title
        'Members',                    // Menu title
        'manage_options',            // Capability required
        'members-management',        // Menu slug
        'members_list_page',         // Callback function
        'dashicons-groups',          // Icon
        25                           // Position
    );
    
    add_submenu_page(
        'members-management',        // Parent slug
        'All Members',              // Page title
        'All Members',              // Menu title
        'manage_options',           // Capability
        'members-management',       // Menu slug (same as parent)
        'members_list_page'         // Callback
    );
    
    add_submenu_page(
        'members-management',        // Parent slug
        'Edit Member',              // Page title
        null,                       // Menu title (null to hide from menu)
        'manage_options',           // Capability
        'edit-member',              // Menu slug
        'edit_member_page'          // Callback
    );
}
add_action('admin_menu', 'add_members_admin_menu');

// Members list page
function members_list_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'members';
    
    // Handle delete action
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        check_admin_referer('delete_member_' . $id);
        
        $wpdb->delete($table_name, array('id' => $id), array('%d'));
        echo '<div class="notice notice-success is-dismissible"><p>Member deleted successfully!</p></div>';
    }
    
    // Pagination
    $per_page = 20;
    $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
    $offset = ($current_page - 1) * $per_page;
    
    // Get total count
    $total_items = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");
    $total_pages = ceil($total_items / $per_page);
    
    // Get members
    $members = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $table_name ORDER BY created_at DESC LIMIT %d OFFSET %d",
        $per_page,
        $offset
    ));
    
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Members</h1>
        <hr class="wp-header-end">
        
        <?php if ($members): ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Registered On</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($members as $member): ?>
                        <tr>
                            <td><?php echo esc_html($member->id); ?></td>
                            <td><strong><?php echo esc_html($member->name); ?></strong></td>
                            <td><?php echo esc_html($member->email); ?></td>
                            <td><?php echo esc_html($member->phone); ?></td>
                            <td><?php echo esc_html(date('F j, Y, g:i a', strtotime($member->created_at))); ?></td>
                            <td>
                                <a href="<?php echo admin_url('admin.php?page=edit-member&id=' . $member->id); ?>" class="button button-small">Edit</a>
                                <a href="<?php echo wp_nonce_url(admin_url('admin.php?page=members-management&action=delete&id=' . $member->id), 'delete_member_' . $member->id); ?>" 
                                   class="button button-small" 
                                   onclick="return confirm('Are you sure you want to delete this member?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <?php if ($total_pages > 1): ?>
                <div class="tablenav bottom">
                    <div class="tablenav-pages">
                        <?php
                        echo paginate_links(array(
                            'base' => add_query_arg('paged', '%#%'),
                            'format' => '',
                            'prev_text' => __('&laquo; Previous'),
                            'next_text' => __('Next &raquo;'),
                            'total' => $total_pages,
                            'current' => $current_page
                        ));
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            
        <?php else: ?>
            <p>No members found.</p>
        <?php endif; ?>
    </div>
    
    <style>
        .wp-list-table th, .wp-list-table td {
            padding: 10px;
        }
        .tablenav-pages {
            margin: 20px 0;
        }
        .tablenav-pages .pagination-links {
            display: inline-block;
        }
        .tablenav-pages a, .tablenav-pages span {
            padding: 5px 10px;
            margin: 0 2px;
            border: 1px solid #ddd;
            text-decoration: none;
        }
        .tablenav-pages .current {
            background: #2271b1;
            color: white;
        }
    </style>
    <?php
}

// Edit member page
function edit_member_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'members';
    
    if (!isset($_GET['id'])) {
        wp_die('Invalid member ID');
    }
    
    $id = intval($_GET['id']);
    $member = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
    
    if (!$member) {
        wp_die('Member not found');
    }
    
    // Handle form submission
    if (isset($_POST['update_member'])) {
        check_admin_referer('update_member_' . $id);
        
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        
        if (empty($name) || empty($email) || empty($phone)) {
            echo '<div class="notice notice-error is-dismissible"><p>All fields are required!</p></div>';
        } elseif (!is_email($email)) {
            echo '<div class="notice notice-error is-dismissible"><p>Invalid email format!</p></div>';
        } else {
            // Check if email is already used by another member
            $existing = $wpdb->get_var($wpdb->prepare(
                "SELECT id FROM $table_name WHERE email = %s AND id != %d",
                $email,
                $id
            ));
            
            if ($existing) {
                echo '<div class="notice notice-error is-dismissible"><p>Email already in use by another member!</p></div>';
            } else {
                $updated = $wpdb->update(
                    $table_name,
                    array(
                        'name' => $name,
                        'email' => $email,
                        'phone' => $phone
                    ),
                    array('id' => $id),
                    array('%s', '%s', '%s'),
                    array('%d')
                );
                
                if ($updated !== false) {
                    echo '<div class="notice notice-success is-dismissible"><p>Member updated successfully!</p></div>';
                    // Refresh member data
                    $member = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
                } else {
                    echo '<div class="notice notice-error is-dismissible"><p>Failed to update member!</p></div>';
                }
            }
        }
    }
    
    ?>
    <div class="wrap">
        <h1>Edit Member</h1>
        <a href="<?php echo admin_url('admin.php?page=members-management'); ?>" class="page-title-action">← Back to Members</a>
        
        <form method="post" style="max-width: 600px; margin-top: 20px;">
            <?php wp_nonce_field('update_member_' . $id); ?>
            
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="name">Name</label></th>
                    <td>
                        <input type="text" id="name" name="name" value="<?php echo esc_attr($member->name); ?>" class="regular-text" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="email">Email</label></th>
                    <td>
                        <input type="email" id="email" name="email" value="<?php echo esc_attr($member->email); ?>" class="regular-text" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="phone">Phone</label></th>
                    <td>
                        <input type="text" id="phone" name="phone" value="<?php echo esc_attr($member->phone); ?>" class="regular-text" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Registered On</th>
                    <td>
                        <p class="description"><?php echo esc_html(date('F j, Y, g:i a', strtotime($member->created_at))); ?></p>
                    </td>
                </tr>
            </table>
            
            <p class="submit">
                <input type="submit" name="update_member" class="button button-primary" value="Update Member">
                <a href="<?php echo admin_url('admin.php?page=members-management'); ?>" class="button">Cancel</a>
            </p>
        </form>
    </div>
    <?php
}

// ── পরিচিতি গ্যালারি Admin Page ──

function parichiti_gallery_admin_menu() {
    add_theme_page(
        'পরিচিতি গ্যালারি',
        'পরিচিতি গ্যালারি',
        'manage_options',
        'parichiti-gallery',
        'parichiti_gallery_admin_page'
    );
}
add_action( 'admin_menu', 'parichiti_gallery_admin_menu' );

function parichiti_gallery_admin_scripts( $hook ) {
    if ( $hook !== 'appearance_page_parichiti-gallery' ) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script(
        'parichiti-gallery-admin',
        get_template_directory_uri() . '/assets/js/parichiti-gallery-admin.js',
        array( 'jquery', 'jquery-ui-sortable' ),
        '1.0',
        true
    );
    wp_enqueue_style(
        'parichiti-gallery-admin-css',
        false
    );
    // Inline styles for the admin page
    wp_add_inline_style( 'parichiti-gallery-admin-css', '
        .pgallery-images { display: flex; flex-wrap: wrap; gap: 12px; margin: 16px 0; }
        .pgallery-item { position: relative; width: 150px; height: 150px; border: 2px solid #ddd; border-radius: 4px; overflow: hidden; cursor: move; }
        .pgallery-item img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .pgallery-item .pgallery-remove { position: absolute; top: 4px; right: 4px; background: #dc3232; color: #fff; border: none; border-radius: 50%; width: 24px; height: 24px; font-size: 16px; line-height: 22px; text-align: center; cursor: pointer; opacity: 0; transition: opacity .2s; }
        .pgallery-item:hover .pgallery-remove { opacity: 1; }
        .pgallery-item.ui-sortable-helper { box-shadow: 0 4px 12px rgba(0,0,0,.25); }
        .pgallery-item.ui-sortable-placeholder { border: 2px dashed #0073aa; background: #f0f6fc; visibility: visible !important; }
    ' );
}
add_action( 'admin_enqueue_scripts', 'parichiti_gallery_admin_scripts' );

function parichiti_gallery_admin_page() {
    // Handle save
    if ( isset( $_POST['parichiti_gallery_save'] ) ) {
        if ( ! isset( $_POST['parichiti_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['parichiti_gallery_nonce'], 'parichiti_gallery_save' ) ) {
            wp_die( 'Security check failed.' );
        }
        $image_ids = array();
        if ( ! empty( $_POST['parichiti_gallery_ids'] ) ) {
            $image_ids = array_map( 'absint', explode( ',', sanitize_text_field( $_POST['parichiti_gallery_ids'] ) ) );
            $image_ids = array_filter( $image_ids );
        }
        update_option( 'parichiti_gallery_images', $image_ids );

        $per_page = isset( $_POST['parichiti_gallery_per_page'] ) ? absint( $_POST['parichiti_gallery_per_page'] ) : 8;
        if ( $per_page < 1 ) $per_page = 8;
        update_option( 'parichiti_gallery_per_page', $per_page );

        echo '<div class="notice notice-success is-dismissible"><p>গ্যালারি সেভ করা হয়েছে।</p></div>';
    }

    $saved_ids = get_option( 'parichiti_gallery_images', array() );
    $per_page  = get_option( 'parichiti_gallery_per_page', 8 );
    ?>
    <div class="wrap">
        <h1>পরিচিতি গ্যালারি</h1>
        <p>পরিচিতি পৃষ্ঠার "ছবি" ট্যাবে প্রদর্শিত হবে এমন ছবি যুক্ত করুন।</p>

        <form method="post">
            <?php wp_nonce_field( 'parichiti_gallery_save', 'parichiti_gallery_nonce' ); ?>

            <table class="form-table">
                <tr>
                    <th scope="row"><label for="parichiti_gallery_per_page">প্রতি পৃষ্ঠায় ছবি সংখ্যা</label></th>
                    <td>
                        <input type="number" id="parichiti_gallery_per_page" name="parichiti_gallery_per_page" value="<?php echo esc_attr( $per_page ); ?>" min="1" max="50" class="small-text">
                    </td>
                </tr>
            </table>

            <h3>গ্যালারি ছবিসমূহ</h3>
            <div class="pgallery-images" id="pgallery-images">
                <?php
                if ( ! empty( $saved_ids ) ) {
                    foreach ( $saved_ids as $id ) {
                        $url = wp_get_attachment_image_url( $id, 'thumbnail' );
                        if ( $url ) {
                            echo '<div class="pgallery-item" data-id="' . esc_attr( $id ) . '">';
                            echo '<img src="' . esc_url( $url ) . '" alt="">';
                            echo '<button type="button" class="pgallery-remove" title="Remove">&times;</button>';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
            <input type="hidden" name="parichiti_gallery_ids" id="pgallery-ids" value="<?php echo esc_attr( implode( ',', $saved_ids ) ); ?>">

            <p>
                <button type="button" class="button button-secondary" id="pgallery-add">ছবি যুক্ত করুন</button>
            </p>

            <p class="submit">
                <input type="submit" name="parichiti_gallery_save" class="button button-primary" value="সেভ করুন">
            </p>
        </form>
    </div>
    <?php
}

// AJAX handler for kichirmichir pagination
function kichirmichir_ajax_pagination() {
    $paged  = isset( $_POST['paged'] ) ? absint( $_POST['paged'] ) : 1;
    $cat_id = isset( $_POST['cat_id'] ) ? absint( $_POST['cat_id'] ) : 0;

    if ( ! $cat_id ) {
        wp_send_json_error();
    }

    $query = new WP_Query( array(
        'cat'            => $cat_id,
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'paged'          => $paged,
    ) );

    ob_start();

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-md-4 d-flex">
                <a href="<?php the_permalink(); ?>" class="goddo-card h-100 w-100">
                    <div class="goddo-card-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium_large', array( 'class' => 'img-fluid' ) ); ?>
                        <?php else : ?>
                            <img class="img-fluid" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/placeholder.jpg" alt="">
                        <?php endif; ?>
                    </div>
                    <div class="goddo-card-body p-4">
                        <h5 class="goddo-card-title"><?php the_title(); ?></h5>
                        <?php $custom_author = get_post_meta( get_the_ID(), '_custom_author', true ); ?>
                        <p class="goddo-card-desc"><?php echo $custom_author ? esc_html( $custom_author ) : 'সাধারণ লেখক'; ?></p>
                    </div>
                </a>
            </div>
        <?php endwhile;
    else : ?>
        <p>No posts found in this category.</p>
    <?php endif;

    $posts_html = ob_get_clean();

    ob_start();
    if ( $query->max_num_pages > 1 ) {
        echo paginate_links( array(
            'total'     => $query->max_num_pages,
            'current'   => $paged,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
            'type'      => 'list',
            'mid_size'  => 2,
            'end_size'  => 1,
        ) );
    }
    $pagination_html = ob_get_clean();

    wp_reset_postdata();

    wp_send_json_success( array(
        'posts'      => $posts_html,
        'pagination' => $pagination_html,
        'max_pages'  => $query->max_num_pages,
    ) );
}
add_action( 'wp_ajax_kichirmichir_pagination', 'kichirmichir_ajax_pagination' );
add_action( 'wp_ajax_nopriv_kichirmichir_pagination', 'kichirmichir_ajax_pagination' );

?>
<?php

// Register Navigation Menus
function chaderpahar_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'chaderpahar'),
    ));
}

add_theme_support( 'post-thumbnails' );
add_action('after_setup_theme', 'chaderpahar_register_menus');

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
        'otp' => $otp
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

?>
<?php

// Register Navigation Menus
function chaderpahar_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'chaderpahar'),
    ));
}
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

?>
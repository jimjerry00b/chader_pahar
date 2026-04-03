<!doctype html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>

    <?php if ( is_singular() ) : ?>
      <?php
        $og_thumb_id = get_post_thumbnail_id();
        $og_image_raw = $og_thumb_id ? wp_get_attachment_url( $og_thumb_id ) : '';
        // Encode non-ASCII characters in the filename for Facebook compatibility
        if ( $og_image_raw ) {
            $og_image_parts = explode( '/', $og_image_raw );
            $og_image_parts[ count($og_image_parts) - 1 ] = rawurlencode( $og_image_parts[ count($og_image_parts) - 1 ] );
            $og_image_url = implode( '/', $og_image_parts );
        } else {
            $og_image_url = '';
        }
        $og_desc = has_excerpt() ? get_the_excerpt() : wp_trim_words( strip_tags( get_the_content() ), 30, '...' );
      ?>
      <meta property="og:type" content="article" />
      <meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>" />
      <meta property="og:description" content="<?php echo esc_attr( $og_desc ); ?>" />
      <meta property="og:url" content="<?php echo esc_url( get_permalink() ); ?>" />
      <?php if ( $og_image_url ) : ?>
        <meta property="og:image" content="<?php echo esc_url( $og_image_url ); ?>" />
        <?php $og_meta = wp_get_attachment_metadata( $og_thumb_id ); ?>
        <?php if ( $og_meta && isset( $og_meta['width'], $og_meta['height'] ) ) : ?>
          <meta property="og:image:width" content="<?php echo (int) $og_meta['width']; ?>">
          <meta property="og:image:height" content="<?php echo (int) $og_meta['height']; ?>">
        <?php endif; ?>
      <?php endif; ?>
      <meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo('name') ); ?>" />
    <?php endif; ?>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?v=10">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>

    <button id="scrollTopBtn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/scroll_top.svg" style=" width: 20px; height: auto; " alt="Scroll to Top"></button>
    
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-03 1.svg" alt="Chader Pahar Logo" class="img-fluid" style="max-width: 215px;"></a>
                    <p class="site-description">সাহিত্য, সংস্কৃতি ও চিন্তা-শিল্পের পত্রিকা</p>
                </div>
            </div>
        </div>
    </section>

    <nav id="main_menu" class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler main-menu-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#primaryMenu" aria-controls="primaryMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="primaryMenu">
                <?php
                $menu_locations = get_nav_menu_locations();
                $resolved_menu_id = 0;

                if ( ! empty( $menu_locations['primary-menu'] ) ) {
                    $resolved_menu_id = $menu_locations['primary-menu'];
                } elseif ( ! empty( $menu_locations['primary'] ) ) {
                    $resolved_menu_id = $menu_locations['primary'];
                }

                wp_nav_menu(array(
                    'theme_location'  => ! empty( $menu_locations['primary-menu'] ) ? 'primary-menu' : 'primary',
                    'menu'            => $resolved_menu_id,
                    'depth'           => 2,
                    'container'       => false,
                    'menu_class'      => 'navbar-nav justify-content-center align-items-lg-center w-100 py-2',
                    'add_li_class'    => 'nav-item',
                    'link_class'      => 'nav-link',
                    'fallback_cb'     => 'wp_page_menu',
                ));
                ?>
            </div>
        </div>
    </nav>
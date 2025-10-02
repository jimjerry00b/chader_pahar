<!doctype html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <button id="scrollTopBtn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/scroll_top.svg" style=" width: 20px; height: auto; " alt="Scroll to Top"></button>
    <section id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 text-center">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Chader Pahar Logo" class="img-fluid my-4" style="max-width: 150px;">
                </div>

                <div class="col-md-10 text-center d-flex align-items-center justify-content-center">
                    <h2 class="my-4">বইয়ের সঙ্গে কাটুক সময় ...</h2>
                </div>
            </div>
        </div>
    </section>

    <nav>
        <div class="container">
            <!-- <ul class="nav justify-content-center py-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">প্রচ্ছদ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">পরিচিতি</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">প্রতিবেদন</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ভিডিও</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ছবি</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">যোগাযোগ</a>
                </li>
            </ul> -->

            <?php
            wp_nav_menu(array(
                'theme_location'  => 'primary',
                'depth'           => 2,
                'container'       => false,
                'menu_class'      => 'nav justify-content-center py-2',
                'add_li_class'    => 'nav-item',
                'link_class'      => 'nav-link',
                'fallback_cb'     => false
            ));
            ?>
        </div>
    </nav>
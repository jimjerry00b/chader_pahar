<?php get_header(); ?>

<?php
/*
    Template Name: প্রচ্ছদ
*/
?>

    <section id="section-featured-slider" class="py-4 py-md-5">
        <div class="container">
            <div class="cp-slider-shell" data-cp-slider>
                <button class="cp-slider-arrow cp-slider-prev" type="button" aria-label="Previous" data-cp-prev>
                    <span aria-hidden="true">&#10094;</span>
                </button>

                <div class="cp-slider-viewport">
                    <div class="cp-slider-track" data-cp-track>
                        <?php
                        $featured_query = new WP_Query( array(
                            'post_type'      => 'slider',
                            'post_status'    => 'publish',
                            'posts_per_page' => 20,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                        ) );

                        if ( $featured_query->have_posts() ) :
                            while ( $featured_query->have_posts() ) : $featured_query->the_post();
                                $slider_thumb  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                                $slider_author = get_post_meta( get_the_ID(), '_slider_author', true );
                                $slider_link   = get_post_meta( get_the_ID(), '_slider_link', true );
                        ?>
                            <article class="cp-slide-card" data-cp-card>
                                <a href="<?php echo $slider_link ? esc_url( $slider_link ) : '#'; ?>" class="cp-slide-link">
                                    <div class="cp-slide-image-wrap">
                                        <?php if ( $slider_thumb ) : ?>
                                            <img src="<?php echo esc_url( $slider_thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="cp-slide-image">
                                        <?php else : ?>
                                            <div class="cp-slide-no-image"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="cp-slide-content">
                                        <h3 class="cp-slide-title"><?php the_title(); ?></h3>
                                        <?php if ( $slider_author ) : ?>
                                            <p class="cp-slide-author"><?php echo esc_html( $slider_author ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </article>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            for ( $slider_i = 0; $slider_i < 5; $slider_i++ ) :
                        ?>
                            <article class="cp-slide-card" data-cp-card>
                                <a href="#" class="cp-slide-link">
                                    <div class="cp-slide-image-wrap">
                                        <div class="cp-slide-no-image"></div>
                                    </div>
                                    <div class="cp-slide-content">
                                        <h3 class="cp-slide-title">নতুন লেখা শীঘ্রই আসছে</h3>
                                        <p class="cp-slide-author">চাদের পাহাড় সম্পাদকীয়</p>
                                    </div>
                                </a>
                            </article>
                        <?php
                            endfor;
                        endif;
                        ?>
                    </div>
                </div>

                <button class="cp-slider-arrow cp-slider-next" type="button" aria-label="Next" data-cp-next>
                    <span aria-hidden="true">&#10095;</span>
                </button>
            </div>
            <div class="cp-slider-dots" data-cp-dots></div>
        </div>
    </section>

    

    <section id="section-gadya" class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">গদ্য</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'post__in'       => array( 155, 159, 163 ),
                    'posts_per_page' => 3,
                    'orderby'        => 'post__in',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="<?php the_permalink(); ?>" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="#" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php echo esc_html( $placeholder_titles[ $j ] ); ?></h5>
                                    <p class="gadya-desc"><?php echo esc_html( $placeholder_authors[ $j ] ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endfor;
                endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'গদ্য' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো গদ্য</a>
                </div>
            </div>
        </div>
    </section>


    <section id="section-prabandha" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">প্রবন্ধ</h2>
                </div>
            </div>
            <div class="row">
                <?php
                // $gadya_query = new WP_Query( array(
                //     'category_name'  => 'probondho',
                //     'posts_per_page' => 3,
                //     'orderby'        => 'menu_order',
                //     'order'          => 'ASC',
                // ) );

                $gadya_query = new WP_Query( array(
                    'post__in'       => array( 191, 186, 268),
                    'posts_per_page' => 3,
                    'orderby'        => 'post__in',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="<?php the_permalink(); ?>" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="#" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php echo esc_html( $placeholder_titles[ $j ] ); ?></h5>
                                    <p class="gadya-desc"><?php echo esc_html( $placeholder_authors[ $j ] ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endfor;
                endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'প্রবন্ধ' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো প্রবন্ধ</a>
                </div>
            </div>
        </div>
    </section>


    <section id="section-golpo" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">গল্প</h2>
                </div>
            </div>
            <div class="row">
                <?php
                // $gadya_query = new WP_Query( array(
                //     'category_name'  => 'golpo',
                //     'posts_per_page' => 3,
                //     'orderby'        => 'menu_order',
                //     'order'          => 'ASC',
                // ) );

                $gadya_query = new WP_Query( array(
                    'post__in'       => array( 254, 84, 82),
                    'posts_per_page' => 3,
                    'orderby'        => 'post__in',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="<?php the_permalink(); ?>" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="#" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php echo esc_html( $placeholder_titles[ $j ] ); ?></h5>
                                    <p class="gadya-desc"><?php echo esc_html( $placeholder_authors[ $j ] ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endfor;
                endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'গল্প' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো গল্প</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="section-kobita" class="py-5" style="background: url('<?= get_template_directory_uri(); ?>/assets/images/bg_03.jpg');       
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">কবিতা</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'category_name'  => 'kobita',
                    'posts_per_page' => 6,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="<?php the_permalink(); ?>" class="gadya-card bg-white h-100">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="#" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php echo esc_html( $placeholder_titles[ $j ] ); ?></h5>
                                    <p class="gadya-desc"><?php echo esc_html( $placeholder_authors[ $j ] ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endfor;
                endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'কবিতা' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো কবিতা</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="section-protibedon" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">প্রতিবেদন</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'category_name'  => 'report',
                    'posts_per_page' => 3,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="<?php the_permalink(); ?>" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="#" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php echo esc_html( $placeholder_titles[ $j ] ); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endfor;
                endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'প্রতিবেদন' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো প্রতিবেদন</a>
                </div>
            </div>
        </div>
    </section>

    <section id="section-kichirmichir-hp" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">কিচিরমিচির</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'category_name'  => 'kichirmichir',
                    'posts_per_page' => 3,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="<?php the_permalink(); ?>" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta( get_the_ID(), '_custom_author', true ); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4 d-flex">
                            <a href="#" class="gadya-card h-100">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info p-3">
                                    <h5><?php echo esc_html( $placeholder_titles[ $j ] ); ?></h5>
                                    <p class="gadya-desc"><?php echo esc_html( $placeholder_authors[ $j ] ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endfor;
                endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'kichirmichir' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো কিচিরমিচির</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── লেখা আহবান (Call for Writing) ── -->
    <section id="section-lekha-ahban" class="py-0 mt-5">
        <div class="lekha-ahban-wrapper">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-md-6 text-center text-md-end lekha-ahban-left py-3">
                        <h2 class="lekha-ahban-title mb-0">লেখা আহবান</h2>
                    </div>
                    <div class="col-12 col-md-6 lekha-ahban-right py-3">
                        <p class="mb-1">আপনার লেখা গল্প, কবিতা, প্রবন্ধ, অনুবাদা, অনুগল্প</p>
                        <p class="mb-1">আমাদের ওয়েবসাইট প্রকাশ করার জন্য লেখা পাঠান।</p>
                        <p class="mb-1">আপনার ফোন নম্বর ও ঠিকানাসহ আমাদের ঠিকানায় ইমেইল করুন।</p>
                        <p class="mb-0">ইমেইল : <a href="mailto:contact@chaderpahar.com" class="lekha-email-link">contact@chaderpahar.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── ভিডিও (Video Gallery) ── -->
    <section id="section-video" class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="video-section-title">ভিডিও</h2>
                </div>
            </div>
            <div class="row g-3 bg-white p-2">
                <?php
                $video_query = new WP_Query( array(
                    'post_type'      => 'videos',
                    'posts_per_page' => 6,
                    'meta_query'     => array(
                        array(
                            'key'     => '_youtube_url',
                            'compare' => 'EXISTS',
                        ),
                    ),
                    'orderby' => 'date',
                    'order'   => 'DESC',
                ) );

                if ( $video_query->have_posts() ) :
                    while ( $video_query->have_posts() ) : $video_query->the_post();
                        $youtube_url = get_post_meta( get_the_ID(), '_youtube_url', true );
                        $video_id    = get_youtube_id_from_url( $youtube_url );
                        if ( $video_id ) :
                ?>
                    <div class="col-12 col-md-4">
                        <div class="hp-video-thumb" data-bs-toggle="modal" data-bs-target="#hpVideoModal" data-video-id="<?php echo esc_attr( $video_id ); ?>" data-video-title="<?php echo esc_attr( get_the_title() ); ?>">
                            <img src="https://img.youtube.com/vi/<?php echo esc_attr( $video_id ); ?>/maxresdefault.jpg" alt="<?php echo esc_attr( get_the_title() ); ?>" class="img-fluid">
                            <div class="hp-play-icon">
                                <i class="bi bi-play-circle-fill"></i>
                            </div>
                            <div class="hp-video-title-overlay">
                                <h5><?php the_title(); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div class="col-12">
                        <p class="text-center text-white">কোনো ভিডিও পাওয়া যায়নি।</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-4">
                    <a href="<?php
                        $video_page = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'ভিডিও.php' ) );
                        echo $video_page ? esc_url( get_permalink( $video_page[0]->ID ) ) : '#';
                    ?>" class="btn video-more-btn px-5 py-2">আরো ভিডিও</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Modal (Homepage) -->
    <div class="modal fade" id="hpVideoModal" tabindex="-1" aria-labelledby="hpVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hpVideoModalLabel">ভিডিও</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ratio ratio-16x9">
                        <iframe id="hpVideoFrame" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ── কিচিরমিচির Banner ── -->
    <section id="section-kichirmichir" class="py-0">
        <div class="kichirmichir-wrapper">
            <div class="row g-0">
                <div class="col-12 col-md-6 kichirmichir-left d-flex align-items-center justify-content-center">
                    <div class="kichirmichir-content px-4 px-md-5 py-4">
                        <h2 class="kichirmichir-title">কিচিরমিচির</h2>
                        <p class="kichirmichir-desc">
                            শিশু কিশোরদের সৃষ্টিশীল লেখা ও<br>
                            শিল্প চর্চা দেখতে পড়ুন<br>
                            আমাদের সব আয়োজন
                        </p>
                        <a href="" class="btn kichirmichir-btn">ক্লিক করুন</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 kichirmichir-right p-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_15.jpg" alt="কিচিরমিচির" class="img-fluid w-100 kichirmichir-img">
                </div>
            </div>
        </div>
    </section>

    

    <style>

        #section-featured-slider {
            background: #efeff1;
        }

        .cp-slider-shell {
            position: relative;
            padding: 0 38px;
        }

        .cp-slider-viewport {
            overflow: hidden;
        }

        .cp-slider-track {
            display: flex;
            gap: 18px;
            transition: transform 0.4s ease;
            will-change: transform;
        }

        .cp-slide-card {
            flex: 0 0 calc((100% - 36px) / 3);
            background: #fff;
            border: 1px solid #d8d8d8;
            box-shadow: 0 2px 8px #0000003d;
            margin-bottom: 8px;
        }

        .cp-slide-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .cp-slide-image-wrap {
            aspect-ratio: 4 / 3;
            overflow: hidden;
            background: #d8d8d8;
        }

        .cp-slide-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .cp-slide-link:hover .cp-slide-image {
            transform: scale(1.05);
        }

        .cp-slide-no-image {
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ddd, #cfcfcf);
        }

        .cp-slide-content {
            padding: 10px 12px 14px;
            min-height: 88px;
        }

        .cp-slide-title {
            margin: 0 0 5px;
            font-size: 18px;
            line-height: 1.35;
            color: #15356e;
        }

        .cp-slide-author {
            margin: 0;
            font-size: 14px;
            color: #c68a1f;
            line-height: 1.35;
        }

        .cp-slider-arrow {
            position: absolute;
            top: 42%;
            transform: translateY(-50%);
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: #2954a3;
            font-size: 30px;
            line-height: 1;
            padding: 0;
            cursor: pointer;
            z-index: 2;
        }

        .cp-slider-prev {
            left: 0;
        }

        .cp-slider-next {
            right: 0;
        }

        .cp-slider-arrow:disabled {
            opacity: 0.35;
            cursor: default;
        }

        .cp-slider-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 14px;
        }

        .cp-slider-dot {
            width: 9px;
            height: 9px;
            border: none;
            border-radius: 50%;
            background: #bdbdbd;
            padding: 0;
        }

        .cp-slider-dot.is-active {
            background: #0f3d9a;
        }

        @media (max-width: 991px) {
            .cp-slide-card {
                flex: 0 0 calc((100% - 18px) / 2);
            }
        }

        @media (max-width: 575px) {
            .cp-slider-shell {
                padding: 0 30px;
            }

            .cp-slide-card {
                flex: 0 0 100%;
            }

            .cp-slide-title {
                font-size: 17px;
            }

            .cp-slider-arrow {
                top: 40%;
                font-size: 26px;
            }
        }

        /* ── Section Gadya ── */
        #section-gadya {
            background-color: #fff;
        }

        .gadya-section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #222;
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        .gadya-section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: var(--gold-color);
            margin: 6px auto 0;
            border-radius: 2px;
        }

        .gadya-card {
            position: relative;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 8px #0000003d;
        }

        .cp-order-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 30px;
            height: 30px;
            background: var(--gold-color);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
        }

        .gadya-info {
            flex: 1 1 auto;
        }

        .gadya-img-wrapper {
            overflow: hidden;
            aspect-ratio: 4 / 3;
            flex: 0 0 auto;
        }

        .gadya-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.35s ease;
        }

        .gadya-no-thumb {
            width: 100%;
            height: 100%;
            background-color: #e0e0e0;
        }

        .gadya-info h5 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .gadya-card:hover .gadya-img-wrapper img {
            transform: scale(1.06);
        }

        .gadya-info h5 {
            font-size: 20px;
            font-weight: 500;
            color: #222;
            margin: 8px 0 4px;
            line-height: 1.4;
        }

        .gadya-desc {
            font-size: 17px;
            color: var(--gold-color);
            margin: 0;
            line-height: 1.5;
        }

        .gadya-more-btn {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            border-radius: 4px;
            background-color: var(--gold-color);
            border-color: var(--gold-color);
            color: #fff;
        }

        .gadya-more-btn:hover {
            background-color: #e09400;
            border-color: #e09400;
            color: #fff;
        }

        /* ── End Section Gadya ── */

        /* ── Section লেখা আহবান ── */
        #section-lekha-ahban {
            margin-bottom: 0;
        }

        .lekha-ahban-wrapper {
            background-color: #1a1a5e;
            border-top: 5px solid var(--gold-color);
            border-bottom: 5px solid var(--gold-color);
        }

        .lekha-ahban-left {
            border-right: none;
            padding-right: 100px;
        }

        .lekha-ahban-title {
            font-size: 2.2rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.02em;
        }

        .lekha-ahban-right {
            padding-left: 100px;
        }

        .lekha-ahban-right p {
            font-size: 1rem;
            color: #ffffff;
            line-height: 1.7;
        }

        .lekha-email-link {
            color: var(--gold-color);
            text-decoration: none;
            font-weight: 600;
        }

        .lekha-email-link:hover {
            color: #ffc107;
            text-decoration: underline;
        }

        @media (min-width: 768px) {
            .lekha-ahban-left {
                border-right: 2px solid var(--gold-color);
            }
        }

        @media (max-width: 767px) {
            .lekha-ahban-title {
                font-size: 1.6rem;
            }
            .lekha-ahban-right p {
                font-size: 0.9rem;
                text-align: center;
            }
        }
        /* ── End Section লেখা আহবান ── */

        /* ── Section ভিডিও ── */
        #section-video {
            background-color: var(--second-color);
        }

        .video-section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #fff;
            position: relative;
            display: inline-block;
            padding-bottom: 8px;
        }

        .video-section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background-color: var(--gold-color);
            margin: 6px auto 0;
            border-radius: 2px;
        }

        .hp-video-thumb {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .hp-video-thumb:hover {
            transform: scale(1.03);
        }

        .hp-video-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            aspect-ratio: 16 / 9;
        }

        .hp-play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 55px;
            color: rgba(255, 255, 255, 0.85);
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .hp-video-thumb:hover .hp-play-icon {
            color: #ff0000;
            transform: translate(-50%, -50%) scale(1.15);
        }

        .hp-video-title-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            padding: 20px 15px 10px;
            color: #fff;
        }

        .hp-video-title-overlay h5 {
            margin: 0;
            font-size: 14px;
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        .video-more-btn {
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            border-radius: 4px;
            background-color: var(--gold-color);
            border-color: var(--gold-color);
            color: #fff;
        }

        .video-more-btn:hover {
            background-color: #e09400;
            border-color: #e09400;
            color: #fff;
        }
        /* ── End Section ভিডিও ── */

        /* ── Section কিচিরমিচির ── */
        #section-kichirmichir {
            overflow: hidden;
        }

        .kichirmichir-wrapper {
            background-color: var(--gold-color);
        }

        .kichirmichir-left {
            background-color: var(--gold-color);
        }

        .kichirmichir-title {
            font-size: 2.4rem;
            font-weight: 700;
            color: var(--second-color);
            margin-bottom: 12px;
        }

        .kichirmichir-desc {
            font-size: 1.1rem;
            color: #fff;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .kichirmichir-btn {
            font-size: 1rem;
            background-color: var(--second-color);
            color: #fff;
            border: none;
            padding: 10px 30px;
            border-radius: 4px;
        }

        .kichirmichir-btn:hover {
            background-color: #000;
            color: #fff;
        }

        .kichirmichir-right {
            overflow: hidden;
        }

        .kichirmichir-img {
            height: 100%;
            object-fit: cover;
            display: block;
        }

        @media (max-width: 767px) {
            .kichirmichir-title {
                font-size: 1.8rem;
            }
            .kichirmichir-desc {
                font-size: 1rem;
            }
            .kichirmichir-img {
                max-height: 300px;
            }
        }
        /* ── End Section কিচিরমিচির ── */

        .dynamic-color-1{
            height: 35px;
            overflow: hidden;
            padding-top: 4px;
            padding-left: 4px;
        }

        .content-part-1{
            height: 60px;
            overflow: hidden;
        }

        .content-part-2 {
            height: 270px;
            overflow: hidden;
        }

        #section-five a{
            text-decoration: none;
            color: initial;
        }



        @media screen and (max-width: 1199px) {
            .content-part-1{
                height: auto;
            }
            .content-part-2 {
                height: 180px;
            }
        }

        @media screen and (max-width: 768px) {
            .dynamic-color-1{
                height: 28px;
            }
        }

    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliderRoot = document.querySelector('[data-cp-slider]');

        if (sliderRoot) {
            const sliderTrack = sliderRoot.querySelector('[data-cp-track]');
            const sliderCards = sliderRoot.querySelectorAll('[data-cp-card]');
            const prevBtn = sliderRoot.querySelector('[data-cp-prev]');
            const nextBtn = sliderRoot.querySelector('[data-cp-next]');
            const dotsWrap = document.querySelector('[data-cp-dots]');
            const autoplayDelay = 4000;

            let currentPage = 0;
            let totalPages = 1;
            let autoplayTimer = null;

            function getCardsPerPage() {
                if (window.innerWidth < 576) {
                    return 1;
                }

                if (window.innerWidth < 992) {
                    return 2;
                }

                return 3;
            }

            function renderDots() {
                if (!dotsWrap) {
                    return;
                }

                dotsWrap.innerHTML = '';

                for (let i = 0; i < totalPages; i++) {
                    const dotBtn = document.createElement('button');
                    dotBtn.type = 'button';
                    dotBtn.className = 'cp-slider-dot' + (i === currentPage ? ' is-active' : '');
                    dotBtn.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                    dotBtn.addEventListener('click', function() {
                        currentPage = i;
                        updateSliderPosition();
                        restartAutoplay();
                    });
                    dotsWrap.appendChild(dotBtn);
                }
            }

            function updateSliderPosition() {
                const cardsPerPage = getCardsPerPage();
                const cardCount = sliderCards.length;
                totalPages = Math.max(1, Math.ceil(cardCount / cardsPerPage));

                renderDots();

                if (currentPage > totalPages - 1) {
                    currentPage = totalPages - 1;
                }

                const maxOffset = Math.max(0, sliderTrack.scrollWidth - sliderRoot.querySelector('.cp-slider-viewport').clientWidth);
                const firstCard = sliderCards[0];
                const gapSize = 18;
                const step = firstCard ? (firstCard.getBoundingClientRect().width + gapSize) * cardsPerPage : 0;
                const offset = Math.min(maxOffset, currentPage * step);

                sliderTrack.style.transform = 'translateX(-' + offset + 'px)';

                if (prevBtn) {
                    prevBtn.disabled = totalPages <= 1;
                }

                if (nextBtn) {
                    nextBtn.disabled = totalPages <= 1;
                }

                const dots = sliderRoot.parentElement.querySelectorAll('.cp-slider-dot');
                dots.forEach(function(dot, index) {
                    dot.classList.toggle('is-active', index === currentPage);
                });
            }

            function goToNext() {
                if (totalPages <= 1) {
                    return;
                }

                currentPage = currentPage >= totalPages - 1 ? 0 : currentPage + 1;
                updateSliderPosition();
            }

            function goToPrev() {
                if (totalPages <= 1) {
                    return;
                }

                currentPage = currentPage <= 0 ? totalPages - 1 : currentPage - 1;
                updateSliderPosition();
            }

            function stopAutoplay() {
                if (autoplayTimer) {
                    window.clearInterval(autoplayTimer);
                    autoplayTimer = null;
                }
            }

            function startAutoplay() {
                stopAutoplay();

                if (totalPages <= 1) {
                    return;
                }

                autoplayTimer = window.setInterval(function() {
                    goToNext();
                }, autoplayDelay);
            }

            function restartAutoplay() {
                startAutoplay();
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function() {
                    goToPrev();
                    restartAutoplay();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function() {
                    goToNext();
                    restartAutoplay();
                });
            }

            updateSliderPosition();
            startAutoplay();

            sliderRoot.addEventListener('mouseenter', stopAutoplay);
            sliderRoot.addEventListener('mouseleave', startAutoplay);

            window.addEventListener('resize', function() {
                updateSliderPosition();
                restartAutoplay();
            });

            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    stopAutoplay();
                } else {
                    startAutoplay();
                }
            });
        }

        const hpVideoModal = document.getElementById('hpVideoModal');
        const hpVideoFrame = document.getElementById('hpVideoFrame');
        const hpVideoModalLabel = document.getElementById('hpVideoModalLabel');

        if (hpVideoModal) {
            hpVideoModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const videoId = button.getAttribute('data-video-id');
                const videoTitle = button.getAttribute('data-video-title');
                hpVideoFrame.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1');
                if (videoTitle) {
                    hpVideoModalLabel.textContent = videoTitle;
                }
            });

            hpVideoModal.addEventListener('hide.bs.modal', function() {
                hpVideoFrame.setAttribute('src', '');
                hpVideoModalLabel.textContent = 'ভিডিও';
            });
        }
    });
    </script>

    <?php get_footer(); ?>
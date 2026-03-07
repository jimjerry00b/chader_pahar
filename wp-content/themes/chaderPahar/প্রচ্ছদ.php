<?php get_header(); ?>

<?php
/*
    Template Name: প্রচ্ছদ
*/
?>

    

    

    <section id="section-gadya" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">গদ্য</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'category_name'  => 'godya',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="<?php the_permalink(); ?>" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info pt-2">
                                    <h5><?php the_title(); ?></h5>
                                    <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
                                    <p class="gadya-desc"><?php echo $custom_author ? esc_html($custom_author) : get_the_author(); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="#" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info pt-2">
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


    <section id="section-gadya" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">প্রবন্ধ</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'category_name'  => 'probondho',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="<?php the_permalink(); ?>" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info pt-2">
                                    <h5><?php the_title(); ?></h5>
                                    <p class="gadya-desc"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="#" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info pt-2">
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
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'প্রবন্ধ' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো গদ্য</a>
                </div>
            </div>
        </div>
    </section>


    <section id="section-gadya" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h2 class="gadya-section-title">গল্প</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $gadya_query = new WP_Query( array(
                    'category_name'  => 'golpo',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="<?php the_permalink(); ?>" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info pt-2">
                                    <h5><?php the_title(); ?></h5>
                                    <p class="gadya-desc"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="#" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info pt-2">
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
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'গল্প' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো গদ্য</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="section-gadya" class="py-5" style="background: 
        linear-gradient(rgba(0,0,0,0.28), rgba(0,0,0,0.28)),
        url('<?= get_template_directory_uri(); ?>/assets/images/bg_03.jpg');
        
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
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4 bg-white p-0">
                            <a href="<?php the_permalink(); ?>" class="gadya-card">
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
                                    <p class="gadya-desc"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="#" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info pt-2">
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
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'কবিতা' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো গদ্য</a>
                </div>
            </div>
        </div>
    </section>
    
    <section id="section-gadya" class="py-5">
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
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                ) );

                $img_index = 0;

                if ( $gadya_query->have_posts() ) :
                    while ( $gadya_query->have_posts() ) : $gadya_query->the_post(); ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="<?php the_permalink(); ?>" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <?php $thumb = get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>
                                    <?php if ( $thumb ) : ?>
                                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
                                    <?php else : ?>
                                        <div class="gadya-no-thumb"></div>
                                    <?php endif; ?>
                                </div>
                                <div class="gadya-info pt-2">
                                    <h5><?php the_title(); ?></h5>
                                    <p class="gadya-desc"><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                                </div>
                            </a>
                        </div>

                    <?php $img_index++; endwhile;
                    wp_reset_postdata();

                else :
                    $placeholder_titles  = array( 'কাজকোবান কাব্য ইতিহাস চেতনা', 'সাহিত্য ও সংস্কৃতি', 'অহে হেরেভিল নাফির হোরিভ' );
                    $placeholder_authors = array( 'ড. নুর মো. শোয়ারফ রেজা', 'কাজেল হামান সিদ্দেই', 'ইউনিকেচ তিলমোট্ন ব্লোর' );
                    for ( $j = 0; $j < 3; $j++ ) : ?>

                        <div class="col-12 col-md-4 mb-4">
                            <a href="#" class="gadya-card">
                                <div class="gadya-img-wrapper">
                                    <div class="gadya-no-thumb"></div>
                                </div>
                                <div class="gadya-info pt-2">
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
                    <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'প্রতিবেদন' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো গদ্য</a>
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
                        <a href="#" class="btn kichirmichir-btn">ক্লিক করুন</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 kichirmichir-right p-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_15.jpg" alt="কিচিরমিচির" class="img-fluid w-100 kichirmichir-img">
                </div>
            </div>
        </div>
    </section>

    

    <style>

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
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .gadya-img-wrapper {
            overflow: hidden;
            aspect-ratio: 4 / 3;
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

        .gadya-card:hover .gadya-img-wrapper img {
            transform: scale(1.06);
        }

        .gadya-info h5 {
            font-size: 26px;
            font-weight: 500;
            color: #222;
            margin: 8px 0 4px;
            line-height: 1.4;
        }

        .gadya-desc {
            font-size: 20px;
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
<?php get_header(); ?>

<?php
/*
    Template Name: প্রচ্ছদ
*/
?>

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
    </section>

    <section id="categories">
        <div class="container">
            <div class="d-grid gap-4 my-5 category_container">

                <?php
                // Get all categories except "Uncategorized"
                $categories = get_categories(array(
                'hide_empty' => false,
                'exclude' => get_cat_ID('Uncategorized'),
                ));

                if (!empty($categories)) : ?>
                
                    <?php foreach ($categories as $cat) : 
                        if($cat->cat_ID == 8){
                            continue;
                        }
                        $link = get_category_link($cat->term_id);
                        $thumb_url = function_exists('z_taxonomy_image_url') ? z_taxonomy_image_url($cat->term_id) : '';
                    ?>
                        

                        <a href="<?php echo esc_url($link); ?>">
                            <div class="border text-center">
                                <div class="cat-header pt-3 pb-2">
                                    <h3><?= esc_html($cat->name) ?></h3>
                                </div>
                                <div class="p-3">
                                    <div class="category-img">
                                        <img class="img-responsive" src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($cat->name); ?>" class="img-fluid">
                                    </div>
                                    <p class="p-3">আমাদের লেখক ও পাঠকদের লেখা ছোট  গল্পের আসর </p>
                                    <button class="btn btn-primary mb-3">পড়ুন</button>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    
                <?php endif; ?>

                
            </div>
        </div>
    </section>

    <section id="section-five">
        <div class="container">
            <div class="row">

            <?php
            $category_query = new WP_Query( array(
                'category_name' => 'report', // use category slug
                'posts_per_page' => 7      // number of posts to show
            ) );

            $i = 1;

            foreach($category_query->posts as $cat_data){ 

                
                
            
                if($i == 1){ ?>

                <div class="col-12 col-md-6 col-lg-6 mb-1">
                    <a href="<?php echo get_permalink($cat_data->ID); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_01.jpg" alt="Section Five Image" class="img-fluid">
                        <div class="px-1 py-3">
                            <h3 class="dynamic-color dynamic-color-1"><?= $cat_data->post_title; ?></h3>
                            <div class="content-part-1">
                                <p><?= $cat_data->post_content; ?></p>
                            </div>
                            <span class="date">
                                <?php
                                    $english_date = date("d F Y", strtotime($cat_data->post_modified));
                                    echo convert_to_bengali_date($english_date);
                                ?>
                            </span>
                        </div>
                    </a>
                </div>
                    
                <?php } ?>
                
            
                <div class="col-12 col-md-6 col-lg-3 mb-1">
                <a href="<?php echo get_permalink($cat_data->ID); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_03.jpg" alt="Section Five Image" class="img-fluid">
                    <div class="px-1 py-3">
                        <h3 class="dynamic-color dynamic-color-1"><?= $cat_data->post_title?></h3>
                        <div class="content-part-2">
                            <p><?= $cat_data->post_content; ?></p>
                        </div>
                        <span class="date">
                            <?php
                                $english_date = date("d F Y", strtotime($cat_data->post_modified));
                                echo convert_to_bengali_date($english_date);
                            ?>
                        </span>
                    </div>
                </a>
            </div>
            
            
                
            <?php $i++; } ?>

                
            </div>
        </div>
    </section>

    <section id="section-six" class="px-2 py-4 px-md-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_04.jpg" alt="" class="img-fluid">
                    <div class="section-six-container p-3 p-md-5">
                        <h3>গল্প, গানে আর আড্ডায় চাঁদের পাহাড়</h3>
                        <span class="date">১২ জানুয়ারী ২০২৫</span>
                    </div>
                </div>

                <div class="col-12 col-md-6 mt-4 mt-md-0">
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_04.jpg" alt="" class="img-fluid">
                            <div class="section-six-container p-3">
                                <h4>গল্প, গানে আর আড্ডায় চাঁদের পাহাড়</h4>
                                <span class="date">১২ জানুয়ারী ২০২৫</span>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_04.jpg" alt="" class="img-fluid">
                            <div class="section-six-container p-3">
                                <h4>গল্প, গানে আর আড্ডায় চাঁদের পাহাড়</h4>
                                <span class="date">১২ জানুয়ারী ২০২৫</span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_04.jpg" alt="" class="img-fluid">
                            <div class="section-six-container p-3">
                                <h4>গল্প, গানে আর আড্ডায় চাঁদের পাহাড়</h4>
                                <span class="date">১২ জানুয়ারী ২০২৫</span>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_04.jpg" alt="" class="img-fluid">
                            <div class="section-six-container p-3">
                                <h4>গল্প, গানে আর আড্ডায় চাঁদের পাহাড়</h4>
                                <span class="date">১২ জানুয়ারী ২০২৫</span>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <div class="col-12 text-center mt-3">
                    <button class="btn btn-secondary">আরো ভিডিও</button>
                </div>
                
            </div>
        </div>
    </section>

    <section id="section-seven" class="d-flex align-items-center px-2 py-4 px-md-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7">
                    <h3 class="text-primary">লেখা আহ্ববান</h3>
                    <h4>আপনার লেখা গল্প, কবিতা, প্রবন্ধ, অনুকাব্য, অনুগল্প</h4>
                    <p>আমাদের ওয়েবসাইট প্রকাশ করার জন্য লেখা পাঠান। আপনার ফোন নম্বর ও ঠিকানাসহ আমাদের ঠিকানায় ইমেইল করুন।</p>
                    <p class="text-primary">ইমেইল : contact@chaderpahar.com</p>
                </div>
            </div>
        </div>
    </section>

    <section id="section-eight">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 section-eight-img-section"></div>
                <div class="col-12 col-md-6 section-eight-text-section d-flex align-items-center justify-content-center px-3 py-4 px-md-5 py-md-5">
                    <div>
                        <h3 class="text-primary">চিত্রাঙ্কন</h3>
                        <p>তোমরা যারা ছবি আঁকতে ভালোবাসো তারা ছবি এঁকে আমাদের কাছে পাঠিয়ে দাও</p>
                        <p>প্রতিমাসে নিবাচিত চিত্র প্রকাশিত হবে আমাদের ওয়েবসাইটে</p>
                        <p>তোমরা ছবি পাঠাতে পারো আমাদের ইমেইলে অথবা আমাদের অফিসে এসে</p>
                        <p>ছবির সাথে তোমরা নাম, স্কুলের নাম, মোবাইল নম্বর  ও কোন ক্লাস পড়ো লিখতে ভুলো না।</p>
                        <p>ইমেইল: contact@chaderpahar.com </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="section-nine" class="d-flex align-items-center px-2 py-4 px-md-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <h3 class="text-secondary">আপনি কি মোবাইল বা প্রফেশনাল ক্যামেরা দিয়ে ছবি তুলেন ?</h3>
                    <p class="text-white">আপনার তোলা ছবি আমাদের ওয়েবসাইট প্রকাশ করতে আপনার ফোন নম্বর ও ঠিকানাসহ আমাদের ঠিকানায় ইমেইল করুন।</p>
                    <p class="text-secondary">ইমেইল : contact@chaderpahar.com</p>
                </div>
            </div>
        </div>
    </section>

    <section id="section-ten" class="d-flex align-items-center px-2 py-4 px-md-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h3 class="text-secondary">শিশু-কিশোদের আসর</h3>
                    <p class="text-black">শিশু কিশোরদের সৃষ্টিশীল লেখা ও শিল্প চর্চা দেখতে পড়ুন আমাদের সব আয়োজন</p>
                    <button class="btn btn-primary mb-3 py-3">ক্লিক করুন</button>
                </div>
            </div>
        </div>
    </section>

    <section id="section-eleven" class="d-flex align-items-center px-2 py-4 px-md-5 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="align-items-center justify-content-center">
                        <p class="text-primary">চাঁদের পাহাড় শিল্প সাহিত্যের চর্চা ও উৎকর্ষ বিকাশে একটি সেবামূলক প্রতিষ্ঠান হিসেবে কাজ করে যাচ্ছে । </p>
                        <p class="text-secondary">এই উদ্যোকে এগিয়ে নিতে আপনিও আর্থিক সহায়তা করে যুক্ত হোন</p>
                        <button class="btn btn-primary mb-3">ডোনেশন করুন</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>

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

    <?php get_footer(); ?>
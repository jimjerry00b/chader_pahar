<?php get_header(); ?>

<?php
/*
    Template Name: প্রতিবেদন
*/
?>

<section>
    <div class="container mt-3 protibedon_section">
        <div class="row">
            <div class="col-12 mb-4 text-center d-flex justify-content-center align-items-center">
                <h2>চাঁদের পাহাড় প্রতিবেদন</h2>
            </div>
        </div>
    </div>
</section>

<section id="section-five">
    <div class="container">
        <div class="row">

            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            
            $category_query = new WP_Query( array(
                'category_name' => 'report', // use category slug
                'posts_per_page' => 3,      // number of posts to show
                'paged' => $paged
            ) );

            $i = 1;

            foreach($category_query->posts as $cat_data){
                if($i == 1){
            ?>

            <div class="col-12 col-md-6 col-lg-6 mb-5">
                <div class="px-1 py-3">
                    <h3 class="dynamic-color"><?= $cat_data->post_title?></h3>
                    <div class="content-part-1">
                        <p><?= $cat_data->post_content; ?></p>
                    </div>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_01.jpg" alt="Section Five Image" class="img-fluid">
                <span class="date">
                    <?php
                        $english_date = date("d F Y", strtotime($cat_data->post_modified));
                        echo convert_to_bengali_date($english_date);
                    ?>
                </span>
            </div>

            <?php } ?>

            <div class="col-12 col-md-6 col-lg-3 mb-1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_02.jpg" alt="Section Five Image" class="img-fluid">
                <div class="px-1 py-3">
                    <h3 class="dynamic-color"><?= $cat_data->post_title?></h3>
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
            </div>

            <?php $i++; } ?>
        </div>

        <!-- Bengali Pagination -->
        <?php if ($category_query->max_num_pages > 1) : ?>
        <div class="pagination-wrapper text-center mt-5">
            <nav id="pagination_one" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <?php if ($paged > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo get_pagenum_link($paged - 1); ?>" aria-label="Previous">পূর্ববর্তী</a>
                    </li>
                    <?php endif; ?>

                    <?php
                    $total_pages = $category_query->max_num_pages;
                    $range = 2; // Number of pages to show before and after current page
                    
                    for ($i = 1; $i <= $total_pages; $i++) :
                        // Show first page, last page, current page, and pages within range
                        if ($i == 1 || $i == $total_pages || ($i >= $paged - $range && $i <= $paged + $range)) :
                    ?>
                        <li class="page-item <?php echo ($paged == $i) ? 'active' : ''; ?>">
                            <a class="page-link" href="<?php echo get_pagenum_link($i); ?>"><?php echo convert_to_bengali_number($i); ?></a>
                        </li>
                    <?php 
                        // Add dots if there's a gap
                        elseif ($i == $paged - $range - 1 || $i == $paged + $range + 1) :
                    ?>
                        <li class="page-item disabled">
                            <span class="page-link">...</span>
                        </li>
                    <?php 
                        endif;
                    endfor; 
                    ?>

                    <?php if ($paged < $total_pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo get_pagenum_link($paged + 1); ?>" aria-label="Next">পরবর্তী</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
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
        height: 180px;
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
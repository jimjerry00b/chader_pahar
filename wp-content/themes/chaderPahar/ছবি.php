<?php get_header(); ?>

<?php
/*
    Template Name: ছবি
*/
?>

<section class="chobi-gallery py-5">
    <div class="container">
        <div class="row g-3">
            <!-- Row 1 -->
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_01.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_02.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>

            <!-- Row 2 -->
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_03.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_01.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>

            <!-- Row 3 -->
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_02.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_03.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>

            <!-- Row 4 -->
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_01.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>
            <div class="col-12 col-md-6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_02.jpg" alt="Gallery Image" class="img-fluid w-100">
            </div>
        </div>

        <!-- Bengali Pagination -->
        <div class="pagination-wrapper text-center mt-5">
            <nav id="pagination_one" aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">পূর্ববর্তী</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">২</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">৩</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">৪</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">পরবর্তী</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<?php get_footer(); ?>

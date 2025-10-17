<?php get_header(); ?>

<?php
/*
    Template Name: ছবি
*/

// Function to convert English numbers to Bengali numbers in link text only (not URLs)
function convert_pagination_numbers_to_bengali_photos($html) {
    $english = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $bengali = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
    
    // Convert numbers in <a> tag content (between > and </a>)
    $html = preg_replace_callback('/>(\d+)<\/a>/', function($matches) use ($english, $bengali) {
        return '>' . str_replace($english, $bengali, $matches[1]) . '</a>';
    }, $html);
    
    // Convert numbers in <span> tag content (between > and </span>)
    $html = preg_replace_callback('/>(\d+)<\/span>/', function($matches) use ($english, $bengali) {
        return '>' . str_replace($english, $bengali, $matches[1]) . '</span>';
    }, $html);
    
    return $html;
}

// Get current page for pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);

// Store the current page URL before the custom query
global $post;
$current_page_url = get_permalink($post->ID);

// Query photos custom post type
$args = array(
    'post_type'      => 'photos',
    'posts_per_page' => 8,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC'
);

$photo_query = new WP_Query($args);
?>

<section class="chobi-gallery py-5">
    <div class="container">
        <div class="row g-3">
            <?php if ($photo_query->have_posts()) : ?>
                <?php while ($photo_query->have_posts()) : $photo_query->the_post(); ?>
                    <div class="col-12 col-md-6">
                        <div class="photo-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" data-bs-toggle="modal" data-bs-target="#photoModal<?php echo get_the_ID(); ?>" style="cursor: pointer;">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                            <?php if (get_the_title()) : ?>
                                <div class="photo-title-overlay">
                                    <h5><?php the_title(); ?></h5>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Photo Modal -->
                    <div class="modal fade" id="photoModal<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="photoModalLabel<?php echo get_the_ID(); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="photoModalLabel<?php echo get_the_ID(); ?>"><?php the_title(); ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="img-fluid w-100">
                                    <?php endif; ?>
                                    <?php if (get_the_content()) : ?>
                                        <div class="photo-description mt-3">
                                            <?php the_content(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php else : ?>
                <div class="col-12">
                    <p class="text-center">কোনো ছবি পাওয়া যায়নি।</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Bengali Pagination -->
        <?php if ($photo_query->max_num_pages > 1) : ?>
            <div class="pagination-wrapper text-center mt-5">
                <nav id="pagination_one" aria-label="Page navigation">
                    <?php
                    $big = 999999999;
                    $pagination = paginate_links(array(
                        'base'      => trailingslashit($current_page_url) . 'page/%#%/',
                        'format'    => '',
                        'current'   => max(1, $paged),
                        'total'     => $photo_query->max_num_pages,
                        'prev_text' => 'পূর্ববর্তী',
                        'next_text' => 'পরবর্তী',
                        'type'      => 'list',
                    ));
                    // Replace default class with Bootstrap pagination classes
                    $pagination = str_replace('page-numbers', 'pagination justify-content-center', $pagination);
                    $pagination = str_replace('<li>', '<li class="page-item">', $pagination);
                    $pagination = str_replace('<a ', '<a class="page-link" ', $pagination);
                    $pagination = str_replace('<span ', '<span class="page-link" ', $pagination);
                    // Add active class to li containing aria-current="page"
                    $pagination = str_replace('<li class="page-item"><span class="page-link" aria-current="page"', '<li class="page-item active"><span class="page-link" aria-current="page"', $pagination);
                    // Convert English numbers to Bengali numbers (only in visible text, not URLs)
                    $pagination = convert_pagination_numbers_to_bengali_photos($pagination);
                    echo $pagination;
                    ?>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php 
wp_reset_postdata();
?>

<style>
.photo-item {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: transform 0.3s ease;
    max-width: 640px;
    margin: 0 auto;
}

.photo-item:hover {
    transform: scale(1.02);
}

.photo-item img {
    width: 640px;
    height: 442px;
    display: block;
    object-fit: cover;
}

.photo-title-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    padding: 20px 15px 10px;
    color: white;
}

.photo-title-overlay h5 {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
    text-shadow: 0 1px 3px rgba(0,0,0,0.5);
}

.pagination li {
    list-style-type: none;
    float: left;
}

.photo-description {
    font-size: 14px;
    line-height: 1.6;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
    .photo-item {
        max-width: 100%;
    }
    
    .photo-item img {
        width: 100%;
        height: auto;
        aspect-ratio: 640 / 442;
    }
}
</style>

<?php get_footer(); ?>

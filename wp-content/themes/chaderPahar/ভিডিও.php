<?php get_header(); ?>

<?php
/*
    Template Name: ভিডিও
*/

// Function to extract YouTube video ID from URL
function get_youtube_id_from_url($url) {
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
    // Handle youtu.be URLs
    preg_match('/youtu\\.be\\/([^\\?\\&]+)/', $url, $matches);
    return isset($matches[1]) ? $matches[1] : '';
}

// Get current page for pagination
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Query videos custom post type with meta query
$args = array(
    'post_type'      => 'videos',
    'posts_per_page' => 9,
    'paged'          => $paged,
    'meta_query'     => array(
        array(
            'key'     => '_youtube_url',
            'compare' => 'EXISTS'
        )
    ),
    'orderby'        => 'date',
    'order'          => 'DESC'
);

$video_query = new WP_Query($args);
?>

<section class="video-gallery py-5">
    <div class="container">
        <div class="row g-3">
            <?php if ($video_query->have_posts()) : ?>
                <?php while ($video_query->have_posts()) : $video_query->the_post(); 
                    $youtube_url = get_post_meta(get_the_ID(), '_youtube_url', true);
                    $video_id = get_youtube_id_from_url($youtube_url);
                    
                    if ($video_id) :
                ?>
                    <div class="col-12 col-md-4">
                        <div class="video-thumbnail" data-bs-toggle="modal" data-bs-target="#videoModal" data-video-id="<?php echo esc_attr($video_id); ?>" data-video-title="<?php echo esc_attr(get_the_title()); ?>" style="cursor: pointer;">
                            <img src="https://img.youtube.com/vi/<?php echo esc_attr($video_id); ?>/maxresdefault.jpg" alt="<?php echo esc_attr(get_the_title()); ?>" class="img-fluid">
                            <div class="play-icon">
                                <i class="bi bi-play-circle-fill"></i>
                            </div>
                            <div class="video-title-overlay">
                                <h5><?php the_title(); ?></h5>
                            </div>
                        </div>
                    </div>
                <?php 
                    endif;
                endwhile; 
                ?>
            <?php else : ?>
                <div class="col-12">
                    <p class="text-center">কোনো ভিডিও পাওয়া যায়নি।</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Bengali Pagination -->
        <?php if ($video_query->max_num_pages > 1) : ?>
            <div class="pagination-wrapper text-center mt-5">
                <nav id="pagination_one" aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php
                        $big = 999999999;
                        echo paginate_links(array(
                            'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'format'    => '?paged=%#%',
                            'current'   => max(1, $paged),
                            'total'     => $video_query->max_num_pages,
                            'prev_text' => 'পূর্ববর্তী',
                            'next_text' => 'পরবর্তী',
                            'type'      => 'list',
                        ));
                        ?>
                    </ul>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php 
wp_reset_postdata();
?>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">ভিডিও</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="videoFrame" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.video-thumbnail {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.video-thumbnail:hover {
    transform: scale(1.05);
}

.video-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
}

.video-thumbnail .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 60px;
    color: rgba(255, 255, 255, 0.9);
    text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease;
}

.video-thumbnail:hover .play-icon {
    color: #ff0000;
    transform: translate(-50%, -50%) scale(1.2);
}

.video-title-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
    padding: 20px 15px 10px;
    color: white;
}

.video-title-overlay h5 {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
    text-shadow: 0 1px 3px rgba(0,0,0,0.5);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('videoFrame');
    const videoModalLabel = document.getElementById('videoModalLabel');
    const videoThumbnails = document.querySelectorAll('.video-thumbnail');
    
    // When modal is shown, load the video
    videoModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const videoId = button.getAttribute('data-video-id');
        const videoTitle = button.getAttribute('data-video-title');
        const videoSrc = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
        
        videoFrame.setAttribute('src', videoSrc);
        
        // Update modal title if available
        if (videoTitle) {
            videoModalLabel.textContent = videoTitle;
        }
    });
    
    // When modal is hidden, stop the video
    videoModal.addEventListener('hide.bs.modal', function () {
        videoFrame.setAttribute('src', '');
        videoModalLabel.textContent = 'ভিডিও';
    });
});
</script>

<?php get_footer(); ?>
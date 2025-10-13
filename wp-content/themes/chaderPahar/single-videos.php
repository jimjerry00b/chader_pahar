<?php get_header(); ?>

<?php
// Get YouTube URL from custom field
$youtube_url = get_post_meta(get_the_ID(), '_youtube_url', true);

// Function to extract YouTube video ID from URL
function get_youtube_id($url) {
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
    // Handle youtu.be URLs
    preg_match('/youtu\\.be\\/([^\\?\\&]+)/', $url, $matches);
    return isset($matches[1]) ? $matches[1] : '';
}

$video_id = get_youtube_id($youtube_url);
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 p-0 mt-5 mb-2">
      <div class="category-header">
        <h3><?php the_title(); ?></h3>
      </div>
      <div class="border category-description">
        <div class="row">
          <div class="col-md-12">
            <?php if ($video_id) : ?>
              <div class="video-container mb-4">
                <iframe 
                  width="100%" 
                  height="500" 
                  src="https://www.youtube.com/embed/<?php echo esc_attr($video_id); ?>" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen>
                </iframe>
              </div>
            <?php elseif (has_post_thumbnail()) : ?>
              <div class="post-thumbnail mb-4">
                <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-md-12">
            <div class="default_text_one">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
    .default_text_one p{
        color: initial;
        line-height: 24px;
    }

    .category-header{
        background: var(--second-color);
        height: 50px;
    }

    .category-description {
        padding: 20px;
        margin: 0;
    }

    .video-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .video-container iframe {
        border-radius: 8px;
    }
</style>

<?php get_footer(); ?>
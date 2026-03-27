<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12 p-0 mt-5 mb-2">
      <div class="category-header">
        <h2 class="gadya-section-title"><?php single_cat_title(); ?></h2>
      </div>
    </div>
  </div>
</div>

<div class="container pb-5">
  <div class="row g-4">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="col-md-4 d-flex">
        <a href="<?php the_permalink(); ?>" class="goddo-card h-100 w-100">
          <div class="goddo-card-img">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
            <?php else : ?>
              <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="">
            <?php endif; ?>
          </div>
          <div class="goddo-card-body p-4">
            <h5 class="goddo-card-title"><?php the_title(); ?></h5>
            <?php $custom_author = get_post_meta(get_the_ID(), '_custom_author', true); ?>
            <!-- <p class="goddo-card-desc"><?//php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p> -->
          </div>
        </a>
      </div>
    <?php endwhile;
    else: ?>
      <p>No posts found in this category.</p>
    <?php endif; ?>
  </div>

  <?php if (have_posts()) : ?>
  <div class="row">
    <div class="col-md-12">
      <nav id="pagination_one" aria-label="Page navigation">
        <?php
        echo paginate_links(array(
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;',
          'type' => 'list',
          'mid_size' => 2,
          'end_size' => 1,
        ));
        ?>
      </nav>
    </div>
  </div>
  <?php endif; ?>
</div>

<style>
  .goddo-card {
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: inherit;
    overflow: hidden;
    height: 100%;
    border: 1px solid #e0e0e0;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }
  .goddo-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    color: inherit;
  }
  .goddo-card-img {
    width: 100%;
    aspect-ratio: 4 / 3;
    overflow: hidden;
  }
  .goddo-card-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .goddo-card-body {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    padding: 12px 4px;
  }
  .goddo-card-title {
    font-size: 20px;
    font-weight: 500;
    color: #1a1a1a;
    margin: 0 0 4px 0;
    line-height: 1.4;
  }
  .goddo-card-desc {
    font-size: 17px;
    color: var(--gold-color);
    margin: 4px 0 8px 0;
    line-height: 1.5;
  }
  .goddo-card-author {
    font-size: 15px;
    color: var(--second-color);
  }

  #pagination_one .page-numbers {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    padding: 0;
    margin: 20px 0;
    gap: 5px;
  }

  #pagination_one .page-numbers li {
    display: inline-block;
  }
</style>

<script>
  // Convert English numbers to Bengali numbers
  function convertToBengaliNumbers() {
    const bengaliDigits = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
    const paginationLinks = document.querySelectorAll('#pagination_one .page-numbers a, #pagination_one .page-numbers .current');

    paginationLinks.forEach(link => {
      const text = link.textContent;
      if (/^\d+$/.test(text.trim())) {
        const bengaliText = text.replace(/\d/g, digit => bengaliDigits[parseInt(digit, 10)]);
        link.textContent = bengaliText;
      }
    });
  }

  document.addEventListener('DOMContentLoaded', convertToBengaliNumbers);
</script>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12 p-0 mt-5 mb-2">
      <div class="category-header">
        <h3><?php single_cat_title(); ?></h3>
      </div>
      <div class="border category-description">
        <?php $category_id = get_queried_object_id(); ?>
        <?php $thumb_url = function_exists('z_taxonomy_image_url') ? z_taxonomy_image_url($cat->term_id) : ''; ?>
        <div class="row">
          <div class="col-md-3 d-flex align-items-center justify-content-center">
            <img class="img-fluid" src="<?php echo $thumb_url; ?>" alt="">
          </div>
          <div class="col-md-9 text-center shakhkhatkar_category d-flex align-items-center justify-content-center">
            <?php echo category_description(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
  <div class="row">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="col-md-12 p-0 my-2 category-container">
          <div class="category-header-post"></div>
          <div class="border category-description">
            <?php $category_id = get_queried_object_id(); ?>
            <?php $thumb_url = function_exists('z_taxonomy_image_url') ? z_taxonomy_image_url($cat->term_id) : ''; ?>
            <div class="row">
              <div class="col-md-3 d-flex align-items-center justify-content-center">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('medium', ['class' => 'img-fluid rounded mb-3']); ?>
                <?php endif; ?>
              </div>
              <div class="col-md-9">
                <div class="default_text_one">
                  <h2><?php the_title(); ?></h2>
                  <?php echo category_description(); ?>
                  <a href="<?php the_permalink(); ?>"><button class="btn btn-primary mb-3">পড়ুন</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile;
    else: ?>
      <p>No posts found in this category.</p>
    <?php endif; ?>
  </div>
</div>

<style>
  .shakhkhatkar_category{
      color: var(--second-color);
      font-size: 30px;
  }
</style>

<?php get_footer(); ?>
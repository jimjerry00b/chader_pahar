<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12 p-0 mt-5 mb-2">
      <div class="category-header">
        <h3></h3>
      </div>
      <div class="border category-description">
        <?php $category_id = get_queried_object_id(); ?>
        <?php $thumb_url = function_exists('z_taxonomy_image_url') ? z_taxonomy_image_url($cat->term_id) : ''; ?>
        <div class="row">
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <img class="img-fluid" src="<?php echo $thumb_url; ?>" alt="">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded mb-3']); ?>
                </div>
            <?php endif; ?>
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-center">
            <?php echo category_description(); ?>
            <div class="default_text_one text-center">
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <?php echo category_description(); ?>
            </div>
          </div>

          <div class="col-md-12">
            <?php echo category_description(); ?>
            <div class="default_text_one">
                <?php echo category_description(); ?>
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
</style>


<?php get_footer(); ?>
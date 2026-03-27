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
  <?php
  $paged = max( 1, get_query_var( 'paged' ) );
  $kichirmichir_query = new WP_Query( array(
    'cat'            => get_queried_object_id(),
    'post_type'      => 'post',
    'posts_per_page' => 3,
    'paged'          => $paged,
  ) );
  ?>
  <div id="kichirmichir-posts" data-cat-id="<?php echo esc_attr( get_queried_object_id() ); ?>" data-ajax-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" data-current-page="<?php echo esc_attr( $paged ); ?>" data-max-pages="<?php echo esc_attr( $kichirmichir_query->max_num_pages ); ?>">
  <div class="row g-4">
    <?php if ( $kichirmichir_query->have_posts() ) : while ( $kichirmichir_query->have_posts() ) : $kichirmichir_query->the_post();
      $custom_class = get_post_meta( get_the_ID(), '_custom_class', true );
    ?>
    
      <div class="col-md-4 d-flex">
        <a href="<?php the_permalink(); ?>" class="position-relative goddo-card h-100 w-100">
          <?php if($custom_class){ ?>
          <span class="category-badge position-absolute end-0" style="background: #00187061; padding: 10px 35px; color: #fff;">
            <?=  $custom_class; ?>
          </span>
          <?php }?>
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
            <p class="goddo-card-desc"><?php echo $custom_author ? esc_html($custom_author) : "সাধারণ লেখক" ?></p>
          </div>
        </a>
      </div>
    <?php endwhile;
    else: ?>
      <p>No posts found in this category.</p>
    <?php endif; ?>
  </div>

  
  </div><!-- #kichirmichir-posts -->
  <?php if ( $kichirmichir_query->found_posts >= 3 ) : ?>
    <div class="row">
      <div class="col-12 text-center mt-3">
        <a href="<?php echo esc_url( get_category_link( get_cat_ID( 'শিশু-সাহিত্য' ) ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো কিচিরমিচির</a>
      </div>
    </div>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</div>

<div class="container pb-5">
  <div class="row">
    <div class="col-md-12 p-0 mb-4">
      <div class="category-header">
        <h2 class="gadya-section-title">চিত্রাঙ্কন</h2>
      </div>
    </div>
  </div>
  <?php
  $chitrankan_cat_id = get_cat_ID( 'চিত্রাঙ্কন' );
  $chitrankan_query  = new WP_Query( array(
    'cat'            => $chitrankan_cat_id,
    'post_type'      => 'post',
    'posts_per_page' => 6,
  ) );
  ?>
  <div class="row g-4">
    <?php if ( $chitrankan_query->have_posts() ) : while ( $chitrankan_query->have_posts() ) : $chitrankan_query->the_post(); ?>

      <?php
        $chitrankan_author = get_post_meta( get_the_ID(), '_custom_author', true );
        $chitrankan_class  = get_post_meta( get_the_ID(), '_custom_class', true );
        $chitrankan_img    = get_the_post_thumbnail_url( get_the_ID(), 'full' );
        if ( ! $chitrankan_img ) {
          $chitrankan_img = get_template_directory_uri() . '/assets/images/placeholder.jpg';
        }
      ?>
      <div class="col-md-4 d-flex">
        <div class="goddo-card h-100 w-100 chitrankan-card"
             role="button"
             data-bs-toggle="modal"
             data-bs-target="#chitrankanModal"
             data-img="<?php echo esc_url( $chitrankan_img ); ?>"
             data-title="<?php echo $chitrankan_author ? esc_attr( $chitrankan_author ) : esc_attr( get_the_title() ); ?>"
             data-class="<?php echo esc_attr( $chitrankan_class ); ?>"
             data-url="<?php echo esc_url( get_the_permalink() ); ?>">
          <div class="goddo-card-img">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium_large', [ 'class' => 'img-fluid' ] ); ?>
            <?php else : ?>
              <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="">
            <?php endif; ?>
          </div>
          <div class="goddo-card-body p-4">
            <h5 class="goddo-card-title"><?php echo $chitrankan_author ? esc_html( $chitrankan_author ) : esc_html( get_the_title() ); ?></h5>
            <?php if ( $chitrankan_class ) : ?>
              <p class="goddo-card-desc"><?php echo esc_html( $chitrankan_class ); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>

    <?php endwhile;
    else: ?>
      <p>No posts found in this category.</p>
    <?php endif; ?>
  </div>


  <!-- চিত্রাঙ্কন Modal -->
  <div class="modal fade" id="chitrankanModal" tabindex="-1" aria-labelledby="chitrankanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center p-2">
          <img id="chitrankanModalImg" src="" alt="" class="img-fluid" style="width: 100%; object-fit: contain;">
          <h5 id="chitrankanModalTitle" class="goddo-card-title mt-3"></h5>
          <p id="chitrankanModalClass" class="goddo-card-desc"></p>
          <div class="chitrankan-share mt-2 mb-2">
            <a id="chitrankanShareFb" href="#" target="_blank" rel="noopener noreferrer" class="share-btn share-fb" title="Facebook"><i class="bi bi-facebook"></i></a>
            <a id="chitrankanShareLi" href="#" target="_blank" rel="noopener noreferrer" class="share-btn share-li" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a id="chitrankanShareTw" href="#" target="_blank" rel="noopener noreferrer" class="share-btn share-tw" title="X (Twitter)"><i class="bi bi-twitter-x"></i></a>
            <a id="chitrankanShareWa" href="#" target="_blank" rel="noopener noreferrer" class="share-btn share-wa" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if ( $chitrankan_query->found_posts >= 3 ) : ?>
    <div class="row">
      <div class="col-12 text-center mt-3">
        <a href="<?php echo esc_url( get_category_link( $chitrankan_cat_id ) ); ?>" class="btn btn-warning gadya-more-btn px-5 py-2">আরো দেখুন</a>
      </div>
    </div>
  <?php endif; ?>

  <?php wp_reset_postdata(); ?>
</div>

<!-- চিত্রাঙ্কন জমা দিন Section -->
<div class="container pb-5">
  <div class="chitrankan-notice-box">
    <div class="row g-0 align-items-center">
      <div class="col-md-4">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/img_18.jpg" alt="চিত্রাঙ্কন" class="img-fluid chitrankan-notice-img">
      </div>
      <div class="col-md-8">
        <div class="chitrankan-notice-content p-4">
          <p>তোমরা যারা ছবি আঁকতে ভালোবাসো তারা ছবি এঁকে আমাদের কাছে পাঠিয়ে দাও</p>
          <p class="chitrankan-notice-highlight">প্রতিমাসে নির্বাচিত চিত্র প্রকাশিত হবে আমাদের ওয়েবসাইটে</p>
          <p>তোমরা ছবি পাঠাতে পারো আমাদের ইমেইলে অথবা আমাদের অফিসে এসে</p>
          <p>ছবির সাথে তোমার নাম, স্কুলের নাম, মোবাইল নম্বর ও কোন ক্লাস পড়ো লিখতে ভুলো না।</p>
          <p class="chitrankan-notice-highlight">ইমেইল: contact@chaderpahar.com</p>
        </div>
      </div>
    </div>
  </div>
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
    box-shadow: 0 2px 8px #0000003d;
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

  .chitrankan-notice-box {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  }
  .chitrankan-notice-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  .chitrankan-notice-content p {
    font-size: 22px;
    color: var(--second-color);
    margin-bottom: 8px;
    line-height: 1.7;
  }
  .chitrankan-notice-highlight {
    color: var(--gold-color)!important;
    font-weight: 500;
  }

  .chitrankan-card {
    cursor: pointer;
  }

  .chitrankan-share {
    display: flex;
    justify-content: center;
    gap: 12px;
  }
  .share-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #fff;
    font-size: 18px;
    text-decoration: none;
    transition: opacity 0.2s;
    padding-top: 5px;
  }
  .share-btn:hover {
    opacity: 0.8;
    color: #fff;
  }
  .share-fb { background-color: #1877F2; }
  .share-li { background-color: #0A66C2; }
  .share-tw { background-color: #000; }
  .share-wa { background-color: #25D366; }
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

  // AJAX pagination for kichirmichir
  (function() {
    const container = document.getElementById('kichirmichir-posts');
    if (!container) return;

    const ajaxUrl = container.getAttribute('data-ajax-url');
    const catId   = container.getAttribute('data-cat-id');

    function loadPage(page) {
      container.style.opacity = '0.5';

      const formData = new FormData();
      formData.append('action', 'kichirmichir_pagination');
      formData.append('paged', page);
      formData.append('cat_id', catId);

      fetch(ajaxUrl, { method: 'POST', body: formData })
        .then(function(res) { return res.json(); })
        .then(function(json) {
          if (json.success) {
            var postsRow = container.querySelector('.row.g-4');
            if (postsRow) postsRow.innerHTML = json.data.posts;
            var paginationNav = container.querySelector('#pagination_one');
            if (paginationNav) {
              paginationNav.innerHTML = json.data.pagination;
            }
            container.setAttribute('data-current-page', page);
            container.setAttribute('data-max-pages', json.data.max_pages);
            convertToBengaliNumbers();
            window.scrollTo({ top: container.offsetTop - 80, behavior: 'smooth' });
          }
          container.style.opacity = '1';
        })
        .catch(function() {
          container.style.opacity = '1';
        });
    }

    container.addEventListener('click', function(e) {
      const link = e.target.closest('#pagination_one a.page-numbers');
      if (!link) return;
      e.preventDefault();

      // Extract page number from the link href
      var page = 1;
      var match = link.href.match(/\/page\/(\d+)/);
      if (match) {
        page = parseInt(match[1], 10);
      } else {
        var urlParams = new URLSearchParams(link.search);
        if (urlParams.has('paged')) {
          page = parseInt(urlParams.get('paged'), 10);
        }
      }

      loadPage(page);
    });
  })();

  // চিত্রাঙ্কন modal
  const chitrankanModal = document.getElementById('chitrankanModal');
  if (chitrankanModal) {
    chitrankanModal.addEventListener('show.bs.modal', function (event) {
      const card = event.relatedTarget;
      const title = card.getAttribute('data-title');
      const url = card.getAttribute('data-url');
      const imgUrl = card.getAttribute('data-img');
      document.getElementById('chitrankanModalImg').src = imgUrl;
      document.getElementById('chitrankanModalTitle').textContent = title;
      const classText = card.getAttribute('data-class');
      const classEl = document.getElementById('chitrankanModalClass');
      classEl.textContent = classText;
      classEl.style.display = classText ? '' : 'none';

      const encodedImg = encodeURIComponent(imgUrl);
      const encodedTitle = encodeURIComponent(title);
      document.getElementById('chitrankanShareFb').href = 'https://www.facebook.com/sharer/sharer.php?u=' + encodedImg;
      document.getElementById('chitrankanShareLi').href = 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodedImg;
      document.getElementById('chitrankanShareTw').href = 'https://twitter.com/intent/tweet?url=' + encodedImg + '&text=' + encodedTitle;
      document.getElementById('chitrankanShareWa').href = 'https://wa.me/?text=' + encodedTitle + '%20' + encodedImg;
    });
  }
</script>

<?php get_footer(); ?>
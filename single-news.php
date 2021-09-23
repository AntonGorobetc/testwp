<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package testwp
 */

get_header();
?>

  <main id="primary" class="site-main">

      <?php

      while (have_posts()) {
          the_post();
          get_template_part('template-parts/content', get_post_type());
      }

      ?>

    <div class="sub-posts">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="related-posts">
              <span>Related posts:</span>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
            <?php
            // создаем экземпляр
            //$my_posts = new WP_Query;

            // делаем запрос
            $myposts = new WP_Query(array(
                'post_type' => 'news',
                'posts_per_page' => '3',
//                'meta_key' => 'views',
//                'orderby' => 'meta_value_num',
                'order' => 'DESC'
            ));

            while ($myposts->have_posts()) {
                $myposts->the_post();
                get_template_part('template-parts/news-card-content', get_post_type());
            }

            ?>
        </div>
      </div>
    </div>

  </main><!-- #main -->

<?php
get_footer();

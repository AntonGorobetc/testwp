<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package testwp
 */

get_header();
?>

  <main id="primary" class="site-main">

    <div class="container">
      <div class="row">
          <?php
          if (have_posts()) :

          if (is_home() && !is_front_page()) :
          ?>
      </div>
    </div>

    <header>
      <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
    </header>
          <?php
          endif;

          ?>
            <div class="container">
              <div class="row">

          <?php


          /* Start the Loop */
          while (have_posts()) :
              the_post();

              /*
               * Include the Post-Type-specific template for the content.
               * If you want to override this in a child theme, then include a file
               * called content-___.php (where ___ is the Post Type name) and that will be used instead.
               */

              get_template_part('template-parts/content', get_post_type());

          endwhile;
          ?>

              </div>
              <div class="row ajax-content-section">
                <div class="col-12">
                  <span class="sub-title">
                    Task 2. Ajax content:
                  </span>
                </div>
                <div class="col-12">
                  <pre class="ajax-content">[{TODO: 'Press button to fetch content'}]</pre>
                </div>
                <div class="col-12">
                  <button class="fetch-button">Button</button>
                </div>
              </div>
            </div>
          <?php

          the_posts_navigation();

          else :
              ?>

          <?php
              get_template_part('template-parts/content', 'none');

          endif;
          ?>

  </main><!-- #main -->

<?php
get_footer();

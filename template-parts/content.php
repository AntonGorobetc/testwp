<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package testwp
 */

?>

<?php
      if ( is_singular() ) :
?>
      <div class="container">
        <div class="row">
            <?php
            the_title( '<h1 class="entry-title">', '</h1>' );
            the_content(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'testwp' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'testwp' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>
      </div>
      <?php
      else :

        get_template_part('template-parts/news-card-content', get_post_type());

      endif;
?>














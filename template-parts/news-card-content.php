<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package testwp
 */

?>

<div class="col-4">
    <div class="card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php testwp_post_thumbnail(); ?>
        <div class="card-body">
            <?php
            the_title('<h5 class="card-title">', '</h5>');
            ?>
            <p class="card-text">
                <?php
                the_content(
                    sprintf(
                        wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'testwp'),
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        wp_kses_post(get_the_title())
                    )
                );

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'testwp'),
                        'after' => '</div>',
                    )
                );
                ?>
            </p>
            <div>
                <?php
                the_field('news_date_field')
                ?>
            </div>
        </div>
    </div><!-- #post-<?php the_ID(); ?> -->
</div>















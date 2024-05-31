<?php get_header(); ?>

    <div class="vp-default--page">
        <div class="wrapper">
        <?php

        // echo get_post_meta( get_the_ID(), '_wp_page_template', true );

        if ( have_posts() ) :

            while ( have_posts() ) : the_post();

                the_content(
                    sprintf(
                        __( 'Continue reading %s', 'storefront' ),
                        '<span class="screen-reader-text">' . get_the_title() . '</span>'
                    )
                );

                wp_link_pages( [
                    'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
                    'after'  => '</div>',
                ] );

            endwhile;

        endif; ?>
        </div>
    </div>

<?php get_footer(); ?>
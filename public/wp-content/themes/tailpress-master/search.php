<?php get_header(); ?>

<div class="breadcrumb-wrapper">
    <div class="breadcrumb">
        <?php bcn_display(); ?>
    </div>
</div>

<div class="container">
    <!-- <div class="wrapper"> -->

    <?php if ( have_posts() ): ?>

        <?php while( have_posts() ): ?>

            <?php the_post(); ?>

            <div class="search-result">
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="read-more-link">
                    <?php _e( 'Read More', 'nd_dosth' );  ?>
                </a>
            </div>

        <?php endwhile; ?>

        <?php the_posts_pagination(); ?>

    <?php else: ?>
        <p><?php _e( 'No Search Results found', 'nd_dosth' ); ?></p>
    <?php endif; ?>


    <!-- </div> -->
</div>

<?php
get_footer();

<?php get_header(); ?>

    <div class="breadcrumb-wrapper">
        <div class="breadcrumb">
            <?php bcn_display(); ?>
        </div>
    </div>

	<div class="container">
        
        <aside class="side-navigation" x-bind:class="collapse == true ? 'active' : ''" x-data="{ collapse: false, title: '<?php echo get_the_title(); ?>' }">

            <div class="title">關於我們</div>

            <div class="mobile-toggle-btn" x-text="title" x-on:click="collapse = !collapse"></div>
            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'sub_menu' => true
                ) );
            ?>
        </aside>
        
        <?php if ( have_posts() ) : ?>

            <?php
            while ( have_posts() ) :
                the_post();
                ?>

                <?php get_template_part( 'template-parts/content', 'page' ); ?>

            <?php endwhile; ?>

        <?php endif; ?>

	</div>

<?php
get_footer();

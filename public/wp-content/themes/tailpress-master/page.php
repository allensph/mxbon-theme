<?php get_header(); ?>

    <div class="breadcrumb-wrapper">
        <div class="breadcrumb">
            <?php bcn_display(); ?>
</div>
    </div>

	<div class="container">
        <aside class="side-navigation">
            <div class="title">關於我們</div>
            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'sub_menu' => true
                ) );
            ?>

            <!-- <select class="mobile-menu"> -->
            <?php
                /*
                $primaryMenu = array(
                    'theme_location'  => 'primary',
                    'echo'            => false,
                    'walker'          => new Mxbon_Subpage_Menu_Walker(),
                    'sub_menu' => true
                );
                echo strip_tags( wp_nav_menu( $primaryMenu ), '<option>' );
                */
            ?>
            <!-- </select> -->
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

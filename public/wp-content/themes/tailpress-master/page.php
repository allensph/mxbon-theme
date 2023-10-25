<?php get_header(); ?>

<?php
    // $parent_item_title = '上層標題';

    // if( $menu_items = wp_get_nav_menu_items( 'main-nav' ) ) {
   
    //     $parent_id = 0;

    //     foreach( $menu_items as $menu_item ) {

    //         if($menu_item->object_id == $post->ID) {
    //             $parent_id = $menu_item->menu_item_parent;
    //             break;
    //         }
    //     }
    //     if( $parent_id !== 0 ) {
    //         foreach( $menu_items as $menu_item ) {
    //             if($menu_item->ID == $parent_id) {
    //                 $parent_item_title = get_the_title( $menu_item->object_id );
    //             }
    //         }
    //     }
    //  }
?>

    <div class="breadcrumb-wrapper">
        <div class="breadcrumb">
            <?php bcn_display(); ?>
        </div>
    </div>

    <?php if( has_post_thumbnail() ) : ?>
        <div class="page-banner">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    
	<div class="container">
        
        <div class="wrapper">

            <aside class="side-navigation" x-bind:class="{ 'dropdown-collapse': collapse }" x-data="{ collapse: false, title: '<?php echo get_the_title(); ?>' }">

                <div class="wrapper">

                    <div class="title"><?php echo mxbon_get_side_navigation_title(); ?></div>

                    <div class="mobile-toggle-btn" x-text="title" x-on:click="collapse = !collapse"></div>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'sub_menu' => true
                        ) );
                    ?>
                </div>
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

	</div>

<?php
get_footer();

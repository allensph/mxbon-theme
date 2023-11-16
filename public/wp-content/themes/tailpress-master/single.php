<?php get_header(); ?>

<?php
	global $post;
	$category = get_the_category( $post );
?>
	<div class="breadcrumb-wrapper">
		<div class="breadcrumb">
			<?php bcn_display(); ?>
		</div>
	</div>

	<div class="container">
		
		<div class="wrapper">

			<aside class="side-navigation" 
                x-bind:class="{ 'dropdown-collapse': collapse, 'wrapper-fixed': fixed, 'wrapper-bottom': bottom }"
                x-init="fixed = !top"
                x-on:scroll.window="
                    top = document.querySelector('aside').getBoundingClientRect().top < 0 ? false : true;
                    bottom = document.querySelector('aside').getBoundingClientRect().bottom > document.querySelector('aside .wrapper').clientHeight ? false : true;
                    fixed = !top;
                    "
                x-data="{ 
                    collapse: false, 
                    title: '<?php echo $category[0]->name; ?>', 
                    fixed: false,
                    top: true, 
                    bottom: false
                }">
                
                <div class="wrapper">

                    <div class="title"><?php echo mxbon_get_side_navigation_title(); ?></div>

                    <div class="mobile-toggle-btn" x-text="title" x-on:click="collapse = !collapse"></div>
                    <?php
                        
                        wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'sub_menu' => true,
                            'news_submenu' => true,
                        ) );
                        
                    ?>
                </div>

            </aside>

            <?php if ( have_posts() ) : ?>

                <?php
                while ( have_posts() ) :
                    the_post();
                    ?>

                    <?php get_template_part( 'template-parts/content', 'single' ); ?>

                <?php endwhile; ?>

            <?php endif; ?>

		</div>

	</div>

<?php
get_footer();

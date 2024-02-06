<?php get_header(); ?>

<?php
    global $post;
    $post_name = $post->post_name;
    $current_language = pll_current_language();

    $form_id = $current_language == 'zh' ? 1 : 3;

    $sub_title = $current_language === 'en'
        ? str_replace( '-', ' ', str_replace( 'en', '', $post_name ) )
        : str_replace( '-', ' ', $post_name );

    $has_post_parent = has_post_parent();
    $container_class = $has_post_parent ? 'container' : 'container full-width';
?>

    <div class="breadcrumb-wrapper">
        <div class="breadcrumb">
            <?php bcn_display(); ?>
        </div>
    </div>

    <?php if( has_post_thumbnail() ) : ?>
        <div class="page-banner">

            <?php if( !has_post_parent() ) : ?>
                <div class="section-title center">
                    <?php echo $post->post_title; ?>
                    <span class="sub"><?php echo $sub_title; ?></span>
                </div>
            <?php endif; ?>
            
            <?php the_post_thumbnail(); ?>
        </div>
    <?php endif; ?>
    
	<div class="<?php echo $container_class; ?>">
        
        <div class="wrapper">

            <?php if( $has_post_parent ) : ?>

            <aside class="side-navigation" 
            x-bind:class="{ 'dropdown-collapse': collapse, 'wrapper-fixed': fixed, 'wrapper-bottom': bottom }"
            x-init="fixed = !top"
            x-on:scroll.window="
                top = document.querySelector('aside').getBoundingClientRect().top < 90 ? false : true;
                bottom = document.querySelector('aside').getBoundingClientRect().bottom > document.querySelector('aside .wrapper').clientHeight ? false : true;
                fixed = !top;
                "
            x-data="{ 
                collapse: false, 
                title: '<?php echo get_the_title(); ?>', 
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
                            'sub_menu' => true
                        ) );
                    ?>
                </div>
            </aside>

            <?php endif; ?>
        
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

    <section class="contact-us">
            <div class="container">
                <div class="section-title side">
                    <?php _e( 'Contact Us', 'tailpress' ); ?>
                    <span class="sub">Contact Us</span>
                </div>

                <?php echo do_shortcode( '[fluentform id="' . $form_id . '"]'); ?>
            </div>
            <span class="molecular-dark" data-paroller-factor="-0.1"></span>
            <span class="molecular-light" data-paroller-factor="-0.1"></span>

    </section>
<?php
get_footer();

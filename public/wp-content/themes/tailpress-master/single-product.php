<?php get_header(); ?>

<?php
    $current_language = pll_current_language();
    $form_id   = $current_language == 'zh' ? 1 : 3;

    $post_name = get_post_field('post_name');
    $sub_title = str_replace( '-', ' ', str_replace( '-en', '', $post_name ) );
    $images_uri =  get_stylesheet_directory_uri() . '/resources/images';

    $product_images  = get_field( 'gallery' );
    $usage_guideline = get_field( 'usage' );
    $addition_info   = get_field( 'addition' );

    $product_models = array();
    $product_colors = array();
    $product_detail = get_field( 'detail' );

    function acf_layout_search($array, $key, $value = null ) {
        $results = array();
    
        if ( is_array($array) ) :
    
            if( $value != null ) :
                foreach ( $array as $subarray ) {
                    if ( isset($subarray[$key]) && $subarray[$key] == $value ) {
                        $results[] = true;
                    }
                }
            else:
                foreach ( $array as $subarray ) {
                    if ( isset($subarray[$key]) && !empty($subarray[$key]) ) {
                        $results[] = true;
                    }
                }
            endif;
    
        endif;
    
        return in_array(true, $results);
    }
?>

<div class="breadcrumb-wrapper">
    <div class="breadcrumb">
        <?php bcn_display(); ?>
    </div>
</div>

<section class="product-banner">

    <div class="container">

        <header class="entry-header">
            <h1 class="product-title side"><?php echo $post->post_title; ?>
                <span class="sub"><?php echo $sub_title; ?></span>
            </h1>
        </header>

        <div class="wrapper">      
            <div class="content">

                <div class="description"><?php the_content(); ?></div>
                
                <div class="buttons">
                    <?php if( $usage_guideline['image'] || $usage_guideline['desc'] ) : ?>
                        <a class="product-btn" href="#introduction"><?php _e( 'Usage', 'tailpress' ); ?></a>
                    <?php endif; ?>

                    <?php if( acf_layout_search( $product_detail, 'series') ) : ?>
                        <a class="product-btn" href="#series"><?php _e( 'Feartures', 'tailpress' ); ?></a>
                    <?php endif; ?>

                    <?php if( acf_layout_search( $product_detail, 'specialties') ) : ?>
                        <a class="product-btn" href="#specialties"><?php _e( 'Specifications', 'tailpress'); ?></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="image">
                <?php if( $product_images ) : ?>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach( $product_images as $image ) : ?>
                                <div class="swiper-slide"><img src="<?php echo $image['url']; ?>" alt="<?php echo $post->post_title; ?>"></div>
                            <?php endforeach; ?>
                        </div>

                        <?php if( count($product_images) > 1 ) : ?>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
</section>

<section class="introduction" id="introduction">
    <div class="container">

    <?php if( $usage_guideline['image'] || $usage_guideline['desc'] ) : ?>

        <div class="wrapper usage">
            <img src="<?php echo $usage_guideline['image']['url']; ?>" alt="">
            <div class="content">
                <h2><?php _e( 'Usage', 'tailpress' ); ?></h2>
                <div class="desc"><?php echo $usage_guideline['desc']; ?></div>
            </div>
        </div>

    <?php endif; ?>

    <?php if( $addition_info['content'] ) : ?>

        <div class="wrapper addition">
            
            <?php if( $addition_info['title'] ) : ?>
                <h2><?php echo $addition_info['title']  ?></h2>
            <?php endif; ?>

            <div class="gallery">

                <?php foreach( $addition_info['content'] as $layout ) : ?>
                    
                    <?php if( 'content_gallery' === $layout['acf_fc_layout'] ) : ?>
                        
                        <?php foreach( $layout['gallery'] as $index => $image ) : ?>
                            <div class="item-wrapper">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $addition_info['title'] . $index+1;  ?>">
                            </div>
                        <?php endforeach; ?>

                    <?php endif; ?>
                    
                    <?php if( 'content_video' === $layout['acf_fc_layout'] ) : ?>
                        <div class="item-wrapper">
                            <?php echo $layout['video']; ?>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>

                <pre><?php //print_r( $addition_info['content'] ); ?></pre>
            </div>
        </div>
    <?php endif; ?>

    </div>
</section>

<?php if( $product_detail ) : ?>

    <?php foreach( $product_detail as $layout ) : ?>

        <?php if( 'feature' === $layout['acf_fc_layout'] ) : ?>

            <?php 
                $series_title = $layout['series_title'] && strlen( $layout['series_title'] )
                    ? $layout['series_title'] : __( 'Feartures', 'tailpress' )
            ?>

            <?php if( $layout['series'] ) : ?>

                <section class="series" id="series">
                    <div class="container">
                        <h2><?php echo $series_title; ?></h2>
                        <ul>
                            <?php foreach( $layout['series'] as $item ) : ?>
                                <?php 
                                    $product_models[] = $item['model'];
                                    $product_colors[] = array( 'hex' => $item['color_hex'], 'color' => $item['color'] );
                                ?>

                                <li>
                                    <h3 class="model">
                                        <?php echo $item['model']; ?>
                                        <span class="path" style="background: <?php echo $item['color_hex'] ? $item['color_hex'] : '#a1a1aa'; ?>"></span>
                                    </h3>
                                    <div class="content">
                                        <h4 class="feature" ><?php echo $item['feature']; ?></h4>
                                        <p class="description"><?php echo $item['desc']; ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </section>
            
            <?php endif; ?>

            <?php if( $layout['specialties'] ) : ?>
                
                <?php 
                    $specialties_title = $layout['specialties_title'] && strlen( $layout['specialties_title'] )
                        ? $layout['specialties_title'] : __( 'Specifications', 'tailpress' )
                ?>

                <section class="specialties" id="specialties">
                    <div class="container">
                    <h2><?php echo $specialties_title; ?></h2>
                        <?php 
                            $layout_name = 'specialties';
                            get_template_part( 'template-parts/single-product-table' );
                        ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endif; ?>

        <?php if( 'custom' === $layout['acf_fc_layout'] ) : ?>

            <?php 
                $single_table_title = $layout['single_table_title'] && strlen( $layout['single_table_title'] )
                    ? $layout['single_table_title'] : null;
            ?>
            <section class="custom-tables">
                <div class="container">
                    <?php if( $single_table_title ) : ?>
                        <h2><?php echo $single_table_title; ?></h2>
                    <?php endif; ?>
                    <?php
                        $layout_name = 'single_table';
                        get_template_part( 'template-parts/single-product-table' );
                    ?>
                </div>
            </section>

        <?php endif; ?>

    <?php endforeach; ?>

<?php endif; ?>

<?php //echo "<pre>". print_r( $product_detail, true ) ."</pre>"; ?>

<section class="contact-us">
    <div class="container">
        <div class="section-title side">
            <?php _e( 'Contact Us', 'tailpress' ); ?>
            <span class="sub">contact us</span>
        </div>

        <?php echo do_shortcode( '[fluentform id="'. $form_id .'"]'); ?>
    </div>
    <span class="molecular-dark" data-paroller-factor="-0.1"></span>
    <span class="molecular-light" data-paroller-factor="-0.1"></span>
</section>

<?php
    get_footer();
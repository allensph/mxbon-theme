<?php get_header(); ?>

<?php
    $post_name = get_post_field('post_name');
    $sub_title = str_replace( '-', ' ', $post_name );
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

                <p class="description"><?php echo strip_tags( get_the_content() ); ?></p>
                
                <div class="buttons">
                    <?php if( $usage_guideline['image'] || $usage_guideline['desc'] ) : ?>
                        <a class="product-btn" href="#introduction">使用技巧與重點</a>
                    <?php endif; ?>

                    <?php if( acf_layout_search( $product_detail, 'series') ) : ?>
                        <a class="product-btn" href="#series">產品特性</a>
                    <?php endif; ?>

                    <?php if( acf_layout_search( $product_detail, 'specialties') ) : ?>
                        <a class="product-btn" href="#specialties">產品規格</a>
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
                <h2>使用技巧與重點</h2>
                <p class="desc"><?php echo wp_strip_all_tags( $usage_guideline['desc'] ); ?></p>
            </div>
        </div>

    <?php endif; ?>

    <?php if( $addition_info['gallery'] ) : ?>
        <div class="wrapper addition">
        
            <?php if( $addition_info['title'] ) : ?>
                <h2><?php echo $addition_info['title']  ?></h2>
            <?php endif; ?>

            <div class="gallery">
                <?php foreach( $addition_info['gallery'] as $index => $image ) : ?>
                    <div class="image-wrapper">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $addition_info['title'] . $index+1;  ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    </div>
</section>

<?php if( $product_detail ) : ?>

    <?php foreach( $product_detail as $layout ) : ?>

        <?php if( 'feature' === $layout['acf_fc_layout'] ) : ?>

            <?php if( $layout['series'] ) : ?>

                <section class="series" id="series">
                    <div class="container">
                        <h2>產品特性</h2>
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

                <section class="specialties" id="specialties">
                    <div class="container">
                    <h2>產品規格</h2>
                        <?php get_template_part( 'template-parts/single-product-specialties' ); ?>
                    </div>
                </section>
            <?php endif; ?>

        <?php endif; ?>

        <?php if( 'custom' === $layout['acf_fc_layout'] ) : ?>
            <section class="custom-tables">
                <div class="container">
                    <?php get_template_part( 'template-parts/single-product-custom-table' ); ?>
                </div>
            </section>
        <?php endif; ?>

    <?php endforeach; ?>

<?php endif; ?>

<?php //echo "<pre>". print_r( $product_detail, true ) ."</pre>"; ?>

<section class="contact-us">
    <div class="container">
        <div class="section-title side">
            聯絡我們
            <span class="sub">contact us</span>
        </div>

        <?php echo do_shortcode( '[fluentform id="1"]'); ?>
    </div>
    <span class="molecular-dark" data-paroller-factor="-0.1"></span>
    <span class="molecular-light" data-paroller-factor="-0.1"></span>

</section>

<?php
    get_footer();
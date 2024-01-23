<?php get_header(); ?>

<?php 
    $current_language = pll_current_language();
    $slider_id = $current_language == 'zh' ? 4 : 5;
    $form_id   = $current_language == 'zh' ? 1 : 3;

    $terms_arg = array(
        'taxonomy' => 'product-category',
        'hide_empty' => false,
        'order' => 'ASC',
        'meta_key' => 'homepage_order',
        'orderby' => 'meta_value_num',
    );
    $terms = get_terms( $terms_arg );

    $industries_arg = array(
        'post_type' => 'industry',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'menu_order',
    );
    $industries = get_posts( $industries_arg );

    $posts_arg = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
    );
    $posts = get_posts( $posts_arg );
?>
<section class="page-banner" x-ref="banner" 
    x-on:scroll.window="banner = $refs.banner.getBoundingClientRect().top > (0 - $refs.banner.offsetHeight) ? true : false"
    >
    <?php
        echo do_shortcode('[smartslider3 slider="' . $slider_id . '"]');
    ?>
</section>
<section class="products">
    <div class="container">
        <div class="section-title center">
            <?php _e( 'Products', 'tailpress' ); ?>
            <span class="sub">Products</span>
        </div>
        <?php //if( $terms ) : ?>
            <div class="section-swiper">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($terms as $term) : ?>
                            <a class="swiper-slide" href="/product/#<?php echo $term->slug; ?>">
                                <div class="image">
                                    <div class="image-wrapper">
                                        
                                        <?php $term_img = get_field('category_image', $term); ?>
                                        
                                        <?php if( $term_img ) : ?>
                                            <img src="<?php echo $term_img['url'] ?>" alt="<?php echo $term->name; ?>">
                                        <?php endif; ?>
                                        
                                        <div class="hex-icon"></div>
                                    </div>
                                </div>
                                <div class="info">
                                    <h3 class="name"><?php echo $term->name; ?></h3>
                                    <div class="description"><?php echo $term->description; ?></div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        <?php //endif; ?>
    </div>
</section>

<section class="industries">
    <div class="container">
        <div class="section-title side">
            <?php _e( 'Industries', 'tailpress' ); ?>
            <span class="sub">Industries</span>
            
            <?php if( $industries ) : ?>
            <div class="swiper-buttons">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>                
            </div>
            <?php endif; ?>
        </div>

        <?php if( $industries ) : ?>
            <div class="section-swiper">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach( $industries as $industry ) : ?>
                            <div class="swiper-slide">
                                <?php echo get_the_post_thumbnail($industry, 'large'); ?>
                                <div class="info">
                                    <div class="content">
                                        <h3 class="name"><?php echo $industry->post_title ?></h3>
                                        <?php echo get_the_content($industry); ?>
                                    </div>
                                    <a class="permalink" href="<?php echo get_permalink( $industry ); ?>">Read More</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="post-grid">
    <div class="container">
        <div class="section-title side">
            <?php _e( 'Company Updates', 'tailpress' ); ?>
            <span class="sub">Company Updates</span>
            <?php if( $posts ) : ?>
                <a class="more-news" href="/news">Read More</a>
            <?php endif; ?>
        </div>
        <?php if( $posts ) : ?>
            <div class="posts">
                <?php foreach( $posts as $post ) : ?>
                    <?php 
                        $thumbnail = has_post_thumbnail($post) ? get_the_post_thumbnail_url($post, 'large') : '/wp-content/themes/tailpress-master/resources/images/news-default-img.svg'; 
                        $categories = get_the_category();
                        $link = get_permalink( $post );

                        if( in_category( 'knowledge' ) ) {
                            $link = get_category_link( get_category_by_slug( 'knowledge' ) );
                        }
                        if( in_category( 'knowledge-en' ) ) {
                            $link = get_category_link( get_category_by_slug( 'knowledge-en' ) );
                        }
                    ?>
                    <a class="post" href="<?php echo $link; ?>">
                        <div class="image-wrapper">
                            <img src="<?php echo $thumbnail; ?>" title="<?php echo $post->post_title; ?>" alt="<?php echo $post->post_title; ?>">    
                        </div>
                        <div class="info">
                            <?php if( $categories ) : ?>
                                <div class="category"><?php echo $categories[0]->name; ?></div>
                            <?php endif; ?>
                            <h3 class="title"><?php echo $post->post_title; ?></h3>
                            <time><?php echo get_the_date('Y/m/d', $post); ?></time>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
            <a class="more-news mobile" href="/news">Read More</a>
        <?php endif; ?>
    </div>
</section>

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
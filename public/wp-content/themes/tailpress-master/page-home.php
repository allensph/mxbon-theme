<?php get_header(); ?>

<section class="page-banner">
    <?php
        echo do_shortcode('[smartslider3 slider="4"]');
    ?>
</section>
<section class="products">
    <div class="container">
        <div class="section-title center">
            產品分類
            <span class="sub">products</span>
        </div>
        <div class="section-swiper">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        $terms_arg = array(
                            'taxonomy' => 'product-category',
                            'hide_empty' => false,
                            'order' => 'ASC',
                            'meta_key' => 'homepage_order',
                            'orderby' => 'meta_value_num',
                        );
                        $terms = get_terms( $terms_arg );
                    ?>
                    <?php foreach ($terms as $term) : ?>
                    <a class="swiper-slide" href="<?php echo get_term_link( $term, $terms_arg['taxonomy'] ); ?>">
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
    </div>
</section>

<section class="industries">
    <div class="container">
        <div class="section-title side">
            產業應用
            <span class="sub">industries</span>
            <div class="swiper-buttons">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>                
            </div>
        </div>
        <div class="section-swiper">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        $posts_arg = array(
                            'post_type' => 'industry',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'meta_key' => 'homepage_order',
                            'orderby' => 'meta_value_num',
                        );
                        $posts = get_posts( $posts_arg );
                    ?>
                    <?php foreach( $posts as $post ) : ?>
                    <div class="swiper-slide">
                        <?php echo get_the_post_thumbnail($post, 'large'); ?>
                        <div class="info">
                            <div class="content">
                                <h3 class="name"><?php echo $post->post_title ?></h3>
                                <?php echo get_the_content($post); ?>
                            </div>
                            <a class="permalink" href="<?php echo get_permalink( $post ); ?>">Read More</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="news">
    <div class="container">
        <div class="section-title side">
            公司新聞
            <span class="sub">company updates</span>
            <a class="more-news" href="/news">Read More</a>
        </div>
        <div class="posts">
            <?php
                $posts_arg = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );
                $posts = get_posts( $posts_arg );
            ?>
            <?php foreach ($posts as $post) : ?>
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
    </div>
</section>

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
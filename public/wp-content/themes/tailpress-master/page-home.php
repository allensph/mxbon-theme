<?php get_header(); ?>

<section class="products">
    <div class="wrapper">
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
                                <img src="<?php echo get_field('category_image', $term); ?>" alt="<?php echo $term->name; ?>">
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
    <div class="wrapper">
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
    <div class="wrapper">
        <div class="section-title side">
            公司新聞
            <span class="sub">company updates</span>
        </div>
        <ul class="posts">
            <?php
                $posts_arg = array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                );
                $posts = get_posts( $posts_arg );
            ?>
            <?php foreach ($posts as $post) : ?>
                <li class="post">
                    <?php 
                        $thumbnail = has_post_thumbnail($post) ? get_the_post_thumbnail_url($post, 'large') : '/wp-content/themes/tailpress-master/resources/images/news-default-img.svg'; 
                    ?>
                    <div class="image-wrapper">
                        <img src="<?php echo $thumbnail; ?>" title="<?php echo $post->post_title; ?>" alt="<?php echo $post->post_title; ?>">    
                    </div>
                    <div class="info">
                        <div class="category"><?php echo "知識交流"; ?></div>
                        <h3 class="title"><?php echo $post->post_title; ?></h3>
                        <time><?php echo get_the_date('Y/m/d', $post); ?></time>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<section class="contact-us">
    <div class="wrapper">
        <div class="section-title side">
            聯絡我們
            <span class="sub">contact us</span>
        </div>

        <?php echo do_shortcode( '[fluentform id="1"]'); ?>
    </div>
    <span class="molecular-dark" data-paroller-factor="-0.2"></span>
    <span class="molecular-light" data-paroller-factor="-0.2"></span>

</section>
<?php
    get_footer();
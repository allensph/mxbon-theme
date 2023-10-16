<?php get_header(); ?>

<?php
    // echo "<pre>". print_r($post,true) ."</pre>";
    $post_name = get_post_field('post_name');
    $sub_title = str_replace( '-', ' ', $post_name );
    $images_uri =  get_stylesheet_directory_uri() . '/resources/images';

    $product_images  = get_field( 'gallery' );
    $usage_guideline = get_field( 'usage' );
    $addition_info   = get_field( 'addition' );
    $product_series  = get_field('series');
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
                    <a class="product-btn" href="#">使用技巧與重點</a>
                    <a class="product-btn" href="#">產品特性</a>
                    <a class="product-btn" href="#">產品規格</a>
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

<section class="introduction">
    <div class="container">

    <?php if( $usage_guideline['image'] || $usage_guideline['desc'] ) : ?>

        <div class="wrapper usage">
            <img src="<?php echo $usage_guideline['image']['url']; ?>" alt="">
            <div class="content">
                <h2>使用技巧與重點</h2>
                <p class="desc"><?php echo $usage_guideline['desc']; ?></p>
            </div>
        </div>

    <?php endif; ?>

    <?php if( $addition_info['gallery'] ) : ?>
        <div class="wrapper addition">
        
            <?php if( $addition_info['gallery'] ) : ?>
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

<?php if( $product_series ) : ?>

<section class="series">
    <div class="container">
        <h2>產品特性</h2>
        
        <ul>
            <?php foreach( $product_series as $item ) : ?>
            <li>
                <h3 class="model">
                    <?php echo $item['model']; ?>
                    <span class="path" style="background: <?php echo $item['color_hex']; ?>"></span>
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

<?php
    get_footer();
<?php get_header(); ?>

<?php
    $post_name = get_post_field('post_name');
    $sub_title = str_replace( '-', ' ', $post_name );
    $banner_bg = get_the_post_thumbnail_url($post);
    $products = get_field('related_products');

    //echo "<pre>" . print_r( $products, true ) ."</pre>";
?>

<div class="breadcrumb-wrapper">
    <div class="breadcrumb">
        <?php bcn_display(); ?>
    </div>
</div>

<section class="industry-banner" style="<?php echo "background-image: url('{$banner_bg}')"; ?>">
    <div class="container">

        <header class="entry-header">
            <h1 class="industry-title side"><?php echo $post->post_title; ?>
                <span class="sub"><?php echo $sub_title; ?></span>
            </h1>
        </header>

        <div class="wrapper">
            <div class="content">
                <p class="description"><?php echo strip_tags( get_the_content() ); ?></p>
            </div>
            <div class="image">

            </div>
        </div>

    </div>
</section>

<section class="industry-content">
    <div class="container">

        <header class="section-header">
            <h1 class="section-title side">相關產品
                <span class="sub">Related Products</span>
            </h1>
        </header>

        <div class="wrapper">

            <?php if( $products ) : ?>
                <ul class="products">
                    <?php foreach( $products as $product ) : ?>
                        <li>
                            <a href="<?php the_permalink( $product ); ?>">
                                <div class="image-wrapper">
                                    <?php  
                                        $product_img = get_the_post_thumbnail_url( $product, 'medium' );
                                        $categories = get_the_terms( $product, 'product-category' );

                                        $categoery_img = get_field( 'category_image', $categories[0] );
                                        $image_path = $product_img ? $product_img : $categoery_img['url'];
                                    ?>
                                    <img src="<?php echo $image_path ?>" alt="<?php echo $product->post_title; ?>">
                                </div>
                                <h3><?php echo $product->post_title; ?></h3>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif; ?>
        </div>
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
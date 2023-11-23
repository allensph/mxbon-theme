<?php get_header(); ?>

<?php
	$post_name = get_post_field('post_name');
	$sub_title = str_replace( '-', ' ', $post_name );
    $images_uri =  get_stylesheet_directory_uri() . '/resources/images';

    $categories = get_terms([
        'taxonomy' => 'product-category',
        'hide_empty' => false,
        'order' => 'ASC',
        'meta_key' => 'homepage_order',
        'orderby' => 'meta_value_num',
    ]);
?>

<div class="breadcrumb-wrapper">
    <div class="breadcrumb">
        <?php bcn_display(); ?>
    </div>
</div>

<section class="products-banner">
    
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <header class="entry-header">
                    <h1 class="page-title side">
                        <?php echo get_the_title(); ?>
                        <span class="sub">
                            <?php echo $sub_title; ?>
                        </span>
                    </h1>
                </header>
                <p class="description"><?php echo wp_strip_all_tags( get_the_content() ); ?></p>
            </div>

            <div class="image">
                <img src="<?php echo $images_uri; ?>/products.png" alt="">
            </div>
        </div>        
    </div>
    
</section>

<section class="products-categories">
    <div class="container">
        <?php if( $categories ) : ?>
        <?php foreach( $categories as $category) : ?>

            <?php $category_img = get_field( 'category_image', $category );  ?>


            <div class="card">
                <?php if( $category_img ) : ?>
                    <img class="image" src="<?php echo $category_img['url']; ?>" alt="<?php echo $category->name; ?>">
                <?php endif; ?>

                <div class="content">
                    <h2><?php echo $category->name; ?></h2>
                    <p><?php echo $category->description; ?></p>
                    <a href="<?php echo "/product/#{$category->slug}"; ?>" class="permalink">Read more</a>
                </div>

            </div>

        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();

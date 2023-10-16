<?php get_header(); ?>

<?php
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

<div class="container">

    <div class="wrapper">

        <aside class="side-navigation" 
            x-bind:class="{ 'dropdown-collapse': collapse, 'wrapper-fixed': fixed, 'wrapper-bottom': bottom }"
            x-init="fixed = (window.pageYOffset < 182) ? false : true"
            x-on:scroll.window="
                fixed = (window.pageYOffset < 182) ? false : true;
                bottom = document.querySelector('aside').getBoundingClientRect().bottom > document.querySelector('aside .wrapper').clientHeight ? false : true;
                "
            x-data="{ 
                collapse: false, 
                current: <?php echo $categories[0]->term_id; ?>, 
                title: '<?php echo $categories[0]->name; ?>', 
                fixed: false,
                bottom: false
            }">

            <div class="wrapper">

                <div class="title">產品分類</div>

                <div class="mobile-toggle-btn" x-text="title" x-on:click="collapse = !collapse"></div>
                
                <ul class="menu">

                    <?php if( $categories ) : ?>
                    <?php foreach( $categories as $category) : ?>

                        <li class="menu-item" x-bind:class="current == <?php echo $category->term_id; ?> ? 'current-menu-item' : ''"
                            x-on:click="
                            title='<?php echo $category->name; ?>'; 
                            collapse = !collapse;
                            current = <?php echo $category->term_id; ?>;
                            ">
                            <a href="<?php echo "#{$category->slug}"; ?>"><?php echo $category->name; ?></a>
                        </li>

                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

            </div>
        </aside>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php if( $categories ) : ?>
        <?php foreach( $categories as $category) : ?>

            <section class="<?php echo $category->id ?> <?php echo $category->slug ?>" id="<?php echo $category->slug ?>">

                <header class="section-header">
                    <h2 class="section-title side">
                        <?php echo $category->name ?>
                        <span class="sub">
                            <?php $sub_title = str_replace( '-', ' ', $category->slug ); ?>
                            <?php echo $sub_title; ?>
                        </span>
                    </h2>
                </header>

                <?php 
                    $args = array(
                        'post_type' => 'product',
                        'numberposts' => -1,
                        'order' => 'asc',
                        'order_by' => 'publish_date',
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'product-category',
                            'field' => 'slug',
                            'terms' => $category->slug,
                            )
                        ),
                    );
                    $products = get_posts($args); 
                ?>

                <div class="section-content">
                    <?php if( $products ) : ?>
                    <ul class="products">
                        <?php foreach( $products as $product ) : ?>
                            <li>
                                <a href="<?php the_permalink( $product ); ?>">
                                    <div class="image-wrapper">
                                        <?php  
                                            $product_img = get_the_post_thumbnail_url( $product, 'medium' );
                                            $categoery_img = get_field( 'category_image', $category );
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

            </section>

        <?php endforeach; ?>
        <?php endif; ?>

        </article>

    </div>
    
</div>

<?php
    get_footer();

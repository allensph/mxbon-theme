<?php get_header(); ?>

<?php
    $categories = get_terms( array(
        'taxonomy' => 'product-category',
        'hide_empty' => true,
        'order' => 'ASC',
        'meta_key' => 'homepage_order',
        'orderby' => 'meta_value_num',
    ) );
    $categories_count = $categories ? count( $categories ) : 0;
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
            x-init="
                fixed = !top ; anchor = current ;
                $nextTick( () => {
                    <?php foreach( range( 1, $categories_count ) as $key ) : ?>
                        $refs.content<?php echo $key; ?>.style.scrollMarginTop = $refs.menuitem<?php echo $key; ?>.getBoundingClientRect().top-96+'px';
                    <?php endforeach; ?>            
                })
                "
            x-on:scroll.window="
                top = document.querySelector('aside').getBoundingClientRect().top < 90 ? false : true;
                bottom = document.querySelector('aside').getBoundingClientRect().bottom > document.querySelector('aside .wrapper').clientHeight ? false : true;
                fixed = !top;
                $nextTick( () => {
                    <?php foreach( range( 1, $categories_count ) as $key ) : ?>
                        if( $refs.content<?php echo $key; ?>.getBoundingClientRect().top > 90 
                         && $refs.content<?php echo $key; ?>.getBoundingClientRect().top < ($refs.menuitem<?php echo $key; ?>.getBoundingClientRect().top)+56 ) { current = '<?php echo $categories[$key-1]->slug ?>' }
                    <?php endforeach; ?>            
                })
                "
            x-data="{ 
                collapse: false, 
                current: window.location.hash.replace('#', '') ? window.location.hash.replace('#', '') : '<?php echo $categories[0]->slug; ?>' , 
                last: '',
                title: '<?php echo $categories[0]->name; ?>', 
                fixed: false,
                top: true,
                bottom: false
            }">

            <div class="wrapper">

                <div class="title"><?php _e( 'Products', 'tailpress' ); ?></div>

                <div class="mobile-toggle-btn" x-text="title" x-on:click="collapse = !collapse"></div>
                
                <ul class="menu">

                    <?php if( $categories ) : ?>
                    <?php foreach( $categories as $key => $category) : ?>

                        <li class="menu-item"
                            x-bind:class="current == '<?php echo $category->slug; ?>' ? 'current-menu-item' : ''"
                            x-on:click="
                            title='<?php echo $category->name; ?>'; 
                            collapse = !collapse;
                            anchor = current;
                            $refs.article.style.marginTop = 0;"
                            x-ref="menuitem<?php echo $key + 1; ?>"
                            >
                            <a href="<?php echo "#{$category->slug}"; ?>"><?php echo $category->name; ?></a>
                        </li>

                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

            </div>
        </aside>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> x-ref="article">

        <?php if( $categories ) : ?>
        <?php foreach( $categories as $key => $category) : ?>

            <section class="product-section <?php echo $category->slug ?>">

                <header class="section-header">
                    <h2 class="section-title side">
                        <?php echo $category->name ?>
                        <span class="sub">
                            <?php $sub_title = str_replace( '-', ' ', str_replace( '-en', '', $category->slug ) ); ?>
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

                <div class="section-content" id="<?php echo $category->slug ?>" 
                    x-ref="content<?php echo $key+1; ?>"
                    x-on:scroll.window=""
                    >

                    <?php if( $products ) : ?>
                    <ul class="products">
                        <?php foreach( $products as $product ) : ?>
                            <li>
                                <a href="<?php the_permalink( $product ); ?>">
                                    <div class="image-wrapper">
                                        <?php  
                                            //$product_img = get_the_post_thumbnail_url( $product, 'medium' );

                                            $product_images  = get_field( 'gallery', $product );
                                            $product_img = $product_images ? $product_images[0]['url'] : null;
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

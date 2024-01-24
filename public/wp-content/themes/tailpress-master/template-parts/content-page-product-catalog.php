<?php
    global $current_language;
    $catalogs = get_field( 'catalogs', 'option');
?>

<section class="post-grid">
    <div class="container">  

    <?php if( $catalogs ) : ?>
    <?php foreach ( $catalogs as $catalog ) : ?>

        <?php if( $catalog && $catalog['files'] ) : ?>

        <?php 
            $category = get_term( $catalog['category'], 'product-category');
            $subtitle = strtoupper( str_replace( "-", " ", $category->slug ) );
        ?>
        <h2 class="content-title" id="<?php echo $category->slug; ?>">
            <?php echo $category->name; ?>
            <?php if( $current_language !== "en" ) : ?>
                <span><?php echo $subtitle; ?></span>
            <?php endif; ?>
        </h2>

        <div class="posts">

        <?php foreach ( $catalog['files'] as $item ) : ?>

            <a class="post" href="<?php echo $item['file']['url']; ?>" target="_blank">
                <?php 
                    $thumbnail = $item['image'] ? $item['image']['sizes']['medium_large'] : '/wp-content/themes/tailpress-master/resources/images/news-default-img.svg';
                    
                    if( $current_language === "en" ) {
                        $product_title  = sprintf( "<h3 class=\"title\">%s</h3>", $item['name'] );
                    } else {
                        $title_array = explode(' ', $item['name'], 2);
                        $product_title  = sprintf( "<h3 class=\"title\">%s</h3>", $title_array[0] );
                        $product_title .= sprintf( "<div class=\"sub\">%s</div>", $title_array[1] );
                    }
                ?>
                <div class="image-wrapper">
                    <img src="<?php echo $thumbnail; ?>" title="<?php echo $item['name']; ?>" alt="<?php echo $item['name']; ?>">    
                </div>
                <div class="info">
                    <div class="category"><?php _e( 'Catalog', 'tailpress' ); ?></div>
                    <?php echo $product_title; ?>
                </div>
            </a>
        <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php endforeach; ?>
    <?php endif; ?>
        
    </div>
</section>
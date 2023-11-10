<?php
    $catalogs = get_field( 'catalogs', 'option');
    //echo "<pre>" . print_r( $catalogs, true) . "</pre>";
?>

<section class="news">
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
            <span><?php echo $subtitle; ?></span>
        </h2>

        <div class="posts">

        <?php foreach ( $catalog['files'] as $item ) : ?>

            <a class="post" href="<?php echo $item['file']['url']; ?>" download>
                <?php 
                    $thumbnail = $item['image'] ? $item['image']['sizes']['medium_large'] : '/wp-content/themes/tailpress-master/resources/images/news-default-img.svg';
                    $product_title = explode(' ', $item['name'], 2);

                ?>
                <div class="image-wrapper">
                    <img src="<?php echo $thumbnail; ?>" title="<?php echo $item['name']; ?>" alt="<?php echo $item['name']; ?>">    
                </div>
                <div class="info">
                    <div class="category"><?php echo "產品型錄"; ?></div>
                    <h3 class="title"><?php echo $product_title[0]; ?></h3>
                    <div class="sub"><?php echo $product_title[1]; ?></div>
                </div>
            </a>
        <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php endforeach; ?>
    <?php endif; ?>
        
    </div>
</section>
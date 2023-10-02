<?php
    $banner = get_field( 'banner', 'option' );
    $blocks = get_field( 'innovation_content', 'option' );

    $images_uri =  get_stylesheet_directory_uri() . '/resources/images';
?>

<section class="innovation-banner">
    <div class="content">
        <?php if( $banner['title'] ) : ?>
            <h2><?php echo $banner['title']; ?></h2>
        <?php endif; ?>
        <div class="image-group">
            <div class="sketch">
                <img id="bg" src="<?php echo $images_uri; ?>/sketch.png" alt="" data-aos="fade" data-aos-duration="100">
                <canvas id="fg"></canvas>
            </div>

            <?php if( $banner['photo'] ) : ?>
                <img class="photo" data-aos="fade-up" data-aos-delay="1800" data-aos-duration="800"
                    src="<?php echo $banner['photo']['url']; ?>"
                    width="<?php echo $banner['photo']['width']; ?>"
                    height="<?php echo $banner['photo']['height']; ?>"
                    alt="<?php echo get_the_title(); ?>"
                >
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="innovation">
    <?php if( $blocks ) : ?>
    <?php foreach( $blocks as $block ) : ?>

        <div class="wrapper">

            <?php if($block['photo']) : ?>
                <div class="image" data-aos="fade" data-aos-duration="1000">
                    <img src="<?php echo $block['photo']['url'] ?>"
                        width="<?php echo $block['photo']['width'] ?>"
                        height="<?php echo $block['photo']['height'] ?>"
                        alt="<?php echo get_the_title(); ?>"
                        >
                </div>
            <?php endif; ?>

            <?php if($block['title']) : ?>
                <div class="content" data-aos="fade-up" data-aos-delay="500" data-aos-duration="800">
                    <h3><?php echo $block['title'] ?></h3>
                
                    <?php if($block['desc']) : ?>
                        <?php echo $block['desc'] ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        </div>

    <?php endforeach; ?>
    <?php endif; ?>
</section>
<?php
    $q_policy = get_field( 'q_policy', 'option' );
    $quality_items = get_field( 'q_certification', 'option' );    
    $e_policy = get_field( 'e_policy', 'option' );
    $enviroment_items = get_field( 'e_certification', 'option' );
    $awards = get_field( 'awards', 'option' );

    $images_uri =  get_stylesheet_directory_uri() . '/resources/images';
?>

<section class="ceritfication-block quality">
    <div class="wrapper">
        <div class="content">
            <h2>品質政策</h2>
            <?php echo $q_policy; ?>
            <span class="decoration" data-aos="fade-down-right" data-aos-duration="1200" ></span>
        </div>

    <?php if( $quality_items ) : ?>
        <ul class="certifications" data-aos="fade-down" data-aos-duration="1200">
        <?php foreach( $quality_items as $item ) : ?>
            <li>
                <img src="<?php echo $item['image']['sizes']['medium']; ?>"
                    width="<?php echo $item['image']['sizes']['medium-width']; ?>"
                    height="<?php echo $item['image']['sizes']['medium-height']; ?>"
                    alt="<?php echo $item['desc']; ?>"
                    >
                
                <span class="desc"><?php echo $item['desc']; ?></span>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    </div><!--wrapper-->
</section>

<section class="ceritfication-block enviroment">
    <div class="wrapper">
        <div class="content">
            <h2>環境政策</h2>
            <?php echo $e_policy; ?>
            <span class="decoration" data-aos="fade-down-left" data-aos-duration="1200" ></span>
        </div>
    </div>

    <?php if( $enviroment_items ) : ?>
        <ul class="certifications" data-aos="fade-down" data-aos-duration="1200">
        <?php foreach( $enviroment_items as $item ) : ?>
            <li>
                <img src="<?php echo $item['image']['sizes']['medium']; ?>"
                        width="<?php echo $item['image']['sizes']['medium-width']; ?>"
                        height="<?php echo $item['image']['sizes']['medium-height']; ?>"
                        alt="<?php echo $item['desc']; ?>"
                        >
                <span class="desc"><?php echo $item['desc']; ?></span>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>

</section>

<section class="achivement">
    <h2>獲獎與肯定</h2>
    <?php if( $awards ) : ?>
        <ul class="awards">
        <?php foreach( $awards as $award ) : ?>
            <li data-aos="fade-up" data-aos-duratrion="500" data-aos-delay="200">
                <?php if( $award['image'] ) : ?>
                    <div class="image-wrapper">
                        <img src="<?php echo $award['image']['sizes']['medium']; ?>"
                            width="<?php echo $award['image']['sizes']['medium-width']; ?>"
                            height="<?php echo $award['image']['sizes']['medium-height']; ?>"
                            alt="<?php echo $award['name']; ?>">
                        <?php endif; ?>
                    </div>
                
                <?php if( $award['image'] ) : ?>
                    <span class="name"><?php echo $award['name']; ?></span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
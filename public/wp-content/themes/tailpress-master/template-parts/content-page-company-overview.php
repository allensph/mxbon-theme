<?php
    $founder = get_field( 'founder', 'option');
    $profile = get_field( 'profile', 'option');
    $feature = get_field( 'feature', 'option');
    $counter = get_field( 'counter', 'option');
    $images_uri =  get_stylesheet_directory_uri() . '/resources/images';
?>

<section class="intro">
    <?php if ( $founder ) : ?>
        <img class="founder" src="<?php echo $founder['url']; ?>"
            width="<?php echo $founder['width']; ?>"
            height="<?php echo $founder['height']; ?>"
            alt="創辦人"
        >
    <?php endif; ?>

    <?php if ( $profile ) : ?>
        <div class="profile">
            <h2>創於1994，北回化學是國內外消費性和工業市場性領先的專業氰基丙烯酸酯瞬間接著劑製造商。</h2>
            <ul>
                <?php if ( $profile['founder'] ) : ?>
                <li>
                    <h3>創辦人</h3>
                    <span><?php echo $profile['founder']; ?></span>
                </li>
                <?php endif; ?>

                <?php if ( $profile['since'] ) : ?>
                <li>
                    <h3>公司設立</h3>
                    <span><?php echo $profile['since']; ?> 年</span>
                </li>
                <?php endif; ?>

                <?php if ( $profile['products'] ) : ?>
                <li>
                    <h3>主要產品</h3>
                    <span><?php echo $profile['products']; ?></span>
                </li>
                <?php endif; ?>

                <?php if ( $profile['capacity'] ) : ?>
                <li>
                    <h3>產能</h3>
                    <span><?php echo $profile['capacity']; ?> 噸以上/年</span>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    <?php endif; ?>

</section>

<section class="specialty">
    <?php if( $feature ) : ?>
    <ul class="features">
        <li>
            <div class="icon">
                <img src="<?php echo $images_uri ?>/features_tech.svg" alt="">
                <span class="inner"></span>
            </div>
            <div class="description">
                <h3>科技</h3>
                <?php if( $feature['technology'] ) : ?>
                    <p><?php echo $feature['technology']; ?></p>
                <?php endif; ?>
            </div>
        </li>
        <li>
            <div class="icon">
                <img src="<?php echo $images_uri ?>/features_innovation.svg" alt="">
                <span class="inner"></span>
            </div>
            <div class="description">
                <h3>創新</h3>
                <?php if( $feature['innovation'] ) : ?>
                    <p><?php echo $feature['innovation']; ?></p>
                <?php endif; ?>
            </div>
        </li>
    </ul>
    <?php endif; ?>
</section>

<section class="statistics">
    <?php if( $counter ) : ?>
    <ul class="counters">
        <?php if( $counter['experience'] ) : ?>
        <li>
            <img src="<?php echo $images_uri; ?>/counter_exp.svg" alt="專業經驗">
            <h3 class="counter"><?php echo $counter['experience']; ?>+</h3>
            <h4 class="target">專業經驗</h4>
        </li>
        <?php endif; ?>

        <?php if( $counter['employee'] ) : ?>
        <li>
            <img src="<?php echo $images_uri; ?>/counter_employee.svg" alt="員工">
            <h3 class="counter"><?php echo $counter['employee']; ?>+</h3>
            <h4 class="target">員工</h4>
        </li>
        <?php endif; ?>

        <?php if( $counter['product'] ) : ?>
        <li>
            <img src="<?php echo $images_uri; ?>/counter_product.svg" alt="產品">
            <h3 class="counter"><?php echo $counter['product']; ?>+</h3>
            <h4 class="target">產品</h4>
        </li>
        <?php endif; ?>

        <?php if( $counter['branch'] ) : ?>
        <li>
            <img src="<?php echo $images_uri; ?>/counter_branch.svg" alt="分公司">
            <h3 class="counter"><?php echo $counter['branch']; ?>+</h3>
            <h4 class="target">分公司</h4>
        </li>
        <?php endif; ?>

        <?php if( $counter['nation'] ) : ?>
        <li>
            <img src="<?php echo $images_uri; ?>/counter_nation.svg" alt="服務國家">
            <h3 class="counter"><?php echo $counter['nation']; ?>+</h3>
            <h4 class="target">服務國家</h4>
        </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</section>
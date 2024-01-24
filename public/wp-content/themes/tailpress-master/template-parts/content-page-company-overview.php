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
            alt="<?php _e( 'Founder', 'tailpress' ); ?>"
        >
    <?php endif; ?>

    <?php if ( $profile ) : ?>
        <div class="profile">
            <?php if ( $profile['title'] ) : ?>
                <h2><?php echo $profile['title']; ?></h2>
            <?php endif; ?>
            <ul>
                <?php if ( $profile['founder'] ) : ?>
                <li>
                    <h3 class="content-title"><?php _e( 'Founder', 'tailpress' ); ?></h3>
                    <span><?php echo $profile['founder']; ?></span>
                </li>
                <?php endif; ?>

                <?php if ( $profile['since'] ) : ?>
                <li>
                    <h3 class="content-title"><?php _e( 'Since', 'tailpress' ); ?></h3>
                    <span><?php echo sprintf( __( 'Year %d', 'tailpress' ), $profile['since'] ); ?></span>
                </li>
                <?php endif; ?>

                <?php if ( $profile['products'] ) : ?>
                <li>
                    <h3 class="content-title"><?php _e( 'Main Products', 'tailpress' ); ?></h3>
                    <span><?php echo $profile['products']; ?></span>
                </li>
                <?php endif; ?>

                <?php if ( $profile['capacity'] ) : ?>
                <li>
                    <h3 class="content-title"><?php _e( 'Capacity', 'tailpress' ); ?></h3>
                    <span><?php echo sprintf(_n( '%d metric ton / year', 'Over %d metric tons / year', $profile['capacity'], 'tailpress' ), $profile['capacity'] ); ?></span>
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
                <h3><?php _e( 'Technology', 'tailpress' ); ?></h3>
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
                <h3><?php _e( 'Innovation', 'tailpress' ); ?></h3>
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
        <?php if( $counter['experience'] ) : 
            $locale_experience = sprintf(_n('experience', 'experiences', $counter['experience'], 'tailpress'), $counter['experience'] );
            ?>
            <li>
                <img src="<?php echo $images_uri; ?>/counter_exp.svg" alt="<?php echo $locale_experience; ?>">
                <h3 class="counter"><?php echo $counter['experience']; ?>+</h3>
                <h4 class="target"><?php echo $locale_experience; ?></h4>
            </li>
        <?php endif; ?>

        <?php if( $counter['employee'] ) : 
            $locale_employee = sprintf(_n('employee', 'employees', $counter['employee'], 'tailpress'), $counter['employee'] );
            ?>
            <li>
                <img src="<?php echo $images_uri; ?>/counter_employee.svg" alt="<?php echo $locale_employee; ?>">
                <h3 class="counter"><?php echo $counter['employee']; ?>+</h3>
                <h4 class="target"><?php echo $locale_employee; ?></h4>
            </li>
        <?php endif; ?>

        <?php if( $counter['product'] ) : 
            $locale_product = sprintf(_n('product', 'products', $counter['product'], 'tailpress'), $counter['product'] );
            ?>
            <li>
                <img src="<?php echo $images_uri; ?>/counter_product.svg" alt="<?php echo $locale_product; ?>">
                <h3 class="counter"><?php echo $counter['product']; ?>+</h3>
                <h4 class="target"><?php echo $locale_product; ?></h4>
            </li>
        <?php endif; ?>

        <?php if( $counter['branch'] ) :
            $locale_branch = sprintf(_n('branch', 'branches', $counter['branch'], 'tailpress'), $counter['branch'] );
            ?>
            <li>
                <img src="<?php echo $images_uri; ?>/counter_branch.svg" alt="<?php echo $locale_branch; ?>">
                <h3 class="counter"><?php echo $counter['branch']; ?>+</h3>
                <h4 class="target"><?php echo $locale_branch; ?></h4>
            </li>
        <?php endif; ?>

        <?php if( $counter['nation'] ) : 
            $locale_nation = sprintf(_n('nation', 'nations', $counter['nation'], 'tailpress'), $counter['nation'] )
            ?>
            <li>
                <img src="<?php echo $images_uri; ?>/counter_nation.svg" alt="<?php echo $locale_nation; ?>">
                <h3 class="counter"><?php echo $counter['nation']; ?>+</h3>
                <h4 class="target"><?php echo $locale_nation; ?></h4>
            </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
</section>
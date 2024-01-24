<?php $images_uri =  get_stylesheet_directory_uri() . '/resources/images'; ?>

<section class="philsosphy">
    <div class="wrapper">
        <?php $philsosphies = get_field('philsosphy', 'option'); ?>
        
        <?php if( $philsosphies ) : ?>
            <ol>
            <?php foreach( $philsosphies as $index => $philsosphy ) : ?>

            <?php $delay = 100 + $index * 700; ?>

                <li data-aos="fade" data-aos-delay="<?php echo $delay; ?>" data-aos-duration="1000">
                    <span></span>
                    <h3><?php echo $philsosphy['title']; ?></h3>
                </li>

            <?php endforeach; ?>
            </ol>
        <?php endif; ?>
        
    </div>
</section>

<section class="vision">
    <div class="wrapper">
        <div class="content" data-aos="fade-up" data-aos-duration="500">
            <h3><?php _e( 'Vision Statement', 'tailpress' ); ?></h3>
            <?php echo get_field('vision', 'option'); ?>
            <span class="vision-bg" data-paroller-factor="-0.1">
            </span>
        </div>
        <img src="<?php echo "{$images_uri}/vision.png"; ?>" alt="<?php _e( 'Vision Statement', 'tailpress' ); ?>" data-aos="fade-up" data-aos-duration="500">
    </div>
</section>

<section class="sdgs">
    <div class="wrapper">
        <div class="content">
            <h3><?php _e( 'Contribution to the SDGs', 'tailpress' ); ?></h3>
            <?php 
                $goals = get_field('sdg_goals', 'option'); 
                $list = implode('、', $goals);
                $locale_sdgs_description = sprintf( __( '%1$s Sustainable Development Goals: %2$s' , 'tailpress'),  strval( count($goals) ), $list );
            ?>
            <p><?php echo $locale_sdgs_description; ?></p>
        </div>
        <div class="sdg-goals">
            
            <?php for ( $goal = 1; $goal <= 17 ; $goal++ ) : ?>
                <?php
                    $number = strlen( (string)$goal ) == 1 ? "0" . (string)$goal : (string)$goal;
                    $class = in_array( $goal, $goals) ? ' active' : '';
                ?>
                <img class="goal<?php echo $class;?>" src="<?php echo "{$images_uri}/E-WEB-Goal-{$number}.png" ?>" alt="">

            <?php endfor; ?>
        </div>
    </div>
</section>
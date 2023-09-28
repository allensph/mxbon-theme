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
            <h3>願景使命</h3>
            <p><?php echo get_field('vision', 'option'); ?></p>
            <span class="vision-bg" data-paroller-factor="-0.1">
            </span>
        </div>
        <img src="<?php echo "{$images_uri}/vision.png"; ?>" alt="願景使命" data-aos="fade-up" data-aos-duration="500">
    </div>
</section>

<section class="sdgs">
    <div class="wrapper">
        <div class="content">
            <h3>北回對SDGs的主要貢獻</h3>
            <?php 
                $goals = get_field('sdg_goals', 'option'); 
                $list = implode('、', $goals);
            ?>
            <p>對照北回永續原則、重要利害關係人與 SDGs，我們持續努力回應的永續發展重點包括目標 <?php echo $list; ?> 等 <?php echo count($goals); ?> 個目標。</p>
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
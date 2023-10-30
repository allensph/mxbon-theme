<?php
    $intro = get_field( 'hr_intro', 'option' );
    $steps = get_field( 'hr_steps', 'option' );
    $contacts = get_field( 'hr_contacts', 'option' );
    $activities = get_field( 'activities', 'option' );
?>

<section class="recruitment-intro">
    <div class="container">
        <?php if( $intro ) : ?>
            <div class="wrapper description">
                <?php echo $intro; ?>
            </div>
        <?php endif; ?>

        <?php if( $steps ) : ?>
            <div class="wrapper steps">
                <ol>
                <?php foreach( $steps as $step ) : ?>
                    <li data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                        <h2><?php echo $step['title']; ?></h2>
    
                        <div class="card">
                            <div class="icon">
                                <img src="<?php echo $step['icon']['url']; ?>" alt="<?php echo $step['subtitle']; ?>">
                            </div>
                            
                            <div class="content">
                                <h3><?php echo $step['subtitle']; ?></h3>
                                <p class="description"><?php echo $step['content']; ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ol>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php if( $contacts ) : ?>

<section class="recruitment-contacts">
    <div class="container">
        <h2 class="content-title subline">聯絡我們（人資組）</h2>
        <ul class="contacts">
            <?php foreach( $contacts as $contact ) : ?>
                <li>
                    <i class="fa-solid fa-<?php echo $contact['type']?>"></i>
                    <a href="<?php echo $contact['href']?>"><?php echo $contact['text']?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php endif;?>

<?php if( $activities ) : ?>

<section class="company-activities">
    <div class="container">

        <h2 class="content-title">
            公司活動
            <div class="swiper-buttons">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>                
            </div>
        </h2>

        <div class="section-swiper">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                        /*
                        $posts_arg = array(
                            'post_type' => 'industry',
                            'posts_per_page' => -1,
                            'order' => 'ASC',
                            'meta_key' => 'homepage_order',
                            'orderby' => 'meta_value_num',
                        );
                        $posts = get_posts( $posts_arg );
                        */
                    ?>
                    <?php foreach( $activities as $activity ) : ?>
                    <div class="swiper-slide">
                        <?php echo wp_get_attachment_image( $activity['id'], 'large'); ?>
                        <div class="info">
                            <div class="content">
                                <h3 class="name"><?php echo $activity['title']; ?></h3>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>

<?php endif; ?>
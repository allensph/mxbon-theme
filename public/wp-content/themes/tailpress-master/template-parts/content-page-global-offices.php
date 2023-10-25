<?php
    $locations = get_field('locations', 'option');
?>

<section class="location-map">
    <?php the_content(); ?>
</section>

<section class="location-list">
    <?php if( $locations ) : ?>
        <div class="locations">
            <?php foreach( $locations as $location ) : ?>

                <div class="location">
                    
                    <h2 class="content-title subline"><?php echo $location['title']; ?></h2>
                    
                    <ul class="detail">

                        <?php if( $location['address'] ) : ?>
                            <li class="address"><?php echo $location['address']; ?></a></li>
                        <?php endif; ?>

                        <?php if( $location['tel'] ) : ?>
                            <li class="tel"><?php echo $location['tel']; ?></a></li>
                        <?php endif; ?>

                        <?php if( $location['fax'] ) : ?>
                            <li class="fax"><?php echo $location['fax']; ?></a></li>
                        <?php endif; ?>

                        <?php if( $location['contact'] && $location['email'] ) : ?>
                            <li class="email"><a href="mailto:<?php echo $location['email']; ?>">
                                <?php echo "{$location['contact']} ({$location['email']})"; ?>
                            </a></li>
                        <?php elseif( $location['email'] ) : ?>
                            <li class="email"><a href="mailto:<?php echo $location['email']; ?>">
                                <?php echo $location['email']; ?>
                            </a></li>
                        <?php endif; ?>

                        <?php if( $location['website'] ) : ?>
                            <li class="website"><a href="<?php echo $location['website']; ?>" target="_blank">
                                <?php echo $location['website']; ?>
                            </a></li>
                        <?php endif; ?>

                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
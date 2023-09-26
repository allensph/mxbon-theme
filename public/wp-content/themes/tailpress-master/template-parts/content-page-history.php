<section class="history">

<?php
    $stages = get_field('stage', 'option');
    
    if ( $stages ) :
    foreach ( $stages as $stage ) : ?>
        
        <div class="stage-wrapper">
            <div class="stage">
                <h2><?php echo $stage['title']; ?></h2>
                <h3><?php echo $stage['subtitle']; ?></h3>
                <?php if ( $stage['stage_bg'] ): ?>
                    <span class="stage-bg" 
                        style="background: url('<?php echo $stage['stage_bg']['url']; ?>'); background-repeat:no-repeat; background-position: center;" 
                        data-paroller-factor="-0.1">
                    </span>
                <?php endif; ?>
            </div><!--stage-->

            <?php if( $stage['record'] ) : ?>

            <ul class="timeline">
                <? foreach ( $stage['record'] as $record ) : ?>
               <li class="record" x-data="{ shown: false }" x-intersect.full="shown = true">
                    <div class="record-wrapper"
                        x-show="shown"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 translate-y-1/4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        >
                        <time class="year"><?php echo $record['year']; ?></time>

                        <div class="content">

                            <div class="description">
                                <h4><?php echo $record['note']; ?></h4>
                                
                                <?php if ( $record['remark'] ) : ?>
                                    <span class="remark"><?php echo $record['remark']; ?></span>
                                <?php endif; ?>
                                <?php if ( $record['remark_img'] ) : ?>
                                    <img class="remark-image" src="" alt="">
                                <?php endif; ?>
                            </div>

                            <?php if ( $record['record_img'] ) : ?>
                                <img class="image" 
                                    src="<?php echo $record['record_img']['sizes']['medium_large']; ?>" 
                                    width="<?php echo $record['record_img']['sizes']['medium_large-width']; ?>"
                                    height="<?php echo $record['record_img']['sizes']['medium_large-height']; ?>"
                                    alt="<?php echo $record['note']; ?>"
                                >
                            <?php endif; ?>
                        </div>
                    </div>
               </li>
                <?php endforeach; ?>
            </ul><!--timeline-->

            <?php endif; ?>

        </div><!--stage-wrapper-->

        
<?php
    endforeach;
    endif;
?>

</section>
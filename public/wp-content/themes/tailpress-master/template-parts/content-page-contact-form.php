<?php
    $current_language = pll_current_language();
    $form_id = $current_language == 'zh' ? 1 : 3;
    $locale = $current_language == 'zh' ? 'zh-TW' : "en";
?>

<section class="contact-form">
    <div class="container">
        <?php echo do_shortcode( '[fluentform id="'. $form_id .'"]'); ?>
    </div>
</section>

<section class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d6152.485757357054!2d120.45066912548398!3d23.522072735009917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5YyX5Zue5YyW5a24!5e0!3m2!1szh-TW!2stw!4v1697774128155!5m2!1s<?php echo $locale; ?>!2stw&z=11" width="100%" height="416" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
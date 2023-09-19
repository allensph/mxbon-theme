
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

<div class="site-fabs-wrapper">
	<ul class="site-fabs">
		<li class="float-action-button facebook"><a href="https://www.facebook.com/mxbontw/" title="find us on facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
		<li class="float-action-button phone"><a href="tel:+886-5-220-3715" title="make a phone call"><i class="fa-solid fa-phone"></i></a></li>
		<li class="float-action-button email"><a href="mailto:sales@mxbon.com" title="contact with email"><i class="fa-solid fa-envelope"></i></a></li>
		<li class="float-action-button scroll-top"><a href="#site-header" title="scroll to top"><i class="fa-solid fa-chevron-up"></i></a></li>
	</ul>
</div>

<footer id="colophon" class="site-footer" role="contentinfo">
	<?php do_action( 'tailpress_footer' ); ?>

	<div class="container">
		<div class="company">
			<img src="/wp-content/themes/tailpress-master/resources/images/mxbon-logo.svg" alt="<?php echo get_bloginfo( 'name' ); ?>" class="logo">
			<h2 class="name">北回化學股份有限公司</h2>
			<ul class="info">
				<li><a href="https://goo.gl/maps/8D2RevVbzSPV2fsG6">
						<i class="fa-solid fa-location-dot"></i>
						621 嘉義縣民雄工業區成功街18號
					</a>
				</li>
				<li>
					<a href="tel:+886-5-2203715">
						<i class="fa-solid fa-phone"></i>
						886-5-2203715
					</a>
				</li>
				<li>
					<a href="fax:+886-5-2203720">
						<i class="fa-solid fa-fax"></i>
						886-5-2203720
					</a>
				</li>
				<li>
					<a href="mailto:sales@mxbon.com">
						<i class="fa-solid fa-envelope"></i>
						sales@mxbon.com
					</a>
				</li>
			</ul>
		</div>
		<?php
			wp_nav_menu(
				array(
					'container_id'    => 'primary-menu',
					'container_class' => 'footer-menu',
					'menu_class'      => 'menu-footer-nav',
					'theme_location'  => 'primary',
					'li_class'        => '',
					'fallback_cb'     => false,
				)
			);
		?>

	</div>
	<div class="copyright">
		Copyright &copy; <?php echo date_i18n( 'Y' );?> All Rights Reserved
		<span class="credit">Design by Tellustek</span>
	</div>

</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>

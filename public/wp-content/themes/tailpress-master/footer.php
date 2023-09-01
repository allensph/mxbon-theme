
</main>

<?php do_action( 'tailpress_content_end' ); ?>

</div>

<?php do_action( 'tailpress_content_after' ); ?>

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

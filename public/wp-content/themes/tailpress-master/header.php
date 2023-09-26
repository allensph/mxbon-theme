<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-white text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col" 
	x-data="{ menu: false, search: false, nav: 0, topScreen: false }"
	@scroll.window="topScreen = false"
	@scroll.window.debounce.2000ms="topScreen = (window.pageYOffset < 90) ? false: true">

	<?php do_action( 'tailpress_header' ); ?>

	<header id="site-header">

		<div class="container">

			<div class="wrapper">
				<a href="/" class="custom-logo-link" rel="home" aria-current="page">
					<img src="/wp-content/themes/tailpress-master/resources/images/header-logo.svg" class="custom-logo" alt="<?php echo bloginfo('name'); ?>" decoding="async">
				</a>

				<div class="primary-menu-container">
					<?php
						wp_nav_menu(
							array(
								'container'=> false,
								'menu_class'      => 'language-switcher mobile',
								'theme_location'  => 'lang',
								'fallback_cb'     => false,
							)
						);		
					?>
					<?php
						wp_nav_menu(
							array(
								'container_id'    => 'primary-menu',
								'container_class' => 'primary-menu',
								'menu_class'      => '',
								'theme_location'  => 'primary',
								'li_class'        => '',
								'walker'		  => new Mxbon_Primary_Menu_Walker(),
								'fallback_cb'     => false,
							)
						);
					?>
				</div>
			</div><!--wrapper-->

			<?php
				wp_nav_menu(
					array(
						'container'=> false,
						'menu_class'      => 'language-switcher',
						'theme_location'  => 'lang',
						'fallback_cb'     => false,
					)
				);		
			?>

			<div class="search-wrapper">
				<button class="search-toggle">
					<div class="header-button close"><span>Close</span></div>
					<div class="header-button open"><span>Search</span></div>
				</button>
				<div class="form-wrapper">
					<?php echo get_search_form(); ?>
				</div>
			</div>

			<div class="toggle-wrapper">
				<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
					<i class="fa-solid fa-bars"></i>
					<i class="fa-solid fa-xmark"></i>
				</a>
			</div>

		</div><!--container-->

	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>

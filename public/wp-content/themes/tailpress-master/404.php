<?php get_header(); ?>

	<?php
		$images_uri =  get_stylesheet_directory_uri() . '/resources/images';

		$categories = get_terms([
			'taxonomy' => 'product-category',
			'hide_empty' => false,
			'order' => 'ASC',
			'meta_key' => 'homepage_order',
			'orderby' => 'meta_value_num',
		]);

		$categories = array_slice( $categories, 0, 4 );
	?>

	<div class="breadcrumb-wrapper">
        <div class="breadcrumb">
            <?php bcn_display(); ?>
        </div>
    </div>

	<section class="error-404-banner">
		<div class="container">
			<div class="wrapper">
				<img class="logo" src="<?php echo $images_uri; ?>/mxbon-logo.svg" alt="">
				<p class="description"><?php _e( 'Sorry, the page you are looking for cannot be found.', 'tailpress' ); ?></p>
				<a class="home-url" href="<?php echo get_home_url(); ?>">
					<?php _e( 'Back to homepage', 'tailpress' ); ?>
				</a>
			</div>
		</div>		
	</section>

	<section class="products-categories">
		<div class="container">
			<?php if( $categories ) : ?>
			<?php foreach( $categories as $category) : ?>

				<?php $category_img = get_field( 'category_image', $category );  ?>


				<div class="card">
					<?php if( $category_img ) : ?>
						<img class="image" src="<?php echo $category_img['url']; ?>" alt="<?php echo $category->name; ?>">
					<?php endif; ?>

					<div class="content">
						<h2><?php echo $category->name; ?></h2>
						<p><?php echo $category->description; ?></p>
						<a href="<?php echo "/product/#{$category->slug}"; ?>" class="permalink">Read more</a>
					</div>

				</div>

			<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</section>
<?php
	get_footer();

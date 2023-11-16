<?php 
	global $post, $category;
	//echo "<pre>" . print_r( $category, true ) . "</pre>";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="page-title side">
			<?php echo $post->post_title; ?>
			<span class="sub">
				<?php echo $category[0]->slug; ?>
			</span>
		</h1>
	</header>

	<?php the_post_thumbnail(); ?>

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
		?>
	</div>

</article>

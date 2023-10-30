<?php
	global $post_name, $sub_title;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_parent() ) : ?>
		<header class="entry-header">
			<h1 class="page-title side">
				<?php echo get_the_title(); ?>
				<span class="sub">
					<?php echo $sub_title; ?>
				</span>
			</h1>
		</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php
			$locate = locate_template( "template-parts/content-page-{$post_name}.php" );
			$locate 
				? get_template_part( "template-parts/content-page-{$post_name}" )
				: the_content();
		?>
	</div>

</article>

<?php 
	$post_name = get_post_field('post_name');
	$sub_title = str_replace( '-', ' ', $post_name );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h1 class="page-title side">
			<?php echo get_the_title(); ?>
			<span class="sub">
				<?php echo $sub_title; ?>
			</span>
		</h1>
	</header>

	<div class="entry-content">
		<?php
			$locate = locate_template( "template-parts/content-page-{$post_name}.php" );
			$locate 
				? get_template_part( "template-parts/content-page-{$post_name}" )
				: the_content();
		?>
	</div>

</article>

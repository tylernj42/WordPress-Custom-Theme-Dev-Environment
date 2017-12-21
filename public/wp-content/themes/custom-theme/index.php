<?php get_header(); ?>
<main>
	<div class="container">
		<h1>Blog Page</h1>
		<?php 
			if(have_posts()){
				while(have_posts()){
					the_post();
					the_title( '<h2>', '</h2>');
					the_excerpt();
				}
			}
		?>
	</div>
</main>
<?php get_footer(); ?>
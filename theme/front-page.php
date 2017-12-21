<?php get_header(); ?>
<main>
	<?php 
		if(have_posts()){
			while(have_posts()){
				the_post();
				the_flexible_content();
			}
		}
	?>
</main>
<?php get_footer(); ?>
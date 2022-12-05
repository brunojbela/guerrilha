<?php get_header(); ?>
<main id="content" class="archive" tabindex="-1" role="main">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-7">
				<?php
				if (have_posts()) :
					// Start the Loop.
					while (have_posts()) : the_post();

						get_template_part('content', get_post_format());

					endwhile;

					// Post navigation.
					odin_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part('content', 'none');

				endif;
				?>
			</div>
			<div class="col-12 col-sm-4 offset-sm-1">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>
<?php get_footer();

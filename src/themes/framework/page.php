<?php get_header(); ?>

    <main id="content" class="page" tabindex="-1" role="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>

                </div>
            </div>
        </div>
    </main>
    <!-- #main -->

    <?php
get_footer();

<?php get_header(); ?>
<main id="content" class="post" tabindex="-1" role="main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-7">
                <?php
                // Start the Loop.
                while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile;
                ?>
            </div>
            <div class="col-xs-12 col-sm-4 offset-sm-1">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<!-- #main -->
<?php
get_footer();
setPostViews(get_the_ID());

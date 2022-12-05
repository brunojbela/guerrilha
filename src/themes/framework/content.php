
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        GLOBAL $post;

        if ( is_single() ) :
            the_title( '<h1 class="entry-title">', '</h1><hr class="ml-0 mr-auto mb-4">' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2><hr class="ml-0 mr-auto mb-4">' );
        endif; if(!is_page()): ?>
        <div class="meta d-flex justify-content-between mb-4">
            <span><b>Por:</b> <?php echo get_the_author(); ?></span>
            <span><b>Em:</b> <?php $category = get_the_category($post->ID); echo $category[0]->name; ?></span>
            <span><b>Postado em:</b> <?php echo get_the_date('d \\d\\e F, Y', $post->ID); ?></span>
        </div>
        <?php
        endif;
        echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'.get_the_post_thumbnail($post->ID, 'blog-thumbnail', array('class' => 'mb-4')).'</a>';
        ?>

    </header><!-- .entry-header -->

    <?php if ( is_search() ) : ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>
    <?php else : ?>
        <div class="entry-content">
            <?php
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
            ?>
        </div><!-- .entry-content -->
    <?php endif;
    if (! is_single() && !is_page()) :
        echo '<div class="continue"><a href="' . esc_url( get_permalink() ) . '" class="continueLendo">Continue lendo</a></div>';
    endif;
    ?>


</article><!-- #post-## -->
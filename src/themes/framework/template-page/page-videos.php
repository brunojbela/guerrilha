<?php
// template name: Videos
get_header();
?>
<?php get_template_part('template-part/sobre'); ?>
<?php get_template_part('template-part/contato'); ?>
<?php get_template_part('template-part/servicos'); ?>
<?php get_template_part('template-part/contato'); ?>
<section class="cases my-5 py-3">
    <div class="container">
        <div class="row justify-content-center flex-column text-center mb-4">
            <h2 class="mb-2"><?php echo get_field('titulo_cases'); ?></h2>
            <hr class="mb-3">
            <p><?php echo get_field('subtitulo_cases'); ?></p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php while (have_rows('posts_em_destaque')) {
                the_row(); ?>
                <div class="box">
                    <figure class="mb-0">
                        <img src="" alt="">
                    </figure>
                    <div class="content d-flex justify-content-center text-center flex-column">
                        <a href="">
                            <h2 class="mb-2"></h2>
                            <hr>
                            <h3 class="mb-3"></h3>
                            <img src="<?php echo CONTENT_URI . '/assets/images/play-branco.png'; ?>" alt="">
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_template_part('template-part/contato'); ?>
<?php
get_footer();
?>

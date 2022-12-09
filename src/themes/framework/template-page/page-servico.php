<?php
// template name: Serviços
get_header();
?>
<?php get_template_part('template-part/sobre'); ?>
<section class="detalhes mb-5 py-3">
    <div class="container">
        <div class="row justify-content-md-between justify-content-center">
            <?php
            $todos = count(get_field('destaque'));

            wp_is_mobile()? $todos = 1 ;
            while (have_rows('destaque')){ the_row(); ?>
                <div class="box d-flex justify-content-center align-items-center flex-column px-3" style="max-width: calc(100% / <?php echo $total ?>)">
                    <figure>
                        <img src="<?php echo get_sub_field('icone')['url']; ?>" height="90" alt="<?php echo get_sub_field('titulo'); ?>">
                    </figure>
                    <h2><?php echo get_sub_field('titulo'); ?></h2>
                    <p class="text-center"><?php echo get_sub_field('conteudo'); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_template_part('template-part/contato'); ?>
<section class="videos my-5 py-4">
    <div class="container">
        <div class="row justify-content-center text-center flex-column mb-4">
            <h2><?php echo get_field('titulo_videos'); ?></h2>
            <hr class="mb-4">
            <div class="col-md-8 offset-md-2">
            <?php echo get_field('conteudo_videos'); ?>
            </div>
        </div>
        <?php while(have_rows('videos')){ the_row(); ?>
        <div class="row linha align-items-center my-4 py-4">
            <div class="col-md-6 col-12">
                <?php echo get_sub_field('embed'); ?>
            </div>
            <div class="col-md-6 col-12 conteudo">
                <h3><?php echo get_sub_field('titulo'); ?></h3>
                <?php echo get_sub_field('conteudo_'); ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<?php get_template_part('template-part/contato'); ?>
<section class="como my-5 py-3">
    <div class="container">
        <div class="row justify-content-center flex-column text-center mb-4">
            <h2 class="mb-2"><?php echo get_field('titulo_cf'); ?></h2>
            <hr class="mb-3">
            <p><?php echo get_field('subtitulo_cf'); ?></p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            $todos = count(get_field('passo_a_passo'));
            wp_is_mobile()? $todos = 1 ;
            while (have_rows('passo_a_passo')) {
                the_row();
                $Post = get_sub_field('post');?>
                <div class="box mx-3" style="width: calc((100% / <?php echo $total; ?>) - 32px)">
                    <figure class="mb-2">
                        <a href="<?php echo get_permalink($Post->ID); ?>">
                            <?php echo get_the_post_thumbnail($Post->ID, 'blog-thumbnail', array('class' => 'img-fluid')); ?>
                        </a>
                    </figure>
                    <div class="content d-flex justify-content-center text-center flex-column">
                        <a href="<?php echo get_permalink($Post->ID); ?>">
                            <h2 class="mb-2"><?php echo get_the_title($Post->ID); ?></h2>
                            <p><?php echo get_the_excerpt($Post->ID); ?></p>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="quando text-white mb-5 py-5">
    <div class="container">
        <div class="row justify-content-center flex-column text-center my-4">
            <h2><?php echo get_field('titulo_quando'); ?></h2>
            <hr class="mb-4">
            <p><?php echo get_field('subtitulo_quando'); ?></p>
        </div>
        <div class="row justify-content-md-between justify-content-center">
            <?php while (have_rows('pontos')){ the_row(); ?>
                <div class="box d-flex justify-content-center flex-column text-center">
                    <figure>
                        <img height="75" src="<?php echo get_sub_field('icon')['url']; ?>" alt="<?php echo get_sub_field('icon')['alt']; ?>">
                    </figure>
                    <h3><?php echo get_sub_field('titulo'); ?></h3>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php get_template_part('template-part/servicos'); ?>
<?php get_template_part('template-part/contato'); ?>
<section class="porq mt-5 py-5 text-white">
    <div class="container">
        <div class="my-4 row align-items-center justify-content-center">
            <div class="col-md-6 text-left">
                <h2 class="mb-3"><?php echo get_field('titulo_pq'); ?></h2>
                <hr class="ml-0 mr-auto mb-5">
                <?php echo get_field('conteudo_pq'); ?>
            </div>
            <figure class="col-md-6 text-center">
                <img class="img-fluid" src="<?php echo get_field('imagem_pq')['url']; ?>" alt="<?php echo get_field('imagem_pq')['alt']; ?>"/>
            </figure>
        </div>
    </div>
</section>
<?php
get_footer();
?>

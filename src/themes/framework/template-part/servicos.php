<section class="servicos my-5 py-3">
    <div class="container">
        <div class="row justify-content-center flex-column text-center mb-4">
            <h2 class="mb-2"><?php echo get_field('titulo_sevicos'); ?></h2>
            <hr class="mb-3">
            <p><?php echo get_field('subtitulo_servicos'); ?></p>
        </div>
        <div class="row">
            <?php
            $todos = count(get_field('servicos'));
            while (have_rows('servicos')){ the_row(); ?>
            <div class="servico mx-2 d-flex flex-column pt-3 pb-0" style="width: calc((100% / <?php echo $todos; ?>) - 16px)">
                <figure class="mb-2">
                    <img width="60" class="img-fluid mb-3" src="<?php echo get_sub_field('icone')['url']; ?>" alt="<?php echo get_sub_field('icone')['alt']; ?>">
                </figure>
                <h3 class="font-weight-bold mb-2 text-dark"><?php echo get_sub_field('titulo')?></h3>
                <ul class="mb-2">
                    <? while (have_rows('itens')){ the_row(); ?>
                    <li><?php echo get_sub_field('item')?></li>
                    <?php } ?>
                </ul>
                <a href="<?php echo get_sub_field('pagina_direcionamento')?>" class="text-right text-uppercase mb-4 mt-auto"><?php _e('Saiba mais...'); ?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
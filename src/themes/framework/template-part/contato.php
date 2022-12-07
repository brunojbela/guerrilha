<div class="d-flex flex-wrap justify-content-center align-items-center w-100">
    <a href="<?php echo esc_url( home_url( '/?p=23' ) ); ?>" class="btn btn-primary icon-play mb-4 mb-md-0"><?php _e("FALE COM A GENTE"); ?> </a>
    <ul class="ml-md-5 enderecos m-0 p-0 d-flex">
        <?php while (have_rows('contatos', 'options')){ the_row(); ?>
            <li class="d-flex align-items-end">
                <figure class="mb-0 mr-2">
                    <img src="<?php echo CONTENT_URI . '/assets/images/tel.png'; ?>" alt="<?php echo get_sub_field('cidade');?>" class="img-fluid">
                </figure>
                <div class="d-grid">
                    <strong><?php echo get_sub_field('sigla_cidade');?></strong>
                    <span><?php echo get_sub_field('telefone');?></span>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
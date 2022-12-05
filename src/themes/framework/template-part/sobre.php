<section class="sobre py-5 my-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7 col-12">
                <h2><?php echo get_field('titulo_sobre');?></h2>
                <hr>
                <div class="content">
                <?php echo get_field('conteudo_sobre');?>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <figure class="mb-0">
                    <img src="<?php echo get_field('imagem_sobre')['url'];?>" alt="<?php echo get_field('imagem_sobre')['alt'];?>" class="img-fluid">
                </figure>
            </div>
        </div>
    </div>
</section>
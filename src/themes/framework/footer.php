<div class="whats">
<?php while(have_rows('whatsapp', 'options')) { the_row();?>
<a href="<?php echo get_sub_field('link');?>" target="_blank"><?php echo get_sub_field('nome');?></a>
<?php } ?>
</div>
<footer id="footer" class="footer bg-dark text-white pt-5 pb-3 mt-5">
	<div class="container">
        <div class="row justify-content-between mb-4">
            <div class="col-md-3 text-center text-md-left mb-4 mb-md-0">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <img class="logo-branco img-fluid"
                         src="<?php echo get_field('logo_branco', 'options')['sizes']['logo-footer']; ?>"
                         alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
                </a>
            </div>
            <div class="col-md-9 d-flex flex-md-row flex-column gap-50">
            <?php while(have_rows('contatos', 'options')){
                the_row(); ?>
            <address class=" mb-4 mb-md-0 text-center text-md-left">
                <span class="title mx-auto mx-md-0"><?php echo get_sub_field('cidade') . ' | ' . get_sub_field('estado'); ?></span> <br>
                <span class="tel mx-auto mx-md-0">Telefone: +55 <?php echo get_sub_field('telefone'); ?></span><br>
                <span class="email mx-auto mx-md-0">E-mail: <?php echo get_sub_field('e-mail'); ?></span><br>
                <span class="endereco mx-auto mx-md-0"><?php echo get_sub_field('endereco'); ?></span>
            </address>
           <?php }?>
            </div>
        </div>
		<div class="row justify-content-center mb-3  text-center text-md-left">
			<?php echo '&copy;' . date('Y') . ' Guerrilha Filmes. Todos os direitos reservados.'; ?>
		</div>
        <hr>
        <div class="row justify-content-center py-3">
            <ul class="social mb-0 pl-0 d-flex align-items-center">
                <?php while (have_rows('redes_sociais', 'options')) {
                    the_row(); ?>
                    <li class="mx-1">
                        <a href="<?php echo get_sub_field('link'); ?>" target="_blank">
                            <img class="img-fluid" width="31"
                                 src="<?php echo get_sub_field('icone_branco')['url']; ?>"
                                 alt="<?php echo get_sub_field('nome'); ?>">
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
	</div>
</footer>
<!-- #footer -->
<?php wp_footer(); ?>
</body>

</html>

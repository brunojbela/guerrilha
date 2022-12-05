<?php
// template name: Contato
get_header();
?>
<section class="contato">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <h1><?php echo get_the_title(); ?></h1>
                <hr>
                <?php get_template_part('template-part/contato'); ?>
            </div>
            <div class="col-12 col-md-5 offset-md-1">
                <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário de contato 1"]'); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <link rel="icon" type="image/x-icon" href="<?php echo CONTENT_URI . '/assets/images/favicon.png'; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="header" class="<?php echo get_field('banner_background')?  'banner' : ''; ?> mb-md-5" style="--bg: url(<?php echo get_field('banner_background')['url'] ?>)">
    <section class="bg-dark py-2 mb-3 w-100">
        <div class="container">
            <div class="row justify-content-md-end justify-content-between align-items-center px-3 px-md-0">
                <ul class="social mb-0 pl-0 mr-4 d-flex align-items-center">
                    <?php while (have_rows('redes_sociais', 'options')) {
                        the_row(); ?>
                        <li class="mr-2">
                            <a href="<?php echo get_sub_field('link'); ?>" target="_blank">
                                <img class="img-fluid" width="19"
                                     src="<?php echo get_sub_field('icone_branco')['url']; ?>"
                                     alt="<?php echo get_sub_field('nome'); ?>">
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <a href="" class="btn btn-primary">
                    <?php _e('FALE COM A GENTE') ?>
                </a>
            </div>
        </div>
    </section>
    <nav>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <?php if (get_field('banner_background')) { ?>
                        <img class="logo-branco img-fluid"
                             src="<?php echo get_field('logo_branco', 'options')['sizes']['logo-top']; ?>"
                             alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
                    <?php } else { ?>
                        <img class="logo-preto img-fluid"
                             src="<?php echo get_field('logo_preto', 'options')['sizes']['logo-top']; ?>"
                             alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>">
                    <?php } ?>
                </a>
                <div class="menu d-none d-md-block">
                    <ul class="close">
                        <li></li>
                        <li></li>
                    </ul>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'depth' => 2,
                            'container' => false,
                            'menu_class' => 'd-md-flex flex-wrap m-0',
                            'fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback',
                            'walker' => new Odin_Bootstrap_Nav_Walker()
                        )
                    );
                    ?>
                </div>
                <div class="d-md-none d-block">
                    <ul class="openMenu">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (get_field('banner_background')) { ?>
        <div id="content" class="align-items-center d-flex text-white">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <h1 class="mb-4 w-100">
                        <?php echo get_field('linha_1'); ?> <br>
                        <span><?php echo get_field('linha_2'); ?></span> <br>
                        <?php echo get_field('linha_3'); ?>
                    </h1>
                    <hr class="mb-5">
                    <?php get_template_part('template-part/contato'); ?>
                </div>
            </div>
        </div>

    <?php }
    ?>
</header>
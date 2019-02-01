<?php /* Template Name: Widgetspalte */ ?>

<?php get_header(); ?>

<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}

?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container">
        <div class="container-content">

            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8" id="content">
                    <?php the_content(); ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php

                    //Widgets

                    if ( is_active_sidebar( 'page_widgets' ) ) : dynamic_sidebar( 'page_widgets' ); endif;

                    ?>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; else : ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Entschuldigung!</h1>
                <p>Leider gibt es hier nicht den gewünschten Inhalt.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>

<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container">
        <div class="container-content">
            <?php

            if (isset($breadcrumb) && ($breadcrumb == 1)) {

                if (function_exists('nav_breadcrumb')) nav_breadcrumb();
            }

            ?>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-lg-9">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xs-12 col-sm-8 col-lg-9">
                    <?php if (function_exists("pagination")) {pagination(); } ?>
                </div>
            </div>
        </div>
    </div>

<?php endwhile; else : ?>

    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <h1>Entschuldigung!</h1>
                <p>Leider gibt es hier nicht den gewünschten Inhalt.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>

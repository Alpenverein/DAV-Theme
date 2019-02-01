<?php get_Header(); ?>

<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}

?>


    <div class="container">
        <div class="container-content">
            <?php

            if (isset($breadcrumb) && ($breadcrumb == 1)) {

                if (function_exists('nav_breadcrumb')) nav_breadcrumb();
            }

            ?>

            <div class="row">
                <div class="col-xs-12 col-sm-8 col-lg-8">


                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


                        <div class="row">
                            <div class="col-8">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="col-8" id="content">
                                <?php the_content(); ?>
                            </div>
                        </div>


                    <?php endwhile; else : ?>
                        <div class="row">
                            <div class="col-12">
                                <h1>Entschuldigung!</h1>
                                <p>Leider gibt es hier nicht den gewünschten Inhalt.</p>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
                <div class="col-sm-4 col-lg-3">

                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-lg-9">
                    <?php if (function_exists("pagination")) {pagination(); } ?>
                </div>
            </div>
        </div>


    </div>
    </div>


<?php get_Footer(); ?>
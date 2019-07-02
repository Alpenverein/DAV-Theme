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
                    // add a linklist to the right column
                    $linklist = get_field('page_linklist');

                    if (!empty($linklist)) {


                        echo '<div class="card card-widget-primary mb-4">';
                            echo '<div class="card-header bg-primary text-white text-uppercase py-1">';
                        echo get_field('page_linklist_title');
                            echo '</div>';
                            echo '<div class="card-body">';

                            echo '<ul class="list-group list-group-flush">';

                            for ($i = 0; $i < count($linklist); $i++) {

                                echo '<a class="list-group-item" href="'.$linklist[$i].'">';
                                echo get_the_title(url_to_postid($linklist[$i]));
                                echo '</a>';
                            }

                            echo '</ul>';

                            echo '</div>';
                        echo '</div>';

                    }

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

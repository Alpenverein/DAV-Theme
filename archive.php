<?php get_header(); ?>

<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}


get_theme_mod('dav_excerpt') ? $excerpt = get_theme_mod('dav_excerpt') : $excerpt = 160;

?>



<div class="container">
    <div class="container-content">

        <div class="row">

                <div class="col-xs-12 col-sm-8">
                    <h1><?php single_cat_title('Alle Beiträge der Kategorie ',true); ?></h1>
                </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-8">

                <div class="row">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


                    <div class="col-sm-12 col-lg-6 pt-4">
                        <div class="card card-news-two">
                            <div class="card-body">
                                <a href="<?php the_permalink(); ?>"><h2 class="news-head"><?php the_title(); ?></h2></a>
                                <span class="news-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                <p style="margin-bottom: 3rem;"><?php echo excerpt_chars(get_the_excerpt(),$excerpt); ?></p>
                                <a href="<?php the_permalink(); ?>"><button class="btn btn-news"><i class="fas fa-chevron-right"></i></button> </a>
                            </div>
                        </div>
                    </div>

        <?php endwhile; ?>

                </div>

                <?php else : ?>

        <div class="row">
            <div class="col-12">
                <h1>Entschuldigung!</h1>
                <p>Leider gibt es hier nicht den gewünschten Inhalt.</p>
            </div>
        </div>

<?php endif; ?>
            </div>
                <div class="col-xs-12 col-sm-4">
                    <?php

                    //Widgets

                    if ( is_active_sidebar( 'news_widget_primary' ) ) : dynamic_sidebar( 'news_widget_primary' ); endif;

                    if ( is_active_sidebar( 'news_widget_light' ) ) : dynamic_sidebar( 'news_widget_light' ); endif;

                    if ( is_active_sidebar( 'news_widget_dark' ) ) : dynamic_sidebar( 'news_widget_dark' ); endif;


                    ?>
                </div>
            </div>
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-8 col-lg-9">
                <?php if (function_exists("pagination")) {pagination(); } ?>
            </div>
        </div>
        </div>


    </div>
</div>
<?php get_footer(); ?>

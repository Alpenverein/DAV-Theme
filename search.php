<?php

get_theme_mod('dav_excerpt') ? $excerpt = get_theme_mod('dav_excerpt') : $excerpt = 160;


?>


<?php get_header(); ?>


<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}

?>


<div class="container">
    <div class="container-content">

        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <h1>Suchergebnisse für "<?php echo get_search_query(); ?>"</h1>
            </div>
        </div>

        <div class="row">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="col-sm-6 col-md-6 pt-4">
            <div class="card card-news-two">
                <div class="card-body">
                    <a href="<?php the_permalink(); ?>"><h2 class="news-head"><?php the_title(); ?></h2></a>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>"><button class="btn btn-news"><i class="fas fa-chevron-right"></i></button> </a>
                </div>
            </div>
        </div>

<?php endwhile; ?>

        </div>

        <div class="row mt-5">
            <div class="col-xs-12 col-sm-8 col-lg-9">
                <?php if (function_exists("pagination")) {pagination(); } ?>
            </div>
        </div>
    </div>
</div>


<?php else : ?>

            <div class="col-xs-12 col-sm-8">
                <p>Leider kann für Ihre Suche nach <em><?php echo get_search_query(); ?></em> nichts gefunden werden.</p>
            </div>
<?php endif; ?>

</div>
</div>
</div>

<?php get_footer(); ?>

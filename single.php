<?php get_header(); ?>

<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="container">
        <div class="container-content">
            <?php

            if (isset($breadcrumb) && ($breadcrumb == 1)) {

                if (function_exists('nav_breadcrumb')) nav_breadcrumb();
            }

            ?>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-lg-8">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-lg-8" id="content">
                <?php the_content(); ?>

                <!--BEGIN: Page Nav-->
                <?php $prev = get_previous_post_link('%link','< '.'%title',true);
                ?>

                <?php $next = get_next_post_link('%link','%title'.' >',true);

                ?>
                <!--END: Page Nav-->

                <div class="row pt-5 pb-5 d-flex justify-content-between">
                    <div class="pl-3 pr-3 mb-2 flex-fill previous-link">
                        <?php if($prev != '') {
                            echo $prev;
                        }  ?>

                    </div>
                    <div class="pr-3 pl-3 mb-2 flex-fill next-link text-right">
                        <?php if($next != '') {
                            echo $next;
                        }
                        ?>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-lg-4">
                <?php

                //Widgets

                if ( is_active_sidebar( 'news_widget_primary' ) ) : dynamic_sidebar( 'news_widget_primary' ); endif;

                if ( is_active_sidebar( 'news_widget_light' ) ) : dynamic_sidebar( 'news_widget_light' ); endif;

                if ( is_active_sidebar( 'news_widget_dark' ) ) : dynamic_sidebar( 'news_widget_dark' ); endif;


                ?>
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

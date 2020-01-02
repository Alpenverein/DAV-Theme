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
                    <h1>Übersicht</h1>
                </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12">

                <div class="row">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php

                    $persona_meta = get_post_meta($post->ID);

                    $persona_thumb =    get_the_post_thumbnail($post->ID, 'persona-thumb', array('class' => 'img-fluid '));

                    ?>

                    <div class="col-md-4 pt-4">
                        <div class="card card-person">
                            <div class="row m-3 align-self-stretch align-items-baseline">
                                <div class="col-4">
                                    <?php echo $persona_thumb; ?>
                                </div>
                                <div class="col-8">
                                    <span class="person-name"><?php the_title(); ?></span>
                                    <span class="persona-title"><?php echo get_the_term_list($post->ID,'personarole','',', '); ?></span>
                                    <span class="person-title"><?php echo $persona_meta['persona_daten_funktion'][0]; ?></span>
                                    <hr>
                                </div>
                            </div>
                            <div class="row m-3" style="margin-top: 0 !important;">
                                <div class="col-12 p-0">
                                    <a class="btn btn-primary" type="button" href="<?php echo get_permalink($post->ID); ?>">Mehr zu <?php echo $post->post_title; ?></a>
                                </div>
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
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-8 col-lg-9">
                <?php if (function_exists("pagination")) {pagination(); } ?>
            </div>
        </div>
        </div>


    </div>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>


<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php

    $tour_type = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourtype','',', '));
    $tour_category = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourcategory','',', '));
    $tour_technic = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourtechnic','',', '));
    $tour_condition = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourcondition','',', '));

    $tour_meta = get_post_meta($post->ID);
    $persona = get_post($tour_meta['acf_tourpersona'][0]);
    $persona_meta = get_post_meta($tour_meta['acf_tourpersona'][0]);

    ?>

    <div class="container">
        <div class="container-content">
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <h1 style="margin-bottom: 5px;"><?php the_title(); ?></h1>
                    <span class="tour-data">
                    <?php
                        if ($tour_type != '') {echo '<strong>'.$tour_type.'</strong>';}
                        if ($tour_category != '') {echo ' | '.'<strong>'.$tour_category.'</strong>';}
                    ?>
                    </span>
                </div>
            </div>
            <div class="row" style="margin-top: 15px;">
                <div class="col-xs-12 col-sm-8" id="content">
                    <?php $tour_image = wp_get_attachment_image_src(get_field('acf_tourphoto'), 'medium'); ?>
                    <img src="<?php echo $tour_image[0] ?>" class="img-fluid" style="margin-bottom: 1em;">
                    <p class="lead text-primary"><?php echo $tour_meta['acf_tourcompact'][0]; ?></p>
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-4">
                    <?php set_query_var( 'tour_condition', $tour_condition ); ?>
                    <?php set_query_var( 'tour_technic', $tour_technic ); ?>
                    <?php get_template_part( 'template_snippets/tour-detailsbox', 'Tour-Details'); ?>
                    <?php if(get_field('acf_tourpersona') != '') { ?>
                        <?php set_query_var( 'persona', $persona ); ?>
                        <?php set_query_var( 'persona_meta', $persona_meta ); ?>
                        <?php get_template_part( 'template_snippets/persona-detailsbox', 'PersonaDetailBox'); ?>
                    <?php } ?>
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

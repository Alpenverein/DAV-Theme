<?php /* Template Name: Multipages */ ?>

<?php get_header(); ?>

<?php

if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}


$args = array(
    'parent' => $post->ID,
    'sort_column' => 'menu_order',
    'meta_key' => 'onepager_show',
    'meta_value' => true
    );

$subpages = get_Pages($args);


?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<section class="onepager">
    <div class="container">
        <div class="container-content ">
            <div class="row">
                <div class="col-12 text-center">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php

$subpageoutput = '';

foreach ($subpages as $subpage) {

    if(get_field('onepager_show',$subpage->ID) == true) {

        $subpageoutput .= '<section class="onepager onepager-sub ' . get_field('onepager_color', $subpage->ID) . '" id="' . $subpage->post_name . '">';
        $subpageoutput .= '<div class="container container-onepager">';
        $subpageoutput .= '<div class="row">';
        $subpageoutput .= '<div class="col-12 text-center">';
        $subpageoutput .= '<h2>' . $subpage->post_title . '</h2>';
        $subpageoutput .= '</div>';
        $subpageoutput .= '</div>';
        $subpageoutput .= '<div class="row">';
        $subpageoutput .= '<div class="col-12">';
        $subpageoutput .= $subpage->post_content;
        $subpageoutput .= '</div>';
        $subpageoutput .= '</div>';
        $subpageoutput .= '</div>';
        $subpageoutput .= '</section>';

    }

}


    echo $subpageoutput;

endwhile; else : ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Entschuldigung!</h1>
                <p>Leider gibt es hier nicht den gewünschten Inhalt.</p>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php get_footer('onepager'); ?>

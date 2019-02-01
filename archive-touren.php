<?php


get_header();

$i = 0;

global $wp;
if(get_theme_mod('dav_touren_counter') != false) {$pagecount = get_theme_mod('dav_touren_counter');}
else {$pagecount = 10;};
$current_url = home_url( add_query_arg( array(), $wp->request) );
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$offset = ($paged - 1) * $pagecount;


if($paged > 1) {

    $pattern = '/page\/\d/';
    $current_url = preg_replace($pattern,'',$current_url);

}

$offset = ($paged - 1) * get_option('posts_per_page');


if(get_theme_mod('dav_touren_pageid') != false) {$dav_pageid = get_theme_mod('dav_touren_pageid');}
else {$dav_pageid = false;};


if($dav_pageid != false) {

    $page_id = get_post($dav_pageid);
    $tourhead_title = $page_id->post_title;
    $tourhead_content = $page_id->post_content;
    $tourhead_content = apply_filters('the_content', $tourhead_content);
    $tourhead_content = str_replace(']]>', ']]>', $tourhead_content);

}

$taxonomy = '';
$term = '';

$args = array();



if(get_theme_mod('dav_touren_datenewer')) {
    $tour_dates = get_theme_mod('dav_touren_datenewer');
} else { $tour_dates = true; }


if ($tour_dates == "true") {

// Printout only tours in future
    $args = array(
        'post_type' => 'touren',
        'posts_per_page' => $pagecount,
        'paged' => $paged,
        'offset' => $offset,
        'meta_key' => 'acf_tourstartdate',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'acf_tourstartdate',
                'compare' => '>=',
                'value' => date('Ymd', strtotime('-8 hours')),
                'type' => 'DATE',
            ),
            array(
                'key' => 'acf_tourvisible',
                'compare' => '==',
                'value' => '1',
                'type' => 'string',
            )
        )
    );


//taxonomie tourenart
    if (isset($_GET['tourenart'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourtype',
                    'field' => 'slug',
                    'terms' => $_GET['tourenart'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourstartdate',
                    'compare' => '>=',
                    'value' => date('Ymd', strtotime('-8 hours')),
                    'type' => 'DATE',
                ),
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

    if (isset($_GET['tourentyp'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
            array(
                'taxonomy' => 'tourcategory',
                'field' => 'slug',
                'terms' => $_GET['tourentyp'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourstartdate',
                    'compare' => '>=',
                    'value' => date('Ymd', strtotime('-8 hours')),
                    'type' => 'DATE',
                ),
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

    if (isset($_GET['technik'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourtechnic',
                    'field' => 'slug',
                    'terms' => $_GET['technik'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourstartdate',
                    'compare' => '>=',
                    'value' => date('Ymd', strtotime('-8 hours')),
                    'type' => 'DATE',
                ),
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

    if (isset($_GET['kondition'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourcondition',
                    'field' => 'slug',
                    'terms' => $_GET['kondition'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourstartdate',
                    'compare' => '>=',
                    'value' => date('Ymd', strtotime('-8 hours')),
                    'type' => 'DATE',
                ),
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

} else {

// Printout only tours in future
    $args = array(
        'post_type' => 'touren',
        'posts_per_page' => $pagecount,
        'paged' => $paged,
        'offset' => $offset,
        'meta_key' => 'acf_tourstartdate',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'acf_tourvisible',
                'compare' => '==',
                'value' => '1',
                'type' => 'string',
            )
        )
    );

    if (isset($_GET['tourenart'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourtype',
                    'field' => 'slug',
                    'terms' => $_GET['tourenart'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

    if (isset($_GET['tourentyp'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourcategory',
                    'field' => 'slug',
                    'terms' => $_GET['tourentyp'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

    if (isset($_GET['technik'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourtechnic',
                    'field' => 'slug',
                    'terms' => $_GET['technik'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

    if (isset($_GET['kondition'])) {
        $args = array(
            'post_type' => 'touren',
            'posts_per_page' => $pagecount,
            'paged' => $paged,
            'offset' => $offset,
            'meta_key' => 'acf_tourstartdate',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'tourcondition',
                    'field' => 'slug',
                    'terms' => $_GET['kondition'])),
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'acf_tourvisible',
                    'compare' => '==',
                    'value' => '1',
                    'type' => 'string',
                )
            )
        );
    }

}

//now we make the query
$the_query = new WP_Query( $args );

$pagesum = $the_query->max_num_pages;

//printout the breadcrumb
if ((get_theme_mod('dav_breadcrumb') != false) && (get_theme_mod('dav_breadcrumb') == 1)) {

    if (function_exists('nav_breadcrumb')) nav_breadcrumb();
}

?>




<div class="container">

    <div class="container-content">

        <div class="row">

            <div class="col-xs-12 col-sm-8">

                <h1><?php echo $tourhead_title;  ?></h1>

                <?php echo $tourhead_content; ?>

                <div class="accordion tour-list" id="tourlist">

                    <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();  ?>



                        <div class="card">
                            <div class="card-header" id="heading<?php echo get_the_ID(); ?>">
                                <div class="d-flex">
                                    <div class="">
                                        <button class="tour-date" type="button" data-toggle="collapse" data-target="#collapse<?php echo get_the_ID(); ?>">
                                        <span class="tour-day">

                                            <?php

                                            echo substr(get_field('acf_tourstartdate'),0,2).'.'.substr(get_field('acf_tourstartdate'),3,2).'.';

                                            if ((get_field('acf_tourenddate') == true) && (get_field('acf_tourallday') == 1)){

                                                echo '<br>-<br>';
                                                echo substr(get_field('acf_tourenddate'),0,2).'.'.substr(get_field('acf_tourenddate'),3,2).'.';

                                            }

                                            ?>

                                        </span>
                                        </button>

                                    </div>
                                    <div class="flex-grow-1 pl-3" data-toggle="collapse" data-target="#collapse<?php echo get_the_ID(); ?>">
                                        <h2><?php the_title(); ?></h2><span class="tour-data">

                                        <?php
                                        $tour_type = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourtype','',', '));
                                        $tour_category = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourcategory','',', '));
                                        $tour_technic = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourtechnic','',', '));
                                        $tour_condition = preg_replace('#<a.*?>(.*?)</a>#i', '\1', get_the_term_list($post->ID,'tourcondition','',', '));

                                        if ($tour_type != '') {echo $tour_type;}
                                        if ($tour_category != '') {echo ' | '.$tour_category;}
                                        if ($tour_technic != '') {echo ' | '.$tour_technic;}
                                        if ($tour_condition != '') {echo ' | '.$tour_condition;}

                                        ?>

                                    </span>

                                    </div>
                                    <div class="justify-content-end">
                                        <button class="btn btn-transparent" type="button" data-toggle="collapse" data-target="#collapse<?php echo get_the_ID(); ?>" aria-expanded="true" aria-controls="collapse<?php echo get_the_ID(); ?>">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="collapse<?php echo get_the_ID(); ?>" class="collapse" aria-labelledby="heading<?php echo get_the_ID(); ?>" data-parent="#tourlist">
                                <div class="card-body">

                                    <?php echo get_field('acf_tourcompact'); ?>
                                    <a href="<?php the_permalink(); ?> "><button class="btn btn-tourlist"><i class="fas fa-chevron-right"></i></button> </a>
                                </div>
                            </div>
                        </div>


                    <?php endwhile; ?>

                        <div class="row mt-5">
                            <div class="col-xs-12 col-sm-8 col-lg-9">
                                <?php if (function_exists("pagination")) {pagination($pagesum); } ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="row">
                            <div class="col-12">
                                <p>Für die gewünschte Auswahl haben wir aktuell leider keine Tour im Programm.</p>
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

            <!-- die Widget-Spalte -->
            <div class="col-sm-4">



                <?php
                //Tourenarten ausgeben
                $terms = get_terms('tourtype');
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                    echo '<div class="card card-widget-primary mb-4">';
                    echo '<div class="card-header bg-dark text-uppercase py-1">Tourdauer</div>';
                    echo '<div class="card-body">';

                    echo '<ul>';
                    foreach ( $terms as $term ) {

                        echo '<li><a href="'.$current_url.'?tourenart='.$term->slug.'">' . $term->name . '</a></li>';

                    }
                    echo '</ul>';


                    echo '</div></div>';
                }


                //Tourentypen ausgeben
                $terms = get_terms('tourcategory');
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){

                    echo '<div class="card card-widget-primary mb-4">';
                    echo '<div class="card-header bg-dark text-uppercase py-1">Kategorie</div>';
                    echo '<div class="card-body">';

                    echo '<ul>';
                    foreach ( $terms as $term ) {
                        echo '<li><a href="'.$current_url.'/?tourentyp='.$term->slug.'">' . $term->name . '</a></li>';

                    }
                    echo '</ul>';
                    echo '</div></div>';
                }



                //Tourentechnik ausgeben
                $terms = get_terms('tourtechnic');
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                    echo '<div class="card card-widget-primary mb-4">';
                    echo '<div class="card-header bg-dark text-uppercase py-1">Technik</div>';
                    echo '<div class="card-body">';

                    echo '<ul>';
                    foreach ( $terms as $term ) {
                        echo '<li><a href="'.$current_url.'/?technik='.$term->slug.'">' . $term->name . '</a></li>';

                    }
                    echo '</ul>';
                    echo '</div></div>';
                }



                //Tourenkondition ausgeben
                $terms = get_terms('tourcondition');
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                    echo '<div class="card card-widget-primary mb-4">';
                    echo '<div class="card-header bg-dark text-uppercase py-1">Kondition</div>';
                    echo '<div class="card-body">';


                    echo '<ul>';
                    foreach ( $terms as $term ) {
                        echo '<li><a href="'.$current_url.'/?kondition='.$term->slug.'">' . $term->name . '</a></li>';

                    }
                    echo '</ul>';
                    echo '</div></div>';
                }





                //Zurücksetzen

                if(isset($_GET['technik']) || isset($_GET['kondition']) || isset($_GET['tourenart']) || isset($_GET['tourentyp'])) {

                    echo '<a class="btn btn-primary" href="'.$current_url.'">Filterung aufheben</a>';

                }

                ?>


            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer(); ?>


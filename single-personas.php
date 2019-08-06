<?php get_header(); ?>

<?php

$leiter = array('leiter'=>array(basename(get_permalink())));
$the_query = new WP_Query(tourQuery($leiter));

$pagesum = $the_query->max_num_pages;


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

                <h2>Touren von <?php the_title(); ?></h2>

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


            </div>
            <div class="col-sm-4 col-lg-4">

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

<?php


// require needed pages
require_once 'includes/news.php';
require_once 'includes/widgets.php';
require_once 'includes/slider.php';

if(get_theme_mod('dav_menuview') != false) {$dav_menuview = get_theme_mod('dav_menuview');}
else {$dav_menuview = 'boxed';};

switch($dav_menuview) {
    case "boxed" : $padding_helper = 'style="margin-top: 0px;"'; break;
    case "fluid" : $padding_helper = ''; break;
    default: $padding_helper = ''; break;
}


// initialize sections
$startimage = '';
$slider = '';
$content_section = '';
$widget_section_1 = '';
$news_section_1 = '';
$news_section_2 = '';
$widget_section_2 = '';
$news_section_3 = '';
$widget_section_3 = '';


// insert header
get_header();


// if a startimage is set, print it out
if(get_theme_mod('dav_startimage')) {

    $image_link = get_theme_mod('dav_startimage');
    $image_type = get_theme_mod('dav_startimage_radio');

    switch ($image_type) {
        case 'boxed': $startimage = '<div class="container" id="start-image-boxed">
        <div class="row"><div class="col-12"><img src="'.$image_link.'"></div></div></div>'; break;
        case 'fullscreen' : $startimage = '<div class="container-fluid" id="start-image-full" '.$padding_helper.'>
        <div class="row"><div class="col-12 p-0"><img src="'.$image_link.'"></div></div></div>'; break;
        default: break;
    }

}

// slider
if(get_theme_mod('dav_slider_ID')) { $slider = show_slider(); }


// Start Text
if(get_theme_mod('dav_frontpage1_visible') == 'true') {


    if ( have_posts() ) {

        while ( have_posts() ) {

            the_post();

        $content_section .= '<div class="container">
            <div class="container-content">
                <div class="row content-divider justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8">
                        <h1 style="display: block">'.get_the_title().'</h1>
                    </div>
                    <div class="col-12 col-sm-10 col-md-8" id="content">
                        <p>'.do_shortcode(get_the_content()).'</p>
                    </div>
                </div>
            </div>
        </div>';

        }

    } else {

    $content_section .= '<div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Entschuldigung!</h1>
                <p>Leider gibt es hier nicht den gewünschten Inhalt.</p>
            </div>
        </div>
    </div>';

    }
}




// build sector 2
if(get_theme_mod('dav_frontpage2_visible') == 'true') {

    $widget_section_1 .= '<div class="container">';


    if(get_theme_mod('dav_frontpage2_text') != '') {

        $widget_section_1 .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.get_theme_mod('dav_frontpage2_text').'</h1>
            </div>
        </div>';

    }


    $widget_section_1 .= '<div class="row">';
    if (checkCustomWidgets(1) != false) {$widget_section_1 .= buildCustomWidgets(checkCustomWidgets(1));}
    if (checkDAVWidgets(1) != false) {$widget_section_1 .= buildDAVWidgets(checkDAVWidgets(1));}
    $widget_section_1 .= '</div>';
    $widget_section_1 .= '</div>';

}

// build sector 3
if(get_theme_mod('dav_frontpage3_visible') == 'true') {

    $news_section_1 .= '<div class="container">';


    if(get_theme_mod('dav_frontpage3_text') != '') {


        $news_section_1 .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.get_theme_mod('dav_frontpage3_text').'</h1>
            </div>
        </div>';

    }


    $news_section_1 .= '<div class="row">';
    if (checkCustomWidgets(2) != false) {$news_section_1 .= buildCustomWidgets(checkCustomWidgets(2));}
    if (checkDAVWidgets(2) != false) {$news_section_1 .= buildDAVWidgets(checkDAVWidgets(2));}
    $news_section_1 .= '</div>';
    $news_section_1 .= '</div>';

}

if(get_theme_mod('dav_frontpage4_visible') == 'true') {

    $news_section_2 .= '<div class="container">';


    if(get_theme_mod('dav_frontpage4_text') != '') {


        $news_section_2 .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.get_theme_mod('dav_frontpage4_text').'</h1>
            </div>
        </div>';

    }

    if(get_theme_mod('dav_frontpage4_count') == false) {

        $news1_counter = get_theme_mod('dav_frontpage4_count');

    } else {$news1_counter = 3; }


    if(isset($news1_counter)) {
        $news_section_2 .= '<div class="row">';
        $news_section_2 .=  show_news(get_theme_mod('dav_frontpage4_count'),get_theme_mod('dav_frontpage4_col'),get_theme_mod('dav_frontpage4_cat-in'),get_theme_mod('dav_frontpage4_cat-out'), get_theme_mod('dav_frontpage4_image'));
        $news_section_2 .= '</div>';
        $news_section_2 .= '</div>';

        }

    }

//
if(get_theme_mod('dav_frontpage5_visible') == 'true') {

    $widget_section_2 .= '<div class="container">';


    if(get_theme_mod('dav_frontpage5_text') != '') {


        $widget_section_2 .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.get_theme_mod('dav_frontpage5_text').'</h1>
            </div>
        </div>';

    }

    if(get_theme_mod('dav_frontpage5_count') == false) {

        $news2_counter = get_theme_mod('dav_frontpage5_count');

    } else {$news2_counter = 3; }


    if(isset($news2_counter)) {
        $widget_section_2 .= '<div class="row">';
        $widget_section_2 .=  show_news(get_theme_mod('dav_frontpage5_count'),get_theme_mod('dav_frontpage5_col'),get_theme_mod('dav_frontpage5_cat-in'),get_theme_mod('dav_frontpage5_cat-out'), get_theme_mod('dav_frontpage5_image'));
        $widget_section_2 .= '</div>';
        $widget_section_2 .= '</div>';

    }

}

//build sector 6
if(get_theme_mod('dav_frontpage6_visible') == 'true') {

    $news_section_3 .= '<div class="container">';


    if(get_theme_mod('dav_frontpage6_text') != '') {


        $news_section_3 .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.get_theme_mod('dav_frontpage6_text').'</h1>
            </div>
        </div>';

    }


    $news_section_3 .= '<div class="row">';
    if (checkCustomWidgets(3) != false) {$news_section_3 .= buildCustomWidgets(checkCustomWidgets(3));}
    if (checkDAVWidgets(3) != false) {$news_section_3 .= buildDAVWidgets(checkDAVWidgets(3));}
    $news_section_3 .= '</div>';
    $news_section_3 .= '</div>';

}

if(get_theme_mod('dav_frontpage7_visible') == 'true') {

    $widget_section_3 .= '<div class="container">';


    if(get_theme_mod('dav_frontpage7_text') != '') {


        $widget_section_3 .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.get_theme_mod('dav_frontpage7_text').'</h1>
            </div>
        </div>';

    }

    if(get_theme_mod('dav_frontpage7_count') == false) {

        $news3_counter = get_theme_mod('dav_frontpage7_count');

    } else {$news3_counter = 3; }


    if(isset($news3_counter)) {

        $widget_section_3 .= '<div class="row">';
        $widget_section_3 .=  show_news(get_theme_mod('dav_frontpage7_count'),get_theme_mod('dav_frontpage7_col'),get_theme_mod('dav_frontpage7_cat-in'),get_theme_mod('dav_frontpage7_cat-out'), get_theme_mod('dav_frontpage7_image'));
        $widget_section_3 .= '</div>';
        $widget_section_3 .= '</div>';

    }
}



//OUTPUT
echo $startimage;
echo $slider;
echo $content_section;
echo $widget_section_1;
echo $news_section_1;
echo $news_section_2;
echo $widget_section_2;
echo $news_section_3;
echo $widget_section_3;



// FOOTER
get_footer();

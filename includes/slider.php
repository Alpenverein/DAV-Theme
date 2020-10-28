<?php
/**
 * SLIDER
 *
 * @author Stephan Mitteldorf
 * @version 1.0
 */



/**
 * Function for output the slider
 *
 * This functions take the Slider-ID and make a check, if this ID is a posttype "slidermg". If true, the slider will be build.
 *
 * @return string HTML for slider
 */
function show_slider() {

    $slider_id = get_theme_mod('dav_slider_ID');

    if(get_post_type($slider_id) == 'slidermg') {


        $return = '';

        $sliderdata = get_post_meta($slider_id, '', false);

        $first = true;

        if(get_theme_mod('dav_menuview') != false) {$dav_menuview = get_theme_mod('dav_menuview');}
        else {$dav_menuview = 'boxed';};

        if(get_theme_mod('dav_menucolor') != false) {$dav_menucolor = get_theme_mod('dav_menucolor');} else {$dav_menucolor = 'primary';};


        if(get_theme_mod('dav_slider_fullscreen') == 'true') {
            $style_slider = 'container-fluid';
            $style_column = 'p-0';

            if(is_front_page() == true) {
                $slider_id = 'start-slider-full';
            }
            
            if($dav_menucolor == "trans") {
                $padding_helper = 'style="margin-top: 0px;"';
            }
            if($dav_menuview == "boxed") {
                $padding_helper = 'style="margin-top: 0px;"';
            }
        }
        else {
            $style_slider = 'container';
            $style_column = '';
            $padding_helper = '';

            if(is_front_page() == true) {
                $slider_id = 'start-slider-boxed';
            }
        }

        $return .= '<div id="'.$slider_id.'" class="' . $style_slider . '" '.$padding_helper.'>
                      <div class="row">
                            <div class="col-12 '.$style_column.'">
                                  <div id="dav_carousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">';

        for ($i = 1; $i < 7; $i++) {

            if (implode('=>', $sliderdata["meta-image" . $i]) != "") {


                $first == true ? $carousel_css = 'active' : $carousel_css = '';

                if (get_theme_mod('dav_slider_fullscreen') == 'false') {

                    // boxed slider
                    $return .= '<div class="carousel-item ' . $carousel_css . '">'.wp_get_attachment_image($sliderdata['meta-image'.$i.'-id'][0], 'medium', false, array("class" => "bg-shadow img-fluid"));

                } else {

                    //fullscreen


                    $image = wp_get_attachment_image_src($sliderdata['meta-image'.$i.'-id'][0], 'large', false);
                    $return .= '<div class="carousel-item carousel-fullscreen ' . $carousel_css . '" style="background-image: url('.$image[0].');">';
                }

                $return .= '<div class="carousel-caption d-block">';
                $return .= '<p class="slider-caption-title">' . $sliderdata['slide-'.$i. '-titel'][0] . '</p>';
                $return .= '<p class="slider-caption-subtext">' . $sliderdata['slide-'.$i.'-txt'][0] . '</p>';

                if(($sliderdata['slide-'.$i.'-link'][0] != '') && ($sliderdata['slide-'.$i.'-linkname'][0] != '')) {
                    $return .= '<a href="' . $sliderdata['slide-' . $i . '-link'][0] . '">' . $sliderdata['slide-' . $i . '-linkname'][0] . '</a>';
                }
                $return .= '</div>';


                $return .= '</div>';

                $first = false;
            }

        }

        $return .= '
                                        <a class="carousel-control-prev" href="#dav_carousel" role="button" data-slide="prev">
                                            <span aria-hidden="true"><img src="'.get_template_directory_uri() .'/assets/img/pfeil_links.svg" class="img-fluid" style="filter: drop-shadow(0px 0px 3px rgba(0,0,0,0.80)); max-width: 85%;"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#dav_carousel" role="button" data-slide="next">
                                            <span aria-hidden="true"><img src="'.get_template_directory_uri() .'/assets/img/pfeil_rechts.svg" class="img-fluid" style="filter: drop-shadow(0px 0px 3px rgba(0,0,0,0.80)); max-width: 85%;"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>';

        if(get_theme_mod('dav_slider_visibility_check') == true) {return $return;}
    }

}

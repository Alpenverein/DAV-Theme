<?php

/**
 * Check, if widget-data are correct and push it to array
 * @param $sectorID
 * @return array|bool
 */
function checkCustomWidgets($sectorID) {

    $return = array();

    //check all Custom-Widget Parameters
    for ($w = 1; $w < 7; $w++) {

        $widget_sector = intval(get_theme_mod('dav_customwidget_'.$w.'_sector'));

        if((($widget_sector != 'false')) && ($widget_sector == $sectorID)){

            if(get_theme_mod('dav_customwidget_'.$w.'_image') != false) {


               array_push($return,array(
                   'widget_image' => wp_get_attachment_image_url(get_theme_mod('dav_customwidget_'.$w.'_image')),
                   'widget_title' => get_theme_mod('dav_customwidget_'.$w.'_title'),
                   'widget_link' => get_theme_mod('dav_customwidget_'.$w.'_link')));

            }

        }

    }

    if ($return != '') {
        return $return;
    } else {
        return false;
    }

}


/**
 *
 *
 * @param $sectorID
 * @return array|bool
 */
function checkDAVWidgets($sectorID)
{
    $return = array();


    //check Widget-parameter
    if(get_theme_mod('dav_widget_lawinenbericht_sector') == $sectorID) {array_push($return,'lawinenbericht');}
    if(get_theme_mod('dav_widget_bergwetter_sector') == $sectorID) {array_push($return,'bergwetter');}
    if(get_theme_mod('dav_widget_bergbericht_sector') == $sectorID) {array_push($return,'bergbericht');}
    if(get_theme_mod('dav_widget_huettensuche_sector') == $sectorID) {array_push($return,'huettensuche');}
    if(get_theme_mod('dav_widget_huetten_sector') == $sectorID) {array_push($return,'huetten');}
    if(get_theme_mod('dav_widget_ava_sector') == $sectorID) {array_push($return,'ava');}
    if(get_theme_mod('dav_widget_tour_sector') == $sectorID) {array_push($return,'tour');}
    if(get_theme_mod('dav_widget_panorama_sector') == $sectorID) {array_push($return,'panorama');}
    if(get_theme_mod('dav_widget_hallen_sector') == $sectorID) {array_push($return,'hallen');}


    if ($return != '') {
        return $return;
    } else {
        return false;
    }

}




/**
 * Build the HTML-Output for CustomWidgets
 *
 * @param $widgets
 * @return string
 *
 */
function buildCustomWidgets($widgets) {

    $return = '';

    foreach ($widgets as $widget) {

        if($widget['widget_image'] == '') {}

    $return .= '
    <div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1">'.$widget['widget_title'].'</div>
          <div class="card-body m-0 p-0 bg-success">
            <a href="'.$widget['widget_link'].'"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="'.$widget['widget_link'].'"><img class="img-fluid d-block m-0 p-0" src="'.$widget['widget_image'].'"></a></div>
        </div>
      </div>';

    }

    return $return;

}


/**
 *
 *
 * @param $widgets
 * @return string
 */
function buildDAVWidgets($widgets) {

    $return = '';

    $lawinenbericht = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Lawinenlagebericht</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Lawinen-Lage/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Lawinen-Lage/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/lawinenlagebericht.jpeg"></a></div>
        </div>
      </div>';

    $bergwetter = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Bergwetter</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Bergwetter/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Bergwetter/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/bergwetter.png"></a></div>
        </div>
      </div>';

    $bergbericht = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Bergbericht</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Bergbericht/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Bergbericht/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/bergbericht.png"></a></div>
        </div>
      </div>';

    $huettensuche = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Hüttensuche</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Huettensuche/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Huettensuche/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/huettensuche.png"></a></div>
        </div>
      </div>';

    $huetten = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Hüttentest</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/Huetten-Wege-Touren/Huettentest/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/Huetten-Wege-Touren/Huettentest/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/huettentest.png"></a></div>
        </div>
      </div>';

    $ava = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Alpenvereinaktiv</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenvereinaktiv.com/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenvereinaktiv.com/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/alpenvereinaktiv.png"></a></div>
        </div>
      </div>';

    $tour = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Tour der Woche</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Tour-der-Woche/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Tour-der-Woche/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/tourderwoche.png"></a></div>
        </div>
      </div>';

    $panorama = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Panorama-Magazin</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Panorama-Magazin/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Panorama-Magazin/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/panorama.png"></a></div>
        </div>
      </div>';

    $hallen = '<div class="col-sm-6 col-md-4 pt-4">
        <div class="card">
          <div class="card-header bg-primary text-white text-uppercase py-1"> Kletterhallensuche</div>
          <div class="card-body m-0 p-0">
            <a href="https://www.alpenverein.de/DAV-Services/Kletterhallen-Suche/" target="_blank"><button class="btn btn-card-top"><i class="fas fa-chevron-right"></i></button></a>
            <a href="https://www.alpenverein.de/DAV-Services/Kletterhallen-Suche/" target="_blank"><img class="img-fluid d-block m-0 p-0" src="'.get_template_directory_uri().'/images/kletterhallensuche.png"></a></div>
        </div>
      </div>';



    foreach ($widgets as $widget) {

        $return .= $$widget;

    }


    return $return;

}
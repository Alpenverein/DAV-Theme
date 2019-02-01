<?php


/**
 * Build a bootstrap-based MegaMenu
 * @param $menu_name Name of Menu
 * @param int $menu_columns Number of maximum Columns in level3
 * @param int $menu_levels Number of Levels in Menü
 * @return string
 */
function getDesktopMenu($menu_name, $text_color = 'text-white', $parentitem = null, $current = null, $menu_columns=3, $level_max = 3) {

    $return = '';
    $level = 1;
    $parent = 0;
    $child = 0;
    $column_actual = 1;



    $menu_arr = array();

    $menuitems = wp_get_nav_menu_items($menu_name);


    if(!is_bool($menuitems)) {


        // push all menu-elements to array
        foreach ($menuitems as $item) {

            $menu_link = $item->url;
            $menu_text = $item->title;
            $menu_classes = implode(' ', $item->classes);
            $menu_parent = $item->menu_item_parent;
            $menu_guid = $item->guid;
            $menu_order = $item->menu_order;
            $menu_id = $item->ID;
            $object_id = $item->object_id;

            array_push($menu_arr, array(
                'link' => $menu_link,
                'text' => $menu_text,
                'classes' => $menu_classes,
                'parent' => $menu_parent,
                'order' => $menu_order,
                'guid' => $menu_guid,
                'id' => $menu_id,
                'page_id' => $object_id

            ));
        }


        // build the menu
        $return .= '<ul class="navbar-nav level-1" id="menu-items">';

        for ($m = 0; $m < count($menu_arr); $m++) {


            $menu_arr[$m]['page_id'] == $parentitem ? $active = 'active' : $active = '';


            //Ist es ein Ebene-1 Element?
            if ($menu_arr[$m]['parent'] == 0) {

                //Ist das Folgeelement auch auf Ebene 1?
                if ($menu_arr[$m + 1]['parent'] == 0) {

                    // baue den Menüpunkt
                    $return .= '<li class="nav-item ' . $active . '"><a class="nav-link ' . $active . '" href="' . $menu_arr[$m]['link'] . '" title="' . $menu_arr[$m]['text'] . '">' . $menu_arr[$m]['text'] . '</a></li>';
                } else {

                    $column_actual = 1;


                    // Das nächste Menüelement ist nicht auf Ebene 1
                    // Baue den Menüpunkt, aber gleich mit Folgezeile
                    $return .= '<li class="nav-item dropdown ' . $active . '">
                    <a class="nav-link" href="' . $menu_arr[$m]['link'] . '" title="' . $menu_arr[$m]['text'] . '">
                      ' . $menu_arr[$m]['text'] . '</a>
                    <div class="dropdown-menu">';

                    $return .= '
                      <div class="container">
                        <div class="row">
                        <div class="col-lg-4">
                            <ul class="nav flex-column" id="main-nav-list">';

                    //erhöhe level auf 2
                    $level++;

                    //speichere Eltern-ID des Folgeelement ab
                    $parent = $menu_arr[$m + 1]['id'];

                }
            } else {

                $menu_arr[$m]['page_id'] == $current ? $active = 'active' : $active = '';

                $level_act = $level;
                switch ($level_act) {
                    case 2 :
                        if($column_actual < get_field('dav_menucolumn',$menu_arr[$m]['id'])) {
                            $column_actual++;
                            $return .= '</li></ul></div><div class="col-lg-4"><ul class="nav flex-column">';
                        }
                        $return .= '<li class="nav-item li-level2 ' . $active . '">
                                <a class="nav-level2" href="'.$menu_arr[$m]['link'].'" title="'.$menu_arr[$m]['text'].'">'.$menu_arr[$m]['text'].'</a>';
                        if($menu_arr[$m+1]['parent'] == 0) {
                            $return .= '</li></ul></div></div></div>';
                            $level = 1;
                        }
                        if($menu_arr[$m]['id'] == $menu_arr[$m+1]['parent']) {
                            $parent = $menu_arr[$m]['id'];
                            $return .= '<ul class="nav nav-level3">';
                            $level++;
                        }
                        break;
                    case 3 :
                        $return .= '<li class="li-level3 ' . $active . '"><i class="fas fa-angle-right"></i><a href="' . $menu_arr[$m]['link'] . '" title="'.$menu_arr[$m]['text'].'">'.$menu_arr[$m]['text'].'</a></li>';

                        if ($menu_arr[$m+1]['parent'] != $menu_arr[$m]['id']) {
                            if ($parent != $menu_arr[$m + 1]['parent']) {
                                $return .= '</ul>';
                                $level--;
                            }
                            if ($menu_arr[$m + 1]['parent'] == 0) {
                                $return .= '</li></ul></div></div></div>';
                                $level = 1;
                            }
                        }
                        break;

                        //TODO: Wenn eine vierte Ebene eingefügt wird, kommt diese als Ebene2 an. Muss gefixt werden.
                }
            }

        }


        $return .= '<li class="nav-item" style="padding-left: 0px;" id="main-search-icon" title="Suchfeld aufrufen"><i class="fa fa-search ' . $text_color . '" style="padding: 10px 15px 0px 15px; font-size: 1.5rem; cursor:pointer;"> </i></li>';

        // close the list
        $return .= '</ul>';

        //$return .= get_search_form();
        $return .= '<form role="search" method="get" id="mainmenu-search" class="searchform group" action="' . home_url('/') . '">
    <div class="input-group">
        <div class="input-group-append">
            <button class="btn" type="button" id="closesearch" style="background: #fff; color: #aaa; margin-left: 10px;" title="Suche schließen"><i class="fa fa-times"> </i></button>
        </div>
        <input type="search" class="form-control" placeholder="Suchbegriff eingeben" aria-label="Website durchsuchen" value="" name="s" id="s" title="Suche nach:">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="searchbutton" title="Suche ausführen" style="font-size: 1.5rem;"><i class="fa fa-search"> </i></button>
        </div>
    </div>
</form>';

    }

    //return the menu
    return $return;
}



/**
 * @param $menu_name
 * @param int $menu_columns
 * @param int $level_max
 * @return string
 */
function getMobileMenu($menu_name, $menu_columns=3, $level_max = 3) {

    $return = '';
    $level = 1;
    $parent = 0;
    $child = 0;
    $column_actual = 1;


    $menu_arr = array();

    $menuitems = wp_get_nav_menu_items($menu_name);



    //TODO: Wenn Array leer, dann hier enden.
    // push all menu-elements to array
    foreach( $menuitems as $item ) {

        $menu_link = $item->url;
        $menu_text = $item->title;
        $menu_classes = implode(' ',$item->classes);
        $menu_parent = $item->menu_item_parent;
        $menu_guid = $item->guid;
        $menu_order = $item->menu_order;
        $menu_id = $item->ID;

        array_push($menu_arr,array(
            'link' => $menu_link,
            'text' => $menu_text,
            'classes' => $menu_classes,
            'parent' => $menu_parent,
            'order' => $menu_order,
            'guid' => $menu_guid,
            'id' => $menu_id

        ));
    }


    // build the menu
    $return .= '<ul class="navbar-nav mr-auto" id="mobilenav">';


    for ($m = 0; $m < count($menu_arr); $m++) {

        //Ist es ein Ebene-1 Element?
        if($menu_arr[$m]['parent'] == 0) {

            //Ist das Folgeelement auch auf Ebene 1?
            if($menu_arr[$m+1]['parent'] == 0) {

                // baue den Menüpunkt
                $return .= '<li class="nav-item level-1"><a class="nav-link" href="'.$menu_arr[$m]['link'].'" title="'.$menu_arr[$m]['text'].'">'.$menu_arr[$m]['text'].'</a></li>';
            } else {
                // Das nächste Menüelement ist nicht auf Ebene 1
                // Baue den Menüpunkt, aber gleich mit Folgezeile

                //

                $return .= '<li class="nav-item level-1" style="color: #fff;" id="'.$menu_arr[$m]['id'].'">
<a class="nav-link" href="'.$menu_arr[$m]['link'].'" title="'.$menu_arr[$m]['text'].'">
                      '.$menu_arr[$m]['text'].'</a>
                      <button class="btn btn-menu collapsed float-right" data-toggle="collapse" data-target="#'.$menu_arr[$m+1]['id'].'" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-chevron-right" ></i></button> 
                    <div id="'.$menu_arr[$m+1]['id'].'" class="dropdown-menu dropmenu-level-2 collapse" data-parent="#mobilenav" aria-labelledby="'.$menu_arr[$m]['parent'].'" >';

                $return .= '<ul>';

                //erhöhe level auf 2
                $level++;

                //speichere Eltern-ID des Folgeelement ab
                $parent = $menu_arr[$m+1]['id'];

            }
        } else {

            $level_act = $level;

            switch ($level_act) {

                case 2 :

                    $return .= '<li class="nav-item dropdown-submenu level-2" style=" padding-bottom: 15px;">
                                <a class="nav-link" href="'.$menu_arr[$m]['link'].'" title="'.$menu_arr[$m]['text'].'">'.$menu_arr[$m]['text'].'</a>';

                    if($menu_arr[$m+1]['parent'] == 0) {

                        $return .= '</li></ul></div>';
                        $level = 1;
                    }

                    if($menu_arr[$m]['id'] == $menu_arr[$m+1]['parent']) {

                        $parent = $menu_arr[$m]['id'];

                        $return .= '<ul>';
                        $level++;
                    }

                    break;

                case 3 :

                    $return .= '<li class="nav-item level-3"><a class="nav-link" href="' . $menu_arr[$m]['link'] . '" title="'.$menu_arr[$m]['text'].'" style="
    padding-bottom: 0;
    padding-top: 0;
">'.$menu_arr[$m]['text'].'</a></li>';

                    if($parent != $menu_arr[$m+1]['parent']) {

                        $return .= '</ul>';
                        $level--;
                    }

                    if($menu_arr[$m+1]['parent'] == 0) {

                        $return .= '</li></ul>';
                        $return .= '</div>';
                        $level = 1;
                    }

                    break;


            }
        }

    }


    // close the list
    $return .= '</ul>';

    //return the menu
    return $return;
}


/**
 * @param $quicklink_style
 * @param $dav_menuview
 * @return string
 */
function getQuicklinksDesktop($quicklink_style, $dav_menuview) {

    $dav_intern_link = get_theme_mod('dav_intern_link');
    $dav_intern_text = get_theme_mod('dav_intern_text');
    $dav_phone = get_theme_mod('dav_phone');
    $dav_member = get_theme_mod('dav_member');
    $dav_extern1_link = get_theme_mod('dav_extern1_link');
    $dav_extern1_text = get_theme_mod('dav_extern1_text');
    $dav_extern2_link = get_theme_mod('dav_extern2_link');
    $dav_extern2_text = get_theme_mod('dav_extern2_text');


    $return = '';

    $return .= '<div class="row">
                    <div class="container">
                    <div class="col-md-12 text-right ';


    switch($dav_menuview) {
        case "boxed" : $return .= $quicklink_style.' p-0" style="box-shadow: 0px 5px 5px rgba(0,0,0,0.25);">'; break;
        case "fluid" : $return .= ' p-0">'; break;
        default: $return .= $quicklink_style.' p-0" style="box-shadow: 0px 5px 5px rgba(0,0,0,0.25);">'; break;
    }

                            $return .= '<div class="btn-group">';

                                // internal link
                                if($dav_intern_link != '') {
                                    $return .= '<a href="'.home_url().$dav_intern_link.'" class="btn btn-transparent" title="Link zu '.$dav_intern_text.'">'.$dav_intern_text.'</a>';}

                                    // phone
                                if($dav_phone != '') {
                                    $return .= '<a href="tel://'.preg_replace ('#\s+#' , '' , $dav_phone).'" class="btn btn-transparent" title="Jetzt Anrufen"><i class="fas fa-phone"> </i> '.$dav_phone.'</a>';
                                }

                                $return .= '<a href="'.$dav_member.'" class="btn btn-primary d-none d-lg-block" style="padding: 0;"><img src="'.get_template_directory_uri().'/images/btn_mitgliedwerden.png" class="img-fluid" alt="Mitglied werden" title="Mitglied werden"></a>';


                                if(($dav_extern1_link != '') || ($dav_extern1_text != '')) {
                                    $return .= '<a href="'.$dav_extern1_link.'" class="btn btn-quicklink d-none d-lg-block" target="_blank" id="header_menu1" title="Link zu '.$dav_extern1_text.'">'.$dav_extern1_text.'</a>';}
                                if(($dav_extern2_link != '') || ($dav_extern2_text != '')) {
$return .=  '<a href="'.$dav_extern2_link.'" class="btn btn-quicklink d-none d-lg-block" target="_blank" id="header_menu2" title="Link zu '.$dav_extern2_text.'">'.$dav_extern2_text.'</a>';}

                    $return .= '</div>
                        </div>
                    </div>
                </div>';

    
    return $return;
    
};


/**
 * @return string
 */
function getQuicklinksMobile() {

    $dav_intern_link = get_theme_mod('dav_intern_link');
    $dav_intern_text = get_theme_mod('dav_intern_text');
    $dav_phone = get_theme_mod('dav_phone');
    $dav_member = get_theme_mod('dav_member');
    $dav_extern1_link = get_theme_mod('dav_extern1_link');
    $dav_extern1_text = get_theme_mod('dav_extern1_text');
    $dav_extern2_link = get_theme_mod('dav_extern2_link');
    $dav_extern2_text = get_theme_mod('dav_extern2_text');

    $return = '';

            // internal link
            if($dav_intern_link != '') {
                $return .= '<a href="'.home_url().$dav_intern_link.'" class="btn btn-light btn-block" title="Link zu '.$dav_intern_text.'">'.$dav_intern_text.'</a>';}

            // phone
            if($dav_phone != '') {
                $return .= '<a href="tel://'.preg_replace ('#\s+#' , '' , $dav_phone).'" class="btn btn-light btn-block" title="Jetzt Anrufen"><i class="fas fa-phone"> </i> '.$dav_phone.'</a>';
            }

            //external links
            if(($dav_extern1_link != '') || ($dav_extern1_text != '')) {
                $return .= '<a href="'.$dav_extern1_link.'" class="btn btn-quicklink btn-light btn-block" target="_blank" id="header_menu1" title="Link zu '.$dav_extern1_text.'">'.$dav_extern1_text.'</a>';}
            if(($dav_extern2_link != '') || ($dav_extern2_text != '')) {
                $return .= '<a href="'.$dav_extern2_link.'" class="btn btn-quicklink btn-light btn-block" target="_blank" id="header_menu2" title="Link zu '.$dav_extern2_text.'">'.$dav_extern2_text.'</a>';}

            $return .= '<a href="'.$dav_member.'" class="btn btn-primary btn-block" style="margin-bottom: 16px;"><img src="'.get_template_directory_uri().'/images/btn_mitgliedwerden.png"></a>';

    return $return;
}
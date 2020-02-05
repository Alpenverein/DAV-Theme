<?php



/**
 * Preparing a nested structure from the flat array of wp_get_nav_menu_items
 * @param $nav_menu_items the return value from wp_get_nav_menu_items()
 * @param $menu_structure reference to the nested array which will be built recursive
 * @param $parent_id the parent_id of the actual navigation item 
 *
 */
function buildMenuStructure($nav_menu_items, &$menu_structure, $parent_id=0, $active_ids=array()){

    foreach($nav_menu_items as $item){
        if($item->menu_item_parent == $parent_id){
            $menu_item = array(
                "ID" => $item->object_id,
                "active" => in_array($item->ID, $active_ids),
                "column" => get_field('dav_menucolumn', $item->ID),
                "item" => $item,
                "sub_items" => array()
                );
            $menu_item["sub_items"] = buildMenuStructure($nav_menu_items, $menu_item["sub_items"], $item->ID, $active_ids);
            
            usort($menu_item["sub_items"], function($a, $b){
                if($a["column"] == $b["column"]){
                    return 0;
                } elseif($a["column"] < $b["column"]){
                    return -1;
                }else{
                    return 1;
                }
            });

            $menu_structure[] = $menu_item;
        }
    }
    return $menu_structure;
}


/**
 * Render a menu from the data of buildMenuStructure()
 * @param $menu_structure array() data of buildMenuStructure()
 */
function getHTMLDesktopMenu($menu_structure, $level=0, $active_items=array()){

    $level++;
    $html = "";

    switch($level){
        case 1:
            $search_button = '<li class="nav-item" style="padding-left: 0px;" id="main-search-icon" title="Suchfeld aufrufen"><i class="fa fa-search text-white" style="padding: 10px 15px 0px 15px; font-size: 1.5rem; cursor:pointer;"> </i></li>';
            $list_wrapper = '<ul id="menu-items" class="navbar-nav level-1">%s' . $search_button . '</ul>';            
            break;
        case 2:
            $list_wrapper  = '<div class="dropdown-menu"><div class="container"><div class="row">%s';
            $list_wrapper .= '</div></div></div>';
            break;
        case 3:
            $list_wrapper = '<ul class="nav nav-level3">%s</ul>';
        break;
        default:
            $list_wrapper = "<ul>%s</ul>";
    }
        
    
    $last_item = null;
    $new_column = false;
    foreach($menu_structure as $item){        
        $item["active"] ? $active = " active" : $active = "";
        
        if(!is_null($last_item)){
            if($item["column"] != $last_item["column"]){
                $new_column = true;
            } else {
                $new_column = false;
            }
        } 
         
        switch($level){
            case 1:
                $html .= '<li class="nav-item dropdown ' . $active . '">';
                $html .= '<a href="'. $item["item"]->url . '" class="nav-link" title="' . $item["item"]->attr_title . '">' . $item["item"]->title . '</a>';
                break;
            case 2:
                $html .= $new_column ? '</div><div class="col-lg-4">' : "";
                $html .= '<ul class="nav flex-column" id="main-nav-list">';
                $html .= '<li class="nav-item li-level2' . $active . '">';
                $html .= '<a href="'. $item["item"]->url . '" class="nav-link" title="' . $item["item"]->attr_title . '">' . $item["item"]->title . '</a>';
                break;
            case 3:
                $html .= '<li class="li-level3' . $active . '"><i class="fas fa-angle-right"></i>';
                $html .= '<a href="'. $item["item"]->url . '" title="' . $item["item"]->attr_title . '">' . $item["item"]->title . '</a>';
                break;
            default:
                $html .= '<li class="nav-item li-level' . $level . '' . $active . '">';
                $html .= '<a href="'. $item["item"]->url . '" class="nav-link" title="' . $item["item"]->attr_title . '">' . $item["item"]->title . '</a>';
        }
            
        if( count($item["sub_items"]) > 0){            
            $html .= getHTMLDesktopMenu($item["sub_items"], $level, $active_items);            
        }
        
        switch($level){
            case 2:
                $html .= '</li></ul>';
                $last_item = $item;
            break;
            default:
                $html .= "</li>";
        }

    }
    
    if($level==2){
        $html = '<div class="col-lg-4">' . $html . "</div>";    
    }
    
    return sprintf($list_wrapper, $html);
}


function getSearchForm(){
    $form = <<<'EOT'
    <form role="search" method="get" id="mainmenu-search" class="searchform group" action="%s">
        <div class="input-group">
            <div class="input-group-append">
                <button class="btn" type="button" id="closesearch" style="background: #fff; color: #aaa; margin-left: 10px;" title="Suche schließen">
                    <i class="fa fa-times"> </i>
                </button>
            </div>
            <input type="search" class="form-control" placeholder="Suchbegriff eingeben" aria-label="Website durchsuchen" value="" name="s" id="s" title="Suche nach:">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="searchbutton" title="Suche ausführen" style="font-size: 1.5rem;">
                    <i class="fa fa-search"> </i>
                </button>
            </div>
        </div>
    </form>
EOT;
$url = home_url('/');
return sprintf($form, $url);
}



function getActiveIds($menuitems){
    global $post;
    $show_as_active = array();
    
    if($post != null){        
        foreach($menuitems as $item){
            if($item->object_id == $post->ID){
                $act_id = $item->ID;
                $show_as_active[] = $act_id;
            }
        }

        $run = isset($act_id);        
        $cnt = count($menuitems);
        while($run && $cnt>=0){
            foreach($menuitems as $item){
                if($item->ID == $act_id){
                    if($item->menu_item_parent != 0){
                        $act_id = $item->menu_item_parent;
                        $show_as_active[] = $act_id;
                    }else{
                        $run = false;
                    }
                }
            }
            $cnt--;
        }
    }
    return $show_as_active;
}



/**
 * Build a bootstrap-based MegaMenu
 * @param $menu_name Name of Menu
 * @param int $menu_columns Number of maximum Columns in level3
 * @param int $menu_levels Number of Levels in Menü
 * @return string
 */
function getDesktopMenu($menu_name) {
    $menuitems = wp_get_nav_menu_items($menu_name,array('post_status' => 'publish'));
    $active_ids = getActiveIds($menuitems);
    $menu_structure = array();
    $menu_structure = buildMenuStructure($menuitems, $menu_structure, 0, $active_ids);
    return getHTMLDesktopMenu( $menu_structure) . getSearchForm();
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
    foreach ($menuitems as $item) {

        array_push($menu_arr, array(
            'link' => $item->url,
            'text' => $item->title,
            'classes' => implode(' ', $item->classes),
            'parent' => $item->menu_item_parent,
            'order' => $item->menu_order,
            'guid' => $item->guid,
            'id' => $item->ID,
            'page_id' => $item->object_id,
            'target' => $item->target,
            'desc' => $item->description,
            'title_attr' => $item->attr_title,
        ));
    }


    // build the menu
    $return .= '<ul class="navbar-nav mr-auto" id="mobilenav">';


    for ($m = 0; $m < count($menu_arr); $m++) {

        $menu_arr[$m]['title_attr'] != '' ? $title = $menu_arr[$m]['title_attr'] : $title = $menu_arr[$m]['text'];
        $menu_arr[$m]['desc'] != '' ? $ariadesc = $menu_arr[$m]['desc'] : $ariadesc = $menu_arr[$m]['text'];
        $menu_arr[$m]['target'] != '' ? $target = 'target='.$menu_arr[$m]['target'] : $target = '';

        //Ist es ein Ebene-1 Element?
        if($menu_arr[$m]['parent'] == 0) {

            //Ist das Folgeelement auch auf Ebene 1?
            if($menu_arr[$m+1]['parent'] == 0) {

                // baue den Menüpunkt
                $return .= '<li class="nav-item level-1"><a class="nav-link" href="'.$menu_arr[$m]['link'].'" title="'.$title.'" '.$target.' aria-label="'.$ariadesc.'">'.$menu_arr[$m]['text'].'</a></li>';
            } else {
                // Das nächste Menüelement ist nicht auf Ebene 1
                // Baue den Menüpunkt, aber gleich mit Folgezeile

                //

                $return .= '<li class="nav-item level-1" style="color: #fff;" id="'.$menu_arr[$m]['id'].'">
<a class="nav-link" href="'.$menu_arr[$m]['link'].'" title="'.$title.'" '.$target.' aria-label="'.$ariadesc.'">
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
                                <a class="nav-link" href="'.$menu_arr[$m]['link'].'" title="'.$title.'" '.$target.' aria-label="'.$ariadesc.'">'.$menu_arr[$m]['text'].'</a>';

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

                    $return .= '<li class="nav-item level-3"><a class="nav-link" href="' . $menu_arr[$m]['link'] . '" title="'.$title.'" '.$target.' aria-label="'.$ariadesc.'" style="
    padding-bottom: 0;
    padding-top: 0;
">'.$menu_arr[$m]['text'].'</a></li>';

                    if(isset($menu_arr[$m+1]) && $parent != $menu_arr[$m+1]['parent']) {

                        $return .= '</ul>';
                        $level--;
                    }

                    if(isset($menu_arr[$m+1]) && $menu_arr[$m+1]['parent'] == 0) {

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
    $dav_mail = get_theme_mod('dav_mail');
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

    // mail
    if($dav_mail != '') {
        $return .= '<a href="mailto:'.preg_replace ('#\s+#' , '' , $dav_mail).'" class="btn btn-transparent" title="Jetzt eine E-Mail schreiben"><i class="fas fa-envelope"> </i> '.$dav_mail.'</a>';
    }

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
    $dav_mail = get_theme_mod('dav_mail');
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

    // mail
    if($dav_phone != '') {
        $return .= '<a href="mailto:'.preg_replace ('#\s+#' , '' , $dav_mail).'" class="btn btn-light btn-block" title="Jetzt E-Mail schreiben"><i class="fas fa-envelope"> </i> '.$dav_mail.'</a>';
    }

    //external links
    if(($dav_extern1_link != '') || ($dav_extern1_text != '')) {
        $return .= '<a href="'.$dav_extern1_link.'" class="btn btn-quicklink btn-light btn-block" target="_blank" id="header_menu1" title="Link zu '.$dav_extern1_text.'">'.$dav_extern1_text.'</a>';}
    if(($dav_extern2_link != '') || ($dav_extern2_text != '')) {
        $return .= '<a href="'.$dav_extern2_link.'" class="btn btn-quicklink btn-light btn-block" target="_blank" id="header_menu2" title="Link zu '.$dav_extern2_text.'">'.$dav_extern2_text.'</a>';}

    $return .= '<a href="'.$dav_member.'" class="btn btn-primary btn-block" style="margin-bottom: 16px;"><img src="'.get_template_directory_uri().'/images/btn_mitgliedwerden.png"></a>';

    return $return;
}
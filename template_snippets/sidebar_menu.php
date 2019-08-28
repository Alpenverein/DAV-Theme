<?php
/**
 * Functions for returning a sidebar.
 *
 * @author Puls13, Stephan Mitteldorf
 */



/**
 * Returns an Card-Element with a list of subpages or sibblingpages
 *
 * @param $post
 * @return string
 */
function DAV_AutoSidebarMenu($post) {

    $return = '';

    $sidebartype = get_field('sidebarmenu_type');

    if ($sidebartype != NULL) {


        switch ($sidebartype) {
            case 2 : $args = array('parent' => $post->ID);
            $sidebardata = get_pages($args);
            $sidebarheader = 'Unterseiten';
            break;

            case 1 : $args = array('parent' => $post->post_parent);
            $sidebardata = get_pages($args);
            $sidebarheader = 'Weitere Seiten';
            break;

            case 0 : $sidebardata = null; $sidebarheader = ''; break;
            default : $sidebardata = null; $sidebarheader = ''; break;
        }


        if(!empty($sidebardata)) {

            $title = get_field('sidebarmenu_title');

            if($title != '') {
                $sidebarheader = $title;
            }


            $return .= '<div class="card card-widget-primary mb-4">';
            $return .= '<div class="card-header bg-primary text-white text-uppercase py-1">';
            $return .= $sidebarheader;
            $return .= '</div>';
            $return .= '<div class="card-body">';
            $return .= '<ul class="list-group list-group-flush">';

            foreach ($sidebardata as $pageitem) {

                $return .= '<a class="list-group-item" href="'.get_the_permalink($pageitem->ID).'">';
                $return .= get_the_title($pageitem->ID);
                $return .= '</a>';

            }

            $return .= '</ul>';
            $return .= '</div>';
            $return .= '</div>';

        }

    }


    return $return;

}


/**
 * Returns a Card-Element with a list of pages, set in the wordpress-backend.
 *
 *
 * @return string
 */
function DAV_CustomSidebarMenu() {


    $return = '';

    // add a linklist to the right column
    $linklist = get_field('page_linklist');

    if (!empty($linklist)) {


        $return .= '<div class="card card-widget-primary mb-4">';
        $return .= '<div class="card-header bg-primary text-white text-uppercase py-1">';
        $return .= get_field('page_linklist_title');
        $return .= '</div>';
        $return .= '<div class="card-body">';

        $return .= '<ul class="list-group list-group-flush">';

        for ($i = 0; $i < count($linklist); $i++) {

            $return .= '<a class="list-group-item" href="'.$linklist[$i].'">';
            $return .= get_the_title(url_to_postid($linklist[$i]));
            $return .= '</a>';
        }

        $return .= '</ul>';

        $return .= '</div>';
        $return .= '</div>';

    }

    return $return;

}









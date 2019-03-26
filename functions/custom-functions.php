<?php
/**
 * Filename: custom-functions.php
 * Description:
 *
 * User: Stephan Mitteldorf
 * Date: 20.08.18
 * Time: 21:25
 */



/**
 * Add an optional breadcrumb
 */
function nav_breadcrumb() {

    $ec_overview_slug = get_option('tribe_events_calendar_options')['eventsSlug'];
    $ec_event_slug = get_option('tribe_events_calendar_options')['singleEventSlug'];

    $uri_slug = explode('/' , $_SERVER['REQUEST_URI']);
    var_dump($ec_event_slug);
    var_dump($uri_slug);

    if(get_theme_mod('dav_menuview') != false) {$dav_menuview = get_theme_mod('dav_menuview');} else {$dav_menuview = 'boxed';};

    $delimiter = '&nbsp;>&nbsp;';
    $home = 'Home';
    $before = '<li class="breadcrumb-item" aria-current="page">';
    $after = '</li>';

    if ( !is_home() && !is_front_page() || is_paged() ) {

        echo '<div class="d-print-none ';

        switch($dav_menuview) {
            case "boxed" : echo 'container '; break;
            case "fluid" :  echo 'container-fluid bg-transparent60'; break;
            default: echo 'container '; break;
        }

        echo '"><div class="row"><div class="col-12 ';

        switch($dav_menuview) {
            case "boxed" : echo ''; break;
            case "fluid" :  echo 'p-0'; break;
            default: echo ' '; break;
        }

        echo'"><nav aria-label="breadcrumb" ';

        switch($dav_menuview) {
            case "boxed" : echo ' '; break;
            case "fluid" :  echo 'class="container"'; break;
            default: echo ' '; break;
        }


        echo '><ol class="breadcrumb ';

        switch($dav_menuview) {
            case "boxed" : echo 'bg-transparent60'; break;
            case "fluid" :  echo ''; break;
            default: echo 'bg-transparent60'; break;
        }

        echo '">';

        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a href="' . $homeLink . '"><li class="breadcrumb-item" aria-current="page">' . $home . '</li></a> '. $delimiter;

        if ( is_category()) {

            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;

        } elseif ( is_day() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {

            if ( get_post_type() != 'post' ) {

                if(get_post_type() == 'touren') {

                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;

                    if((get_theme_mod('dav_touren_breadcrumb') != false) && ((get_theme_mod('dav_touren_breadcrumb') != ''))) {
                        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . get_theme_mod('dav_touren_breadcrumb') . '</a> ' . $delimiter . ' ';
                        echo $before . get_the_title() . $after;
                    } else {
                        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . 'Touren' . '</a> ' . $delimiter . ' ';
                        echo $before . get_the_title() .$after;}

                } else {

                    $post_type = get_post_type_object(get_post_type());
                    $slug = $post_type->rewrite;

                    if($uri_slug[1] == $ec_event_slug) {

                        echo '<a href="' . $homeLink . '/' . $ec_overview_slug . '/">'. ucfirst($ec_overview_slug) . '</a> ' . $after;

                    } else {

                    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                    echo $before . get_the_title() . $after;
                    }

                }
            }

            else {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && get_post_type() != 'touren' && get_post_type() != 'persona' && !is_404()  && $uri_slug[1] != $ec_overview_slug && $uri_slug[1] != $ec_event_slug) {

            echo $before . 'Ergebnisse für Ihre Suche  "' . get_search_query() . '"' . $after;


        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;

        } elseif ( 'touren' == get_post_type()) {

            if((get_theme_mod('dav_touren_breadcrumb') != false) && ((get_theme_mod('dav_touren_breadcrumb') != ''))) {
                echo $before . get_theme_mod('dav_touren_breadcrumb') . $after;
            } else {echo $before . 'Touren' . $after;}

        } elseif ( 'persona' == get_post_type()) {
            echo $before . 'Persona' . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before .get_the_title() . $after;

        } elseif ( is_search() ) {
            echo $before . 'Ergebnisse für Ihre Suche nach "' . get_search_query() . '"' . $after;

        } elseif ( is_tag() ) {
            echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_404() ) {
            echo $before . 'Fehler 404' . $after;

        }

        if ($uri_slug[1] == $ec_overview_slug) {

            echo $before . ucfirst($ec_overview_slug) . $after;
        }




        if ( get_query_var('paged')) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo '&nbsp;(';
            echo __('Seite') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')&nbsp;';
        }

        echo '</ol></nav></div></div></div> ';

    }
}


/**
 * Changes the output
 * @param $more
 * @return string
 */
function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * With this function, you can insert an Excerpt of definded length
 * The number of signs is editable
 *
 * @param int $chars Number of Charts
 * @return string
 */
function excerpt_chars($excerpt, $chars)
{
    global $post;

    $out = strip_tags($excerpt);
    $out = substr($out, 0, (int) $chars);

    return $out;
}


/**
 * Pagination for news
 * @param string $pages
 * @param int $range
 */
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        { $pages = 1; }
    }

    if(1 != $pages)
    {
        echo '<ul class="pagination">';
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'">&laquo;</a></li>';
        if($paged > 1 && $showitems < $pages) echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'">&lsaquo;</a></li>';

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? '<li class="page-item"><a class="page-link active">'.$i.'</a></li>':'<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
            }
        }

        if ($paged < $pages && $showitems < $pages) echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'">&rsaquo;</a></li>';
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'">&raquo;</a></li>';
        echo '</ul>';
    }
}
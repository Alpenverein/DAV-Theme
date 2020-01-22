<?php





function csc_news( $atts ) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'titel' => 'Nachrichten',
            'menge' => 3,
            'in' => '',
            'out' => '',
        ),
        $atts
    );


    get_theme_mod('dav_excerpt') ? $excerpt = get_theme_mod('dav_excerpt') : $excerpt = 160;

    $return = '';
    $args = array();
    $the_query = '';


    if (empty($atts['in']) != '') {
        $category_in = explode(",",$atts['in']);
    } else {
        $category_in = false;
    }

    if (empty($atts['out']) != '') {
        $category_out = explode(",",$atts['out']);
    } else {
        $category_out = false;
    }


    if ((!isset($news_line)) || ($news_line ==  "")) {
        $news_line = 3;
    }

    switch ($news_line) {
        case 1: $columns = 12; $cardclass = 'card-news-one'; break;
        case 2: $columns = 6; $cardclass = 'card-news-two'; break;
        default: $columns = 4; $cardclass = 'card-news-three'; break;
    }

    if((intval($news_quantity) % intval($news_line)) != 0) {
        $news_quantity = (int)$news_quantity;
        $news_quantity++;
    }


    if($category_in == false) {

        if($category_out == false) {

            $the_query = new WP_Query(array('posts_per_page' => $news_quantity));

        }

        else {

            $the_query = new WP_Query(array('posts_per_page' => $news_quantity, 'category__not_in' => $category_out));
        }

    }

    else {

        if($category_out == false) {

            $the_query = new WP_Query(array('posts_per_page' => $news_quantity,  'category__in' => $category_in));

        }

        else {

            $the_query = new WP_Query(array('posts_per_page' => $news_quantity,  'category__in' => $category_in, 'category__not_in' => $category_out));
        }


    }

    $return .= '<div class="container">';
    $return .= '<div class="row content-divider">
            <div class="col-12">
                <h1>'.$atts['titel'].'</h1>
            </div>
        </div>';

    $return .= '<div class="container">';
    $return .= '<div class="row">';


    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $return .= '<div class="col-sm-6 col-md-4 pt-4">
                    <div class="card card-news-three">
                        <div class="card-body">
                            <a href="' . get_the_permalink() . '"><h2 class="news-head">' . get_the_title() . '</h2></a>
                            <span class="news-date">'.get_the_date().'</span>
                            <p style="margin-bottom: 3rem;">' . excerpt_chars(get_the_excerpt(),$excerpt) . '</p>
                            <a href="' . get_the_permalink() . '"><button class="btn btn-news"><i class="fas fa-chevron-right"></i></button> </a>
                        </div>
                    </div>
                </div>';

    endwhile;
    else :

        $return .= '<div class="col-md-4 pt-4">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="news-head">Keine Nachrichten</h2>
                                <span class="news-date">'.get_the_date().'</span>
                                <p>Aktuell haben wir nichts zu vermelden. Aber vielleicht kommt ja bald wieder was?</p>
                                <a href="#"><button class="btn btn-news"><i class="fas fa-chevron-right"></i></button> </a>
                            </div>
                        </div>
                    </div>';

    endif;

    $return .= '</div>';
    $return .= '</div>';

    return $return;

}
add_shortcode( 'news', 'csc_news' );
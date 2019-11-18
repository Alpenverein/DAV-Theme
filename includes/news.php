<?php



/**
 * @param $news_quantity
 * @param $news_line
 * @param $news_title_view
 * @param $news_title_text
 * @param string $news_category_in
 * @param string $news_category_out
 * @return string
 */
function show_news($news_quantity,$news_line,$news_category_in = '',$news_category_out = '',$news_image = 'false') {


    get_theme_mod('dav_excerpt') ? $excerpt = get_theme_mod('dav_excerpt') : $excerpt = 160;

    $return = '';
    $args = array();
    $the_query = '';

    if (!isset($news_quantity)) {
        $news_quantity = 3;
    }

    if (empty($news_category_in) != true) {
        $category_in = explode(",",$news_category_in);
    } else {
        $category_in = false;
    }

    if (empty($news_category_out) != true) {
        $category_out = explode(",",$news_category_out);
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



    $return .= '<div class="row">';


    if (($news_image == 'false')) {

        if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

            $return .= '<div class="col-sm-6 col-md-' . $columns . ' pt-4">
                    <div class="card '.$cardclass.'">
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

    } else {

        if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()));

    if($thumbnail == false) {
        $thumbnail[0] = get_template_directory_uri().'/images/placeholder_news.png';
    }
                $return .= '<div class="col-sm-6 col-md-'. $columns .'  pt-4">
                    <div class="card ">
                    <a href="' . get_the_permalink() . '"><img class="card-img-top" src="'.$thumbnail[0].'" alt="Artikelbild zu Artikel ' . get_the_title() . '"></a>
                        <div class="card-body card-news-image">
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
                                <p style="margin-bottom: 3rem;">Aktuell haben wir nichts zu vermelden. Aber vielleicht kommt ja bald wieder was?</p>
                                <a href="#"><button class="btn btn-news"><i class="fas fa-chevron-right"></i></button> </a>
                            </div>
                        </div>
                    </div>';

        endif;

    }

    $return .= '</div>';

    $return .= '</div>';


    return $return;
}


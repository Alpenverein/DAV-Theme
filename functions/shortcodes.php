<?php
/**
 *
 *
 * @param $atts
 * @return string
 */


/**
 * Newsblock Shortcode
 *
 * Fügt an beliebiger Stelle einen Newsblock ein. Analog den News der Startseite, können Menge, Artikel/Zeile, Kategorie und Bildanzeige festgelegt werden.
 *
 * Details werden in den FAQ erklärt.
 *
 * @param $atts Argumente
 * @return string Ausgabe
 */
function csc_newsblock( $atts ) {

    $return = '';

    // Attributes
    $atts = shortcode_atts(
        array(
            'titel' => 'Nachrichten',
            'kategorie_in' => '',
            'kategorie_out' => '',
            'bilder' => 'false',
            'menge' => 2,
            'zeile' => 2
        ),
        $atts
    );

    $return .= '<div class="row">';
    $return .= '<div class="col-12">';
    $return .= '<h1>'.$atts['titel'].'</h1>';
    $return .= '</div>';
    $return .= '</div>';
    $return .= '<div class="row">';
    $return .=  show_news($atts['menge'],$atts['zeile'],$atts['kategorie_in'],$atts['kategorie_out'],$atts['bilder']);
    $return .= '</div>';
    $return .= '</div>';

    return $return;
}

add_shortcode( 'newsblock', 'csc_newsblock' );
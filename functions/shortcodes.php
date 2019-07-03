<?php


// Add Shortcode
function csc_submenue( $atts ) {

    // Attributes
    $atts = shortcode_atts(
        array(
            'ordnung' => 'asc',
        ),
        $atts
    );

}
add_shortcode( 'unterseiten', 'csc_submenue' );
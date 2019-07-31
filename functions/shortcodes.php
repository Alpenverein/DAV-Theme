<?php


// Add Shortcode
function csc_submenue( $atts ) {


    $return = '';

    // Attributes
    $atts = shortcode_atts(
        array(
            'ordnung' => 'asc',
        ),
        $atts
    );



    return $return;


}
add_shortcode( 'unterseiten', 'csc_submenue' );
<?php
/**
 * Filename: widgets.php
 * Description:
 *
 * User: Stephan Mitteldorf
 */

function dav_page_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'Seiten Widgets',
            'id' => 'page_widgets',
            'description' => 'Dieses Widgets wird nur auf Seiten mit dem Template "Widgetspalte" angezeigt.',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
}

function dav_footer1_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'Footer Spalte 1',
            'id' => 'footer_widget_1',
            'description' => 'Content für die erste Spalte im Footer',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
}

function dav_footer2_widgets_init()
{
    register_sidebar(
        array(
            'name' => 'Footer Spalte 2',
            'id' => 'footer_widget_2',
            'description' => 'Content für die zweite Spalte im Footer',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
}

function dav_footer3_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Footer Spalte 3',
            'id'            => 'footer_widget_3',
            'description'   => 'Content für die dritte Spalte im Footer',
            'before_widget' => '<div>',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
        ));
}

function dav_news_primary_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Widget mit Container Grün',
            'id'            => 'news_widget_primary',
            'description'   => 'Dieses Widget kann auf den Nachrichten-Seiten benutzt werden.',
            'before_widget' => '<div class="card card-widget-primary-news mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<div class="card-header card-widget-header bg-primary text-white text-uppercase py-1">',
            'after_title' => '</div>',
        ));
}


function dav_news_light_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Widget mit Container Hell',
            'id'            => 'news_widget_light',
            'description'   => 'Dieses Widget kann auf den Nachrichten-Seiten benutzt werden.',
            'before_widget' => '<div class="card card-widget-light-news mb-4">',
            'after_widget' => '</div>',
            'before_title' => '<div class="card-header card-widget-header bg-light text-dark text-uppercase py-1">',
            'after_title' => '</div>',

        ));
}

function dav_news_dark_widgets_init() {
    register_sidebar(
        array(
            'name'          => 'Widget mit Container Dunkel',
            'id'            => 'news_widget_dark',
            'description'   => 'Dieses Widget kann auf den Nachrichten-Seiten benutzt werden.',
            'before_widget' => '<div class="card card-widget-dark-news mb-4 ">',
            'after_widget' => '</div>',
            'before_title' => '<div class="card-header card-widget-header bg-dark text-white text-uppercase py-1">',
            'after_title' => '</div>'
        ));
}


add_action( 'widgets_init', 'dav_footer1_widgets_init' );
add_action( 'widgets_init', 'dav_footer2_widgets_init' );
add_action( 'widgets_init', 'dav_footer3_widgets_init' );
add_action( 'widgets_init', 'dav_news_primary_widgets_init' );
add_action( 'widgets_init', 'dav_news_light_widgets_init' );
add_action( 'widgets_init', 'dav_news_dark_widgets_init' );
add_action( 'widgets_init', 'dav_page_widgets_init' );
<!DOCTYPE html>

<?php

require_once get_template_directory() . '/startpage_elements/main-menu.php';

//breadcrumb
if(get_theme_mod('dav_breadcrumb') != false) {$breadcrumb = 1;} else {$breadcrumb = 0;};

if(get_theme_mod('dav_menucolor') != false) {$dav_menucolor = get_theme_mod('dav_menucolor');} else {$dav_menucolor = 'primary';};
if(get_theme_mod('dav_menuview') != false) {$dav_menuview = get_theme_mod('dav_menuview');} else {$dav_menuview = 'boxed';};
if(get_theme_mod('dav_menubehavior') != false) {$dav_menubehavior = get_theme_mod('dav_menubehavior');} else {$dav_menubehavior = '';};


//set the menucolor
switch($dav_menucolor) {
    case "primary" : $menucolor = 'bg-primary'; $navbar = 'navbar-dark'; $quicklink_style = 'quicklink-primary'; $text_color = 'text-white'; break;
    case "light" :  $menucolor = 'bg-light'; $navbar = 'navbar-light'; $quicklink_style = 'quicklink-light'; $text_color = 'text-dark'; break;
    case "dark" : $menucolor = 'bg-dark'; $navbar = 'navbar-dark'; $quicklink_style = 'quicklink-dark'; $text_color = 'text-white'; break;
    case "white" : $menucolor = 'bg-white'; $navbar = 'navbar-light'; $quicklink_style = 'quicklink-light'; $text_color = 'text-dark'; break;
    case "trans" : $menucolor = 'bg-transparent60'; $navbar = 'navbar-light trans'; $quicklink_style = 'quicklink-light'; $text_color = 'text-dark'; break;
    default: $menucolor = 'bg-primary'; $navbar = 'navbar-dark'; $quicklink_style = 'quicklink-primary'; $text_color = 'text-white'; break;
}


//set the menubehavior
switch($dav_menubehavior) {
    case "" : $menubehavior = ''; break;
    case "sticky" :  $menubehavior = 'sticky-top'; break;
    default: $menubehavior = ''; break;
}


if(is_front_page() == true) {

    $fixed = '';

    if ((get_theme_mod('dav_startimage_radio') == 'fullscreen') && (get_theme_mod('dav_startimage') != '')) {

        $fixed_before .= '<div class="fixed-top">';
        $fixed_after .= '</div>';

    } else {
        $fixed_before .= '';
        $fixed_after .= '';
    };


    if ((get_theme_mod('dav_slider_fullscreen') == 'true') && (get_theme_mod('dav_slider_visibility_check') == true)) {

        $fixed_before .= '<div class="fixed-top">';
        $fixed_after .= '</div>';

    } else {
        $fixed_before .= '';
        $fixed_after .= '';
    };

}

//set current page_id
global $post;
$parent = $post->ID;
$current = $post->ID;

while(wp_get_post_parent_id($parent) != 0) {
    $parent = wp_get_post_parent_id($parent);
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title><?php if(!is_front_page()){wp_title(''); echo ' | '; bloginfo( 'name' );} else {bloginfo( 'name' );}  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/fontawesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();; ?>/assets/styles/custom.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/styles/cards.css" type="text/css">
<?php wp_head(); ?>
</head>

<body
    <?php

    $style = 'style="';

    // Background-Options
    if(get_theme_mod('dav_background_color')) {

        $style .= 'background-color: '.get_theme_mod('dav_background_color').';';
    }

    if(get_theme_mod('dav_backgroundimage')) {

        $style .= 'background: url('.get_theme_mod('dav_backgroundimage').'); background-position: top center; background-repeat: repeat-x repeat-y;';
    }

    $style .= '"';


    echo $style;

    ?>
>
<!-- Navigation Mobile start -->

<div class="d-lg-none d-xl-none">
    <nav class="navbar bg-white navbar-mobile">
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Zur Startseite" rel="home">
            <?php
                if(get_theme_mod('dav_logo')) {
                    $logo_link = get_theme_mod('dav_logo');
                    echo '<img src="'.$logo_link.'" class="img-fluid brand-img">';
                } else {
                    echo '<img src="'.get_template_directory_uri().'/assets/img/logo.png" class="img-fluid brand-img">';
                }
            ?>
        </a>
        <button class="navbar-toggler collapsed btn-lg" type="button" data-toggle="collapse" data-target="#navbarMobile" aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="navbar-collapse collapse" id="navbarMobile" style="">
            <?php get_search_form(); ?>
            <?php echo getMobileMenu('Hauptmenü');

            if ((get_theme_mod('dav_quicklink') != false) && (get_theme_mod('dav_quicklink') == 'true')) {

            echo getQuicklinksMobile(); } ?>
        </div>
    </nav>
</div>

<!-- Navigation mobile end -->


<!-- Navigation Desktop start -->
<?php

if(is_front_page()) {

    if ((get_theme_mod('dav_startimage') != false) || (get_theme_mod('dav_slider_visibility_check') != false)) {
        $style_helper = '<div class="'.$fixed.'">';
    } else {$style_helper = ' ';}

} else {$style_helper = '';}
?>
<?php echo $fixed_before; ?>

<?php if ((get_theme_mod('dav_quicklink') != false) && (get_theme_mod('dav_quicklink') == 'true')) {

    echo '<div class="d-none d-lg-block d-print-none ';

    switch ($dav_menuview) {
        case "boxed" :
            echo 'container ';
            break;
        case "fluid" :
            echo 'container-fluid p-0';
            break;
        default:
            echo 'container ';
            break;
    }

    switch ($dav_menuview) {
        case "boxed" :
            echo '';
            break;
        case "fluid" :
            echo ' ' . $quicklink_style;
            break;
        default:
            echo '';
            break;
    }
    echo '">';

    echo getQuicklinksDesktop($quicklink_style, $dav_menuview);

    echo '</div>';
}
    ?>

<div class="d-none d-lg-block d-print-none
<?php
switch($dav_menuview) {
    case "boxed" : echo 'container '; break;
    case "fluid" :  echo 'container-fluid p-0 '.$menucolor.' '; break;
    default: echo 'container '; break;
}
echo $menubehavior;
?>
">
    <nav id="main-nav-head" class="navbar navbar-expand-lg
     <?php
    switch($dav_menuview) {
        case "boxed" : echo $navbar.' '.$menucolor; break;
        case "fluid" :  echo $navbar; break;
        default: echo $navbar.' '.$menucolor; break;
    }
    ?>
     navbar-wide navbar-desktop">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Zur Startseite" rel="home">

                    <?php

                    if(get_theme_mod('dav_logo')) {

                        $logo_link = get_theme_mod('dav_logo');

                        echo '<img src="'.$logo_link.'" class="img-fluid brand-img">';

                    } else {

                        echo '<img src="'.get_template_directory_uri().'/assets/img/logo.png" class="img-fluid brand-img">';
                    }

                    ?>


                </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarDesktop">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center justify-content-end" id="navbarDesktop">


                <?php echo getDesktopMenu('Hauptmenue', $text_color, $parent, $current); ?>

            </div>
        </div>
    </nav>
</div>

<?php echo $fixed_after; ?>
<!-- Navigation end -->

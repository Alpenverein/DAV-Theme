<?php
//Get Socialmedia links from options
if(get_theme_mod('dav_facebook') != false) {$dav_facebook = get_theme_mod('dav_facebook');} else {$dav_facebook = '';};
if(get_theme_mod('dav_twitter') != false) {$dav_twitter = get_theme_mod('dav_twitter');} else {$dav_twitter = '';};
if(get_theme_mod('dav_instagram') != false) {$dav_instagram = get_theme_mod('dav_instagram');} else {$dav_instagram = '';};


?>
<footer class="container d-print-none">

    <?php

    if(get_theme_mod('dav_footerimage')) {

        $image_link = get_theme_mod('dav_footerimage');

        echo '
        <div class="row"><div class="col-12"><img src="'.$image_link.'" class="img-fluid"></div></div>';

    }

    ?>

    <div class="container py-4" style="background-color: #d8d8d8">
        <div class="row justify-content-end">
            <div class="col-12 col-sm-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_widget_1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer_widget_1' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_widget_2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer_widget_2' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <?php if ( is_active_sidebar( 'footer_widget_3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer_widget_3' ); ?>
                <?php endif; ?>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 p-4">
                <?php

                if(get_theme_mod('dav_footerlogo')) {

                    $logo_link = get_theme_mod('dav_footerlogo');

                    echo '<img src="'.$logo_link.'" class="img-fluid">';

                }

                ?>
            </div>
        </div>
    </div>
    <div class="container bg-dark">
        <div class="row">
            <div class="col-12">
                <div class="float-none float-md-left text-center text-md-left">
                <?php

                if($dav_facebook != '') {
                    echo '<a href="'.$dav_facebook.'" title="Unser Facebook-Auftritt" target="_blank"><button class="btn btn-transparent"><i class="fab fa-facebook text-light"></i></button></a>';}
                if($dav_twitter != '') {
                    echo '<a href="'.$dav_twitter.'" title="Unser Twitter-Account" target="_blank"><button class="btn btn-transparent"><i class="fab fa-twitter text-light"></i></button></a>';}
                if($dav_instagram != '') {
                    echo '<a href="'.$dav_instagram.'" title="Unser Instagram-Feed" target="_blank"><button class="btn btn-transparent"><i class="fab fa-instagram text-light"></i></button></a>';}
                ?>
                </div>

                <div class="text-light d-none d-md-inline-flex">
                <?php

                if(($dav_facebook != '') || ($dav_twitter != '') || ($dav_instagram != '')) {

                    echo '<span class=""> | </span>';
                }


                ?>

                </div>

                <div class="d-flex d-md-inline-flex justify-content-center justify-content-md-start">
                <?php

                $theme_locations = get_nav_menu_locations();
                $menu_obj = get_term( $theme_locations["footer"], 'nav_menu' );

                if(get_class($menu_obj) != "WP_Error"){
                    $menu_name = $menu_obj->name;
                    wp_nav_menu(array('menu'=>$menu_name,'menu_id'=>'footer_menu','menu_class'=>'nav flex-column flex-md-row justify-content-center','container'=>'d-inline-flex','add_li_class'=>'nav-item'));
                }
                ?>
                </div>

            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<?php wp_footer(); ?>

<?php

if(get_theme_mod('dav_gotop') == true) {

    echo '<a href="#" class="btn btn-primary d-none" id="top-link"> <i class="fas fa-angle-up"></i></a>';

}
?>

</body>
</html>
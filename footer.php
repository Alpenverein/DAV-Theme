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

                wp_nav_menu(array('menu'=>'footer','menu_id'=>'footer_menu','menu_class'=>'nav flex-column flex-md-row justify-content-center','container'=>'d-inline-flex','add_li_class'=>'nav-item'));

                ?>
                </div>

            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/scripts.js" type="text/javascript"></script>

<?php wp_footer(); ?>
</body>
</html>
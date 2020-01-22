<?php

require_once "functions/customizer.php";
require_once "functions/slider.php";
require_once "functions/widgets.php";
require_once "functions/acf.php";
require_once "functions/custom-functions.php";
require_once "functions/gutenberg.php";


//Initialize the update checker.
require 'theme-updates/theme-update-checker.php';
$dav_update_checker = new ThemeUpdateChecker(
    'dav',
    'https://template.alpenverein.de/updates/packages/theme-update.json'
);


/**
 * Set a bunch of template defaults at theme-activation
 *
 */
function setThemeDefaults()
{
    set_theme_mod('dav_frontpage4_count', 3);
    set_theme_mod('dav_frontpage5_count', 3);
    set_theme_mod('dav_frontpage7_count', 3);
    set_theme_mod('dav_frontpage4_image', false);
    set_theme_mod('dav_frontpage5_image', false);
    set_theme_mod('dav_frontpage7_image', false);
    set_theme_mod('dav_menuview', 'boxed');
    set_theme_mod('dav_menucolor', 'primary');
    set_theme_mod('dav_quicklink', 'true');
    set_theme_mod('dav_touren_counter', 10);

}
//add_action('load-themes.php', 'setThemeDefaults');



/** Set images-sizes */
//update size of Wordpress standard images
update_option( 'post-thumbnail_size_w', 250 );
update_option( 'post-thumbnail_size_h', 250 );
update_option( 'post-thumbnail_crop', 0 );

update_option( 'thumbnail_size_w', 500 );
update_option( 'thumbnail_size_h', 294 );
update_option( 'thumbnail_crop', 1 );

update_option( 'medium_size_w', 1140 );
update_option( 'medium_size_h', 650 );
update_option( 'medium_crop', 0 );

update_option( 'large_size_w', 1920 );
update_option( 'large_size_h', 1080 );
update_option( 'large_crop', 0 );


//add support for post thumbnails
add_theme_support( 'post-thumbnails', array( 'post', 'personas', 'touren', 'page' ) );


/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');




/** images bootstrap */
function bootstrap_responsive_images( $html ){
  $classes = 'img-fluid'; // separated by spaces, e.g. 'img image-link'

  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}

function bootstrap_responsive_thumbs( $attr ){
  remove_filter('wp_get_attachment_image_attributes','my_custom_image_attributes');
  // @fix: there is no attachement so there ist no ID either :-)
  //$image = wp_get_attachment_image_src( $attachment->ID, 'full' );
  //$attr['data-src'] = $image[0];
  //($attr['data-alt'] = $attachment->post_title;
  $attr['class'] .= '';
  return $attr;
}

function my_img_caption_shortcode_width($width, $atts, $content)
{
    return 0;
}

add_filter('img_caption_shortcode_width', 'my_img_caption_shortcode_width', 10, 3);
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'wp_get_attachment_image_attributes', 'bootstrap_responsive_thumbs', 10 );






/** ID Categories */
add_filter( 'manage_edit-link-categories_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_link_categories_custom_column', 'revealid_id_column_content', 5, 2 );
function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content($category, $column, $id ) {

    return $id;

}

$taxonomies = get_taxonomies();

foreach ( $taxonomies as $taxonomy ) {
	add_action( 'manage_edit-' . $taxonomy . '_columns', 'revealid_add_id_column', 5 );
	add_filter( 'manage_' . $taxonomy . '_custom_column', 'revealid_id_column_content', 5, 3 );
}


register_nav_menus( array(
	'primary' => __( 'Hauptmenü', 'DAV' ),
    'footer' => __( 'Footermenü', 'DAV' ),
) );


function add_additional_class_on_a($atts, $item, $args) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

function add_additional_class_on_li($classes, $item, $args) {
    if($args->add_li_class) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 4);


function register_dav_widgets() {
    register_widget('DAV_Nav');
    register_widget('DAV_Archive');
}

add_action('widgets_init', 'register_dav_widgets');


class DAV_Nav extends WP_Nav_Menu_Widget {
	
	
    public function widget( $args, $instance ) {
        // Get menu
        $nav_menu = ! empty( $instance['nav_menu'] ) ? wp_get_nav_menu_object( $instance['nav_menu'] ) : false;
 
        if ( ! $nav_menu ) {
            return;
        }
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
 
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
 
        echo $args['before_widget'];
 
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
 
        $nav_menu_args = array(
            'fallback_cb' => '',
            'menu'        => $nav_menu,
			'menu_class' => 'nav widget-nav',
			'container' => '',
			'add_li_class'=>'nav-item',
			'depth' => '1'
        );
 
        wp_nav_menu( apply_filters( 'widget_nav_menu_args', $nav_menu_args, $nav_menu, $args, $instance ) );
 
        echo $args['after_widget'];
    }
}

class DAV_Archive extends WP_Widget_Archives {

    public function widget( $args, $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Archives' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';

        echo $args['before_widget'];

        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        if ( $d ) {
            $dropdown_id = "{$this->id_base}-dropdown-{$this->number}";
            ?>
            <select class="form-control" id="<?php echo esc_attr( $dropdown_id ); ?>" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
                <?php
                /**
                 * Filters the arguments for the Archives widget drop-down.
                 *
                 * @since 2.8.0
                 * @since 4.9.0 Added the `$instance` parameter.
                 *
                 * @see wp_get_archives()
                 *
                 * @param array $args     An array of Archives widget drop-down arguments.
                 * @param array $instance Settings for the current Archives widget instance.
                 */
                $dropdown_args = apply_filters( 'widget_archives_dropdown_args', array(
                    'type'            => 'monthly',
                    'format'          => 'option',
                    'show_post_count' => $c
                ), $instance );

                switch ( $dropdown_args['type'] ) {
                    case 'yearly':
                        $label = __( 'Select Year' );
                        break;
                    case 'monthly':
                        $label = __( 'Select Month' );
                        break;
                    case 'daily':
                        $label = __( 'Select Day' );
                        break;
                    case 'weekly':
                        $label = __( 'Select Week' );
                        break;
                    default:
                        $label = __( 'Select Post' );
                        break;
                }
                ?>

                <option value=""><?php echo esc_attr( $label ); ?></option>
                <?php wp_get_archives( $dropdown_args ); ?>

            </select>
        <?php } else { ?>
            <ul>
                <?php
                /**
                 * Filters the arguments for the Archives widget.
                 *
                 * @since 2.8.0
                 * @since 4.9.0 Added the `$instance` parameter.
                 *
                 * @see wp_get_archives()
                 *
                 * @param array $args     An array of Archives option arguments.
                 * @param array $instance Array of settings for the current widget.
                 */
                wp_get_archives( apply_filters( 'widget_archives_args', array(
                    'type'            => 'monthly',
                    'show_post_count' => $c
                ), $instance ) );
                ?>
            </ul>
            <?php
        }

        echo $args['after_widget'];
    }

}


//add aditional classes to next and previous
function add_class_next_post_link($html){
    $html = str_replace('<a','<a class="btn btn-next"',$html);
    return $html;
}
add_filter('next_post_link','add_class_next_post_link',10,1);
function add_class_previous_post_link($html){
    $html = str_replace('<a','<a class="btn btn-prev"',$html);
    return $html;
}
add_filter('previous_post_link','add_class_previous_post_link',10,1);


// Excerpt Length
function excerpt_count_js(){

    get_theme_mod('dav_excerpt') ? $excerpt = get_theme_mod('dav_excerpt') : $excerpt = 160;

    if ('page' != get_post_type()) {

        echo '<script>jQuery(document).ready(function(){
    
    if ( $("#excerpt").length ) {
jQuery("#postexcerpt .handlediv").after("<div style=position:absolute;top:12px;right:34px;color:#666;><small>Auszuglänge: </small><span id=excerpt_counter></span><span style=font-weight:bold; padding-left:7px;> / '.$excerpt.'</span><small><span style=font-weight:bold; padding-left:7px;> Zeichen</span></small></div>");
     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
     jQuery("#excerpt").keyup( function() {
         if(jQuery(this).val().length > '.$excerpt.'){
            jQuery(this).val(jQuery(this).val().substr(0, '.$excerpt.'));
        }
     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
   });
} });</script>';
    }
}
//add_action( 'admin_head-post.php', 'excerpt_count_js');
//add_action( 'admin_head-post-new.php', 'excerpt_count_js');

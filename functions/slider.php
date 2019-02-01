<?php

//Custom Post Type definieren
add_action( 'init', 'create_post_type' );

function create_post_type() {
    register_post_type( 'slidermg',
        array(
            'labels' => array(
                'name' => __( 'Slider' ),
                'singular_name' => __( 'Slider' )),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'slidermg'),
            'supports' => array( 'title' )
        )
    );
}


// In Übersicht aller Seiten eine Spalte hinzufügen
function my_cpt_columns( $columns ) {
    $columns["slidermgid"] = "SliderID";
    return $columns;
}
add_filter('manage_edit-slidermg_columns', 'my_cpt_columns');


//In neuer Spalte "SliderID" die SeitenID der Seite abbilden
function my_cpt_column( $column_name, $post_id ) {
    if ( $column_name == 'slidermgid'){
        echo $post_id;
    }
}
add_action('manage_slidermg_posts_custom_column', 'my_cpt_column', 10, 2);


//In CustomPostType eigene Felder einfügen
function wpse_add_custom_meta_box_2() {
    add_meta_box(
        'custom_meta_box-slide',       // $id
        'Slides',                  // $title
        'show_custom_meta_box_slide',  // $callback
        'slidermg',                 // $page
        'normal',                  // $context
        'high'                     // $priority
    );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_2');


//Hook - bilder hochladen/einfügen etc.
function load_wp_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );


//Eingabefelder anbringen
function show_custom_meta_box_slide() {
    global $post;

    wp_nonce_field( 'case_study_bg_submit', 'case_study_bg_nonce' );
    $lacuna2_stored_meta = get_post_meta( $post->ID ); ?>


    <h3>Slide 1</h3>
    <p>Titel<br><input style="width:100%" type="text" id="slide-1-titel" name="slide-1-titel" value="<?php if ( isset ( $lacuna2_stored_meta['slide-1-titel'] ) ){ echo $lacuna2_stored_meta['slide-1-titel'][0]; } ?>" /></p>
    <p>Text<br><textarea style="width:100%" id="slide-1-txt" name="slide-1-txt"><?php if ( isset ( $lacuna2_stored_meta['slide-1-txt'] ) ){ echo $lacuna2_stored_meta['slide-1-txt'][0]; } ?></textarea></p>
    <p>Linkadresse<br><input style="width:100%" type="text" id="slide-1-link" name="slide-1-link" value="<?php if ( isset ( $lacuna2_stored_meta['slide-1-link'] ) ){ echo $lacuna2_stored_meta['slide-1-link'][0]; } ?>" /></p>
    <p>Linkbezeichnung<br><input style="width:100%" type="text" id="slide-1-linkname" name="slide-1-linkname" value="<?php if ( isset ( $lacuna2_stored_meta['slide-1-linkname'] ) ){ echo $lacuna2_stored_meta['slide-1-linkname'][0]; } ?>" /></p>
    <p>
        <img style="max-width:300px;height:auto;" id="meta-image-preview1" src="<?php if ( isset ( $lacuna2_stored_meta['meta-image1'] ) ){ echo $lacuna2_stored_meta['meta-image1'][0]; } ?>" />
        <br><input style="width:80%" type="text" name="meta-image1" id="meta-image1" class="meta_image1" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image1'] ) ){ echo $lacuna2_stored_meta['meta-image1'][0]; } ?>" />
        <input type="hidden" name="meta-image1-id" id="meta-image1-id" class="meta_image1-id" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image1-id'] ) ){ echo $lacuna2_stored_meta['meta-image1-id'][0]; } ?>" />
        <input type="button" id="meta-image-button1" class="button" value="Bild auswählen oder hochladen" />
    </p>
    <script>
        jQuery('#meta-image-button1').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;

            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#meta-image1').val(attachment.url);
                jQuery('#meta-image1-id').val(attachment.id);
                jQuery('#meta-image-preview1').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();
            return false;
        });
    </script>


    <h3 style="padding-top:30px;">Slide 2</h3>
    <p>Titel<br><input type="text" style="width:100%" id="slide-2-titel" name="slide-2-titel" value="<?php if ( isset ( $lacuna2_stored_meta['slide-2-titel'] ) ){ echo $lacuna2_stored_meta['slide-2-titel'][0]; } ?>" /></p>
    <p>Text<br><textarea id="slide-2-txt" style="width:100%" name="slide-2-txt"><?php if ( isset ( $lacuna2_stored_meta['slide-2-txt'] ) ){ echo $lacuna2_stored_meta['slide-2-txt'][0]; } ?></textarea></p>
    <p>Linkadresse<br><input style="width:100%" type="text" id="slide-2-link" name="slide-2-link" value="<?php if ( isset ( $lacuna2_stored_meta['slide-2-link'] ) ){ echo $lacuna2_stored_meta['slide-2-link'][0]; } ?>" /></p>
    <p>Linkbezeichnung<br><input style="width:100%" type="text" id="slide-2-linkname" name="slide-2-linkname" value="<?php if ( isset ( $lacuna2_stored_meta['slide-2-linkname'] ) ){ echo $lacuna2_stored_meta['slide-2-linkname'][0]; } ?>" /></p>
    <p>
        <img style="max-width:300px;height:auto;" id="meta-image-preview2" src="<?php if ( isset ( $lacuna2_stored_meta['meta-image2'] ) ){ echo $lacuna2_stored_meta['meta-image2'][0]; } ?>" />
        <br><input type="text" style="width:80%" name="meta-image2" id="meta-image2" class="meta_image2" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image2'] ) ){ echo $lacuna2_stored_meta['meta-image2'][0]; } ?>" />
        <input type="hidden" name="meta-image2-id" id="meta-image2-id" class="meta_image2-id" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image2-id'] ) ){ echo $lacuna2_stored_meta['meta-image2-id'][0]; } ?>" />
        <input type="button" id="meta-image-button2" class="button" value="Bild auswählen oder hochladen" />
    </p>
    <script>
        jQuery('#meta-image-button2').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;

            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#meta-image2').val(attachment.url);
                jQuery('#meta-image2-id').val(attachment.id);
                jQuery('#meta-image-preview2').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();
            return false;
        });
    </script>


    <h3 style="padding-top:30px;">Slide 3</h3>
    <p>Titel<br><input type="text" style="width:100%" id="slide-3-titel" name="slide-3-titel" value="<?php if ( isset ( $lacuna2_stored_meta['slide-3-titel'] ) ){ echo $lacuna2_stored_meta['slide-3-titel'][0]; } ?>" /></p>
    <p>Text<br><textarea style="width:100%" id="slide-3-txt" name="slide-3-txt"><?php if ( isset ( $lacuna2_stored_meta['slide-3-txt'] ) ){ echo $lacuna2_stored_meta['slide-3-txt'][0]; } ?></textarea></p>
    <p>Linkadresse<br><input style="width:100%" type="text" id="slide-3-link" name="slide-3-link" value="<?php if ( isset ( $lacuna2_stored_meta['slide-3-link'] ) ){ echo $lacuna2_stored_meta['slide-3-link'][0]; } ?>" /></p>
    <p>Linkbezeichnung<br><input style="width:100%" type="text" id="slide-3-linkname" name="slide-3-linkname" value="<?php if ( isset ( $lacuna2_stored_meta['slide-3-linkname'] ) ){ echo $lacuna2_stored_meta['slide-3-linkname'][0]; } ?>" /></p>
    <p>
        <img style="max-width:300px;height:auto;" id="meta-image-preview3" src="<?php if ( isset ( $lacuna2_stored_meta['meta-image3'] ) ){ echo $lacuna2_stored_meta['meta-image3'][0]; } ?>" />
        <br><input type="text" style="width:80%" name="meta-image3" id="meta-image3" class="meta_image3" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image3'] ) ){ echo $lacuna2_stored_meta['meta-image3'][0]; } ?>" />
        <input type="hidden" name="meta-image3-id" id="meta-image3-id" class="meta_image3-id" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image3-id'] ) ){ echo $lacuna2_stored_meta['meta-image3-id'][0]; } ?>" />
        <input type="button" id="meta-image-button3" class="button" value="Bild auswählen oder hochladen" />
    </p>
    <script>
        jQuery('#meta-image-button3').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;

            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#meta-image3').val(attachment.url);
                jQuery('#meta-image3-id').val(attachment.id);
                jQuery('#meta-image-preview3').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();
            return false;
        });
    </script>


    <h3 style="padding-top:30px;">Slide 4</h3>
    <p>Titel<br><input type="text" style="width:100%" id="slide-4-titel" name="slide-4-titel" value="<?php if ( isset ( $lacuna2_stored_meta['slide-4-titel'] ) ){ echo $lacuna2_stored_meta['slide-4-titel'][0]; } ?>" /></p>
    <p>Text<br><textarea style="width:100%" id="slide-4-txt" name="slide-4-txt"><?php if ( isset ( $lacuna2_stored_meta['slide-4-txt'] ) ){ echo $lacuna2_stored_meta['slide-4-txt'][0]; } ?></textarea></p>
    <p>Linkadresse<br><input style="width:100%" type="text" id="slide-4-link" name="slide-4-link" value="<?php if ( isset ( $lacuna2_stored_meta['slide-4-link'] ) ){ echo $lacuna2_stored_meta['slide-4-link'][0]; } ?>" /></p>
    <p>Linkbezeichnung<br><input style="width:100%" type="text" id="slide-4-linkname" name="slide-4-linkname" value="<?php if ( isset ( $lacuna2_stored_meta['slide-4-linkname'] ) ){ echo $lacuna2_stored_meta['slide-4-linkname'][0]; } ?>" /></p>
    <p>
        <img style="max-width:300px;height:auto;" id="meta-image-preview4" src="<?php if ( isset ( $lacuna2_stored_meta['meta-image4'] ) ){ echo $lacuna2_stored_meta['meta-image4'][0]; } ?>" />
        <br><input type="text" style="width:80%" name="meta-image4" id="meta-image4" class="meta_image4" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image4'] ) ){ echo $lacuna2_stored_meta['meta-image4'][0]; } ?>" />
        <input type="hidden" name="meta-image4-id" id="meta-image4-id" class="meta_image4-id" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image4-id'] ) ){ echo $lacuna2_stored_meta['meta-image4-id'][0]; } ?>" />
        <input type="button" id="meta-image-button4" class="button" value="Bild auswählen oder hochladen" />
    </p>
    <script>
        jQuery('#meta-image-button4').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;

            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#meta-image4').val(attachment.url);
                jQuery('#meta-image4-id').val(attachment.id);
                jQuery('#meta-image-preview4').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();
            return false;
        });
    </script>


    <h3 style="padding-top:30px;">Slide 5</h3>
    <p>Titel<br><input type="text" style="width:100%" id="slide-5-titel" name="slide-5-titel" value="<?php if ( isset ( $lacuna2_stored_meta['slide-5-titel'] ) ){ echo $lacuna2_stored_meta['slide-5-titel'][0]; } ?>" /></p>
    <p>Text<br><textarea style="width:100%" id="slide-5-txt" name="slide-5-txt"><?php if ( isset ( $lacuna2_stored_meta['slide-5-txt'] ) ){ echo $lacuna2_stored_meta['slide-5-txt'][0]; } ?></textarea></p>
    <p>Linkadresse<br><input style="width:100%" type="text" id="slide-5-link" name="slide-5-link" value="<?php if ( isset ( $lacuna2_stored_meta['slide-5-link'] ) ){ echo $lacuna2_stored_meta['slide-5-link'][0]; } ?>" /></p>
    <p>Linkbezeichnung<br><input style="width:100%" type="text" id="slide-5-linkname" name="slide-5-linkname" value="<?php if ( isset ( $lacuna2_stored_meta['slide-5-linkname'] ) ){ echo $lacuna2_stored_meta['slide-5-linkname'][0]; } ?>" /></p>
    <p>
        <img style="max-width:300px;height:auto;" id="meta-image-preview5" src="<?php if ( isset ( $lacuna2_stored_meta['meta-image5'] ) ){ echo $lacuna2_stored_meta['meta-image5'][0]; } ?>" />
        <br><input type="text" style="width:80%" name="meta-image5" id="meta-image5" class="meta_image5" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image5'] ) ){ echo $lacuna2_stored_meta['meta-image5'][0]; } ?>" />
        <input type="hidden" name="meta-image5-id" id="meta-image5-id" class="meta_image5-id" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image5-id'] ) ){ echo $lacuna2_stored_meta['meta-image5-id'][0]; } ?>" />
        <input type="button" id="meta-image-button5" class="button" value="Bild auswählen oder hochladen" />
    </p>
    <script>
        jQuery('#meta-image-button5').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;

            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#meta-image5').val(attachment.url);
                jQuery('#meta-image5-id').val(attachment.id);
                jQuery('#meta-image-preview5').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();
            return false;
        });
    </script>


    <h3 style="padding-top:30px;">Slide 6</h3>
    <p>Titel<br><input type="text" style="width:100%" id="slide-6-titel" name="slide-6-titel" value="<?php if ( isset ( $lacuna2_stored_meta['slide-6-titel'] ) ){ echo $lacuna2_stored_meta['slide-6-titel'][0]; } ?>" /></p>
    <p>Text<br><textarea style="width:100%" id="slide-6-txt" name="slide-6-txt"><?php if ( isset ( $lacuna2_stored_meta['slide-6-txt'] ) ){ echo $lacuna2_stored_meta['slide-6-txt'][0]; } ?></textarea></p>
    <p>Linkadresse<br><input style="width:100%" type="text" id="slide-6-link" name="slide-6-link" value="<?php if ( isset ( $lacuna2_stored_meta['slide-6-link'] ) ){ echo $lacuna2_stored_meta['slide-6-link'][0]; } ?>" /></p>
    <p>Linkbezeichnung<br><input style="width:100%" type="text" id="slide-6-linkname" name="slide-6-linkname" value="<?php if ( isset ( $lacuna2_stored_meta['slide-6-linkname'] ) ){ echo $lacuna2_stored_meta['slide-6-linkname'][0]; } ?>" /></p>
    <p>
        <img style="max-width:300px;height:auto;" id="meta-image-preview6" src="<?php if ( isset ( $lacuna2_stored_meta['meta-image6'] ) ){ echo $lacuna2_stored_meta['meta-image6'][0]; } ?>" />
        <br><input type="text" style="width:80%" name="meta-image6" id="meta-image6" class="meta_image6" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image6'] ) ){ echo $lacuna2_stored_meta['meta-image6'][0]; } ?>" />
        <input type="hidden" name="meta-image6-id" id="meta-image6-id" class="meta_image6-id" value="<?php if ( isset ( $lacuna2_stored_meta['meta-image6-id'] ) ){ echo $lacuna2_stored_meta['meta-image6-id'][0]; } ?>" />
        <input type="button" id="meta-image-button6" class="button" value="Bild auswählen oder hochladen" />
    </p>
    <script>
        jQuery('#meta-image-button6').click(function() {
            var send_attachment_bkp = wp.media.editor.send.attachment;

            wp.media.editor.send.attachment = function(props, attachment) {
                jQuery('#meta-image6').val(attachment.url);
                jQuery('#meta-image6-id').val(attachment.id);
                jQuery('#meta-image-preview6').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();
            return false;
        });
    </script>
    <?php

}

//Eingaben speichern
function wpse_save_meta_fields( $post_id ) {

    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'case_study_bg_nonce' ] ) && wp_verify_nonce( $_POST[ 'case_study_bg_nonce' ], 'case_study_bg_submit' ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce  ) {
        return;
    }


    /* Bild 1 speichern */
    if( isset( $_POST[ 'meta-image1' ] ) ) {
        update_post_meta( $post_id, 'meta-image1', $_POST[ 'meta-image1' ] );
    }
    if( isset( $_POST[ 'meta-image1-id' ] ) ) {
        update_post_meta( $post_id, 'meta-image1-id', $_POST[ 'meta-image1-id' ] );
    }

    /* Titel 1 speichern */
    if( isset( $_POST[ 'slide-1-titel' ] ) ) {
        update_post_meta( $post_id, 'slide-1-titel', $_POST[ 'slide-1-titel' ] );
    }

    /* Text 1 speichern */
    if( isset( $_POST[ 'slide-1-txt' ] ) ) {
        update_post_meta( $post_id, 'slide-1-txt', $_POST[ 'slide-1-txt' ] );
    }

    /* Linkadresse 1 speichern */
    if( isset( $_POST[ 'slide-1-link' ] ) ) {
        update_post_meta( $post_id, 'slide-1-link', $_POST[ 'slide-1-link' ] );
    }
    /* Linkname 1 speichern */
    if( isset( $_POST[ 'slide-1-linkname' ] ) ) {
        update_post_meta( $post_id, 'slide-1-linkname', $_POST[ 'slide-1-linkname' ] );
    }

    /* Bild 2 speichern */
    if( isset( $_POST[ 'meta-image2' ] ) ) {
        update_post_meta( $post_id, 'meta-image2', $_POST[ 'meta-image2' ] );
    }
    if( isset( $_POST[ 'meta-image2-id' ] ) ) {
        update_post_meta( $post_id, 'meta-image2-id', $_POST[ 'meta-image2-id' ] );
    }

    /* Titel 2 speichern */
    if( isset( $_POST[ 'slide-2-titel' ] ) ) {
        update_post_meta( $post_id, 'slide-2-titel', $_POST[ 'slide-2-titel' ] );
    }

    /* Text 2 speichern */
    if( isset( $_POST[ 'slide-2-txt' ] ) ) {
        update_post_meta( $post_id, 'slide-2-txt', $_POST[ 'slide-2-txt' ] );
    }

    /* Linkadresse 2 speichern */
    if( isset( $_POST[ 'slide-2-link' ] ) ) {
        update_post_meta( $post_id, 'slide-2-link', $_POST[ 'slide-2-link' ] );
    }
    /* Linkname 2 speichern */
    if( isset( $_POST[ 'slide-2-linkname' ] ) ) {
        update_post_meta( $post_id, 'slide-2-linkname', $_POST[ 'slide-2-linkname' ] );
    }

    /* Bild 3 speichern */
    if( isset( $_POST[ 'meta-image3' ] ) ) {
        update_post_meta( $post_id, 'meta-image3', $_POST[ 'meta-image3' ] );
    }
    if( isset( $_POST[ 'meta-image3-id' ] ) ) {
        update_post_meta( $post_id, 'meta-image3-id', $_POST[ 'meta-image3-id' ] );
    }

    /* Titel 3 speichern */
    if( isset( $_POST[ 'slide-3-titel' ] ) ) {
        update_post_meta( $post_id, 'slide-3-titel', $_POST[ 'slide-3-titel' ] );
    }

    /* Text 3 speichern */
    if( isset( $_POST[ 'slide-3-txt' ] ) ) {
        update_post_meta( $post_id, 'slide-3-txt', $_POST[ 'slide-3-txt' ] );
    }

    /* Linkadresse 3 speichern */
    if( isset( $_POST[ 'slide-3-link' ] ) ) {
        update_post_meta( $post_id, 'slide-3-link', $_POST[ 'slide-3-link' ] );
    }
    /* Linkname 3 speichern */
    if( isset( $_POST[ 'slide-3-linkname' ] ) ) {
        update_post_meta( $post_id, 'slide-3-linkname', $_POST[ 'slide-3-linkname' ] );
    }

    /* Bild 4 speichern */
    if( isset( $_POST[ 'meta-image4' ] ) ) {
        update_post_meta( $post_id, 'meta-image4', $_POST[ 'meta-image4' ] );
    }
    if( isset( $_POST[ 'meta-image4-id' ] ) ) {
        update_post_meta( $post_id, 'meta-image4-id', $_POST[ 'meta-image4-id' ] );
    }

    /* Titel 4 speichern */
    if( isset( $_POST[ 'slide-4-titel' ] ) ) {
        update_post_meta( $post_id, 'slide-4-titel', $_POST[ 'slide-4-titel' ] );
    }

    /* Text 4 speichern */
    if( isset( $_POST[ 'slide-4-txt' ] ) ) {
        update_post_meta( $post_id, 'slide-4-txt', $_POST[ 'slide-4-txt' ] );
    }

    /* Linkadresse 4 speichern */
    if( isset( $_POST[ 'slide-4-link' ] ) ) {
        update_post_meta( $post_id, 'slide-4-link', $_POST[ 'slide-4-link' ] );
    }
    /* Linkname 4 speichern */
    if( isset( $_POST[ 'slide-4-linkname' ] ) ) {
        update_post_meta( $post_id, 'slide-4-linkname', $_POST[ 'slide-4-linkname' ] );
    }

    /* Bild 5 speichern */
    if( isset( $_POST[ 'meta-image5' ] ) ) {
        update_post_meta( $post_id, 'meta-image5', $_POST[ 'meta-image5' ] );
    }
    if( isset( $_POST[ 'meta-image5-id' ] ) ) {
        update_post_meta( $post_id, 'meta-image5-id', $_POST[ 'meta-image5-id' ] );
    }

    /* Titel 5 speichern */
    if( isset( $_POST[ 'slide-5-titel' ] ) ) {
        update_post_meta( $post_id, 'slide-5-titel', $_POST[ 'slide-5-titel' ] );
    }

    /* Text 5 speichern */
    if( isset( $_POST[ 'slide-5-txt' ] ) ) {
        update_post_meta( $post_id, 'slide-5-txt', $_POST[ 'slide-5-txt' ] );
    }

    /* Linkadresse 5 speichern */
    if( isset( $_POST[ 'slide-5-link' ] ) ) {
        update_post_meta( $post_id, 'slide-5-link', $_POST[ 'slide-5-link' ] );
    }
    /* Linkname 5 speichern */
    if( isset( $_POST[ 'slide-5-linkname' ] ) ) {
        update_post_meta( $post_id, 'slide-5-linkname', $_POST[ 'slide-5-linkname' ] );
    }

    /* Bild 6 speichern */
    if( isset( $_POST[ 'meta-image6' ] ) ) {
        update_post_meta( $post_id, 'meta-image6', $_POST[ 'meta-image6' ] );
    }
    if( isset( $_POST[ 'meta-image6-id' ] ) ) {
        update_post_meta( $post_id, 'meta-image6-id', $_POST[ 'meta-image6-id' ] );
    }

    /* Titel 6 speichern */
    if( isset( $_POST[ 'slide-6-titel' ] ) ) {
        update_post_meta( $post_id, 'slide-6-titel', $_POST[ 'slide-6-titel' ] );
    }

    /* Text 6 speichern */
    if( isset( $_POST[ 'slide-6-txt' ] ) ) {
        update_post_meta( $post_id, 'slide-6-txt', $_POST[ 'slide-6-txt' ] );
    }

    /* Linkadresse 6 speichern */
    if( isset( $_POST[ 'slide-6-link' ] ) ) {
        update_post_meta( $post_id, 'slide-6-link', $_POST[ 'slide-6-link' ] );
    }
    /* Linkname 6 speichern */
    if( isset( $_POST[ 'slide-6-linkname' ] ) ) {
        update_post_meta( $post_id, 'slide-6-linkname', $_POST[ 'slide-6-linkname' ] );
    }

}
add_action( 'save_post', 'wpse_save_meta_fields' );

/*ENDE Custom Post Type*/

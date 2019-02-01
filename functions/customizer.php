<?php
/**
 * Generate the new entries in the Wordpress-Customizer
 *
 * @author Stephan Mitteldorf, PULS13
 */


/**
 * Generate the panel for the frontpage
 */
function dav_frontpage_customize_register( $wp_customize ) {

    $wp_customize->add_panel( 'dav_frontpage', array(
        'priority'       => 50,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Homepage-Aufbau', 'dav'),
        'description'    => __('Einstellmöglichkeiten für die Startseite. Sie können diese individuell an die Bedürfnisse Ihrer Sektion anpassen. <br>Mehr Informationen finden sie in den <a href="https://template.alpenverein.de/index.php/wissen/die-startseite-anpassen/" target="_blank">FAQ zur Website</a>.', 'dav'),
    ) );

    // Aufmacherbild
    $wp_customize->add_section( 'dav_startimage_section' , array(
        'title'       => __( 'Aufmacherbild', 'dav_startimage' ),
        'priority'    => 20,
        'description' => 'Soll vor dem eigentlichen Inhalt ein schönes Aufmacherbild angezeigt werden, so kann dieses hier festgelegt werden. Das Aufmacherbild kann Fullscreen oder "Boxed" sein. Im Fullscreen wird zusätzlich die Navigation fixiert. <br><strong>Hinweis:</strong> Es ist nicht ratsam, Aufmacherbild und Slider gemeinsam anzulegen!',
        'panel' => 'dav_frontpage'
    ) );

    $wp_customize->add_section( 'dav_frontpage1_section' , array(
        'title'       => __( 'Sektor 1 – Content', 'dav_custom_widgets' ),
        'priority'    => 30,
        'description' => 'Der Content-Sektor kann den Inhalt einer Seite  wiedergeben. Dazu ist es notwendig, als Startseite eine Seite anzulegen. Standard sind die letzten Beiträge.',
        'panel' => 'dav_frontpage',
    ));
    $wp_customize->add_section( 'dav_frontpage2_section' , array(
        'title'       => __( 'Sektor 2 – Widgets 1', 'dav_custom_widgets' ),
        'priority'    => 40,
        'description' => 'Der Widget-Sektor umfasst sowohl die Individual-Widgets als auch die DAV-Widgets.',
        'panel' => 'dav_frontpage',
    ));
    $wp_customize->add_section( 'dav_frontpage3_section' , array(
        'title'       => __( 'Sektor 3 – Widgets 2', 'dav_custom_widgets' ),
        'priority'    => 50,
        'description' => 'Der Widget-Sektor umfasst sowohl die Individual-Widgets als auch die DAV-Widgets.',
        'panel' => 'dav_frontpage',
    ));
    $wp_customize->add_section( 'dav_frontpage4_section' , array(
        'title'       => __( 'Sektor 4 - News', 'dav_custom_widgets' ),
        'priority'    => 60,
        'description' => 'In Sektor 4 können News angezeigt werden. Legen Sie Layout, Menge und Kategorien fest. Bei Bedarf können auch Bilder-Beiträge ausgewählt werden.',
        'panel' => 'dav_frontpage',
    ));
    $wp_customize->add_section( 'dav_frontpage5_section' , array(
        'title'       => __( 'Sektor 5 - News', 'dav_custom_widgets' ),
        'priority'    => 70,
        'description' => 'In Sektor 5 können News angezeigt werden. Legen Sie Layout, Menge und Kategorien fest. Bei Bedarf können auch Bilder-Beiträge ausgewählt werden.',
        'panel' => 'dav_frontpage',
    ));
    $wp_customize->add_section( 'dav_frontpage6_section' , array(
        'title'       => __( 'Sektor 6 – Widgets 3', 'dav_custom_widgets' ),
        'priority'    => 80,
        'description' => 'Der Widget-Sektor umfasst sowohl die Individual-Widgets als auch die DAV-Widgets.',
        'panel' => 'dav_frontpage',
    ));
    $wp_customize->add_section( 'dav_frontpage7_section' , array(
        'title'       => __( 'Sektor 7 - News', 'dav_custom_widgets' ),
        'priority'    => 90,
        'description' => 'In Sektor 7 können News angezeigt werden. Legen Sie Layout, Menge und Kategorien fest. Bei Bedarf können auch Bilder-Beiträge ausgewählt werden.',
        'panel' => 'dav_frontpage',
    ));

    $wp_customize->add_setting( 'dav_startimage', array(
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_setting( 'dav_startimage_radio', array(
        'default' => false
    ) );

    $wp_customize->add_section( 'dav_slider', array(
        'title'          => __( 'Slider Startseite', 'dav' ),
        'priority'      => 10,
        'description'   => 'Auf der Startseite kann ein Slider angezeigt werden. Dazu muss die ID des Sliders in das hier angezeigte Feld eingetragen werden. Die ID steht in der Slider-Übersicht. Zusätzlich kann ausgewählt werden, ob der Slider Fullscreen (Bildschirmbreite) oder nicht ist.',
        'panel' => 'dav_frontpage'
    ) );
    $wp_customize->add_setting( 'dav_slider_time', array(
        'default'        => '3000'
    ) );
    $wp_customize->add_setting( 'dav_slider_ID', array(
        'default'        => ''
    ) );
    $wp_customize->add_setting( 'dav_slider_fullscreen', array(
        'default'        => 'boxed'
    ) );
    $wp_customize->add_setting( 'dav_slider_visibility_check', array(
        'default'        => 'false'
    ));

    $wp_customize->add_setting( 'dav_frontpage1_visible', array('default' => false,));
    $wp_customize->add_setting( 'dav_frontpage2_visible', array('default' => false,));
    $wp_customize->add_setting( 'dav_frontpage3_visible', array('default' => false,));
    $wp_customize->add_setting( 'dav_frontpage4_visible', array('default' => false,));
    $wp_customize->add_setting( 'dav_frontpage5_visible', array('default' => false,));
    $wp_customize->add_setting( 'dav_frontpage6_visible', array('default' => false,));
    $wp_customize->add_setting( 'dav_frontpage7_visible', array('default' => false,));

    $wp_customize->add_setting( 'dav_frontpage2_text', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage3_text', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage4_text', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage5_text', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage6_text', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage7_text', array('default' => '',));

    $wp_customize->add_setting( 'dav_frontpage4_image', array('default' => 'false',));
    $wp_customize->add_setting( 'dav_frontpage5_image', array('default' => 'false',));
    $wp_customize->add_setting( 'dav_frontpage7_image', array('default' => 'false',));

    $wp_customize->add_setting( 'dav_frontpage4_count', array('default' => '6',));
    $wp_customize->add_setting( 'dav_frontpage5_count', array('default' => '6',));
    $wp_customize->add_setting( 'dav_frontpage7_count', array('default' => '6',));

    $wp_customize->add_setting( 'dav_frontpage4_col', array('default' => '3',));
    $wp_customize->add_setting( 'dav_frontpage5_col', array('default' => '3',));
    $wp_customize->add_setting( 'dav_frontpage7_col', array('default' => '3',));

    $wp_customize->add_setting( 'dav_frontpage4_cat-in', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage5_cat-in', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage7_cat-in', array('default' => '',));

    $wp_customize->add_setting( 'dav_frontpage4_cat-out', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage5_cat-out', array('default' => '',));
    $wp_customize->add_setting( 'dav_frontpage7_cat-out', array('default' => '',));


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage1_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage1_section',
        'settings'       => 'dav_frontpage1_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage2_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage2_section',
        'settings'       => 'dav_frontpage2_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( 'dav_frontpage2_text', array(
        'label' => __( 'Überschrift', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird keine Überschrift angezeigt.',
        'section' => 'dav_frontpage2_section',
        'type' => 'text',
        'settings' => 'dav_frontpage2_text'
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage3_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage3_section',
        'settings'       => 'dav_frontpage3_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( 'dav_frontpage3_text', array(
        'label' => __( 'Überschrift', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird keine Überschrift angezeigt.',
        'section' => 'dav_frontpage3_section',
        'type' => 'text',
        'settings' => 'dav_frontpage3_text'
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage4_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen.', 'dav' ),
        'section'        => 'dav_frontpage4_section',
        'settings'       => 'dav_frontpage4_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( 'dav_frontpage4_text', array(
        'label' => __( 'Überschrift', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird keine Überschrift angezeigt.',
        'section' => 'dav_frontpage4_section',
        'type' => 'text',
        'settings' => 'dav_frontpage4_text'
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage4_image', array(
        'label'          => __( 'Sollen die News mit Bild angezeigt werden?', 'dav' ),
        'section'        => 'dav_frontpage4_section',
        'settings'       => 'dav_frontpage4_image',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage4_count', array(
        'label'          => __( 'Anzahl News', 'dav' ),
        'section'        => 'dav_frontpage4_section',
        'settings'       => 'dav_frontpage4_count',
        'type'           => 'select',
        'choices'        => array(
            '2' => __('2'),
            '3' => __('3'),
            '4' => __('4'),
            '6' => __('6'),
            '8' => __('8'),
            '9' => __('9')
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage4_col', array(
        'label'          => __( 'News pro Zeile', 'dav' ),
        'section'        => 'dav_frontpage4_section',
        'settings'       => 'dav_frontpage4_col',
        'type'           => 'select',
        'choices'        => array(
            '2' => __('2'),
            '3' => __('3')
        )
    )));
    $wp_customize->add_control( 'dav_frontpage4_cat-in', array(
        'label' => __( 'Kategorien einschließen', 'dav' ),
        'description' => 'Wenn das Feld leer ist, werden alle Kategorien einegschlossen. Bitte die ID der Kategorien angeben.',
        'section' => 'dav_frontpage4_section',
        'type' => 'text',
        'settings' => 'dav_frontpage4_cat-in'
    ));
    $wp_customize->add_control( 'dav_frontpage4_cat-out', array(
        'label' => __( 'Kategorien ausschließen', 'dav' ),
        'description' => 'Eingegebene Kategorien werden nicht angezeigt. Bitte die ID der Kategorien angeben.',
        'section' => 'dav_frontpage4_section',
        'type' => 'text',
        'settings' => 'dav_frontpage4_cat-out'
    ));


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage5_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage5_section',
        'settings'       => 'dav_frontpage5_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( 'dav_frontpage5_text', array(
        'label' => __( 'Überschrift', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird keine Überschrift angezeigt.',
        'section' => 'dav_frontpage5_section',
        'type' => 'text',
        'settings' => 'dav_frontpage5_text'
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage5_image', array(
        'label'          => __( 'Sollen die News mit Bild angezeigt werden?.Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage5_section',
        'settings'       => 'dav_frontpage5_image',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage5_count', array(
        'label'          => __( 'Anzahl News', 'dav' ),
        'section'        => 'dav_frontpage5_section',
        'settings'       => 'dav_frontpage5_count',
        'type'           => 'select',
        'choices'        => array(
            '2' => __('2'),
            '3' => __('3'),
            '4' => __('4'),
            '6' => __('6'),
            '8' => __('8'),
            '9' => __('9')
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage5_col', array(
        'label'          => __( 'News pro Zeile', 'dav' ),
        'section'        => 'dav_frontpage5_section',
        'settings'       => 'dav_frontpage5_col',
        'type'           => 'select',
        'choices'        => array(
            '2' => __('2'),
            '3' => __('3')
        )
    )));
    $wp_customize->add_control( 'dav_frontpage5_cat-in', array(
        'label' => __( 'Kategorien einschließen', 'dav' ),
        'description' => 'Wenn das Feld leer ist, werden alle Kategorien einegschlossen. Bitte die ID der Kategorien angeben.',
        'section' => 'dav_frontpage5_section',
        'type' => 'text',
        'settings' => 'dav_frontpage5_cat-in'
    ));
    $wp_customize->add_control( 'dav_frontpage5_cat-out', array(
        'label' => __( 'Kategorien ausschließen', 'dav' ),
        'description' => 'Eingegebene Kategorien werden nicht angezeigt. Bitte die ID der Kategorien angeben.',
        'section' => 'dav_frontpage5_section',
        'type' => 'text',
        'settings' => 'dav_frontpage5_cat-out'
    ));


    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage6_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage6_section',
        'settings'       => 'dav_frontpage6_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( 'dav_frontpage6_text', array(
        'label' => __( 'Überschrift', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird keine Überschrift angezeigt.',
        'section' => 'dav_frontpage6_section',
        'type' => 'text',
        'settings' => 'dav_frontpage6_text'
    ));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage7_visible', array(
        'label'          => __( 'Sichtbarkeit des Sektors festlegen', 'dav' ),
        'section'        => 'dav_frontpage7_section',
        'settings'       => 'dav_frontpage7_visible',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( 'dav_frontpage7_text', array(
        'label' => __( 'Überschrift', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird keine Überschrift angezeigt.',
        'section' => 'dav_frontpage7_section',
        'type' => 'text',
        'settings' => 'dav_frontpage7_text'
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage7_image', array(
        'label'          => __( 'Sollen die News mit Bild angezeigt werden?', 'dav' ),
        'section'        => 'dav_frontpage7_section',
        'settings'       => 'dav_frontpage7_image',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            'true'   => __( 'Anzeigen' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage7_count', array(
        'label'          => __( 'Anzahl News', 'dav' ),
        'section'        => 'dav_frontpage7_section',
        'settings'       => 'dav_frontpage7_count',
        'type'           => 'select',
        'choices'        => array(
            '2' => __('2'),
            '3' => __('3'),
            '4' => __('4'),
            '6' => __('6'),
            '8' => __('8'),
            '9' => __('9')
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_frontpage7_col', array(
        'label'          => __( 'News pro Zeile', 'dav' ),
        'section'        => 'dav_frontpage7_section',
        'settings'       => 'dav_frontpage7_col',
        'type'           => 'select',
        'choices'        => array(
            '2' => __('2'),
            '3' => __('3')
        )
    )));
    $wp_customize->add_control( 'dav_frontpage7_cat-in', array(
        'label' => __( 'Kategorien einschließen', 'dav' ),
        'description' => 'Wenn das Feld leer ist, werden alle Kategorien einegschlossen. Bitte die ID der Kategorien angeben.',
        'section' => 'dav_frontpage7_section',
        'type' => 'text',
        'settings' => 'dav_frontpage7_cat-in'
    ));
    $wp_customize->add_control( 'dav_frontpage7_cat-out', array(
        'label' => __( 'Kategorien ausschließen', 'dav' ),
        'description' => 'Eingegebene Kategorien werden nicht angezeigt. Bitte die ID der Kategorien angeben.',
        'section' => 'dav_frontpage7_section',
        'type' => 'text',
        'settings' => 'dav_frontpage7_cat-out'
    ));


    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dav_startimage', array(
        'label'    => __( 'Aufmacherbild', 'dav_startimage' ),
        'section'  => 'dav_startimage_section',
        'settings' => 'dav_startimage',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_startimage_radio', array(
        'label'          => __( 'Fullscreen oder Boxed', 'dav' ),
        'description'   => __('Das Aufmacherbild kann Bildschirmfüllend (Fullscreen) oder in Inhaltsbreite (Boxed) dargestellt werden.', 'dav'),
        'section'        => 'dav_startimage_section',
        'settings'       => 'dav_startimage_radio',
        'type'           => 'radio',
        'choices'        => array(
            'fullscreen'   => __( 'Fullscreen/Vollbild' ),
            'boxed'  => __( 'Boxed' )
        )
    )));
    //Slider für Startseite

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_slider_fullscreen', array(
        'label'          => __( 'Fullscreen oder Boxed', 'dav' ),
        'description'   => __('Der Slider kann Bildschirmfüllend (Fullscreen) oder in Inhaltsbreite (Boxed) dargestellt werden.', 'dav'),
        'section'        => 'dav_slider',
        'settings'       => 'dav_slider_fullscreen',
        'type'           => 'radio',
        'choices'        => array(
            'true'  => __( 'Fullscreen/Vollbild' ),
            'false'   => __( 'Boxed' )
        )
    )));
    $wp_customize->add_control( 'dav_slider_ID', array(
        'label' => __( 'ID des Sliders', 'dav' ),
        'section' => 'dav_slider',
        'type' => 'text',
        'settings' => 'dav_slider_ID'
    ));
    $wp_customize->add_control( 'dav_slider_time', array(
        'label' => __( 'Anzeigezeit in Millisekunden/Slide', 'dav' ),
        'section' => 'dav_slider',
        'type' => 'text',
        'settings' => 'dav_slider_time'
    ));
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'dav_slider_visibility_check',
            array(
                'label'     => __('Slider verwenden', 'dav'),
                'section'   => 'dav_slider',
                'settings'  => 'dav_slider_visibility_check',
                'type'      => 'checkbox',
            )
        )
    );

}


/**
 * Generate the panel for the service-widgets from alpenverein.de
 */
function dav_davwidgets_customize_register( $wp_customize) {

    $wp_customize->add_panel( 'dav_imagewidgets_panel', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('DAV Service-Widgets', 'dav'),
        'description'    => __('DAV Service-Widgets sind kleine Bilder-Widgets, versehen mit einem Link auf das entsprechende Angebot des DAV. Sie können diese auf Wunsch auf Ihrer Startseite einsetzen.<br>Mehr Informationen finden sie in den <a href="https://template.alpenverein.de/index.php/wissen/dav-service-widgets/" target="_blank">FAQ zur Website</a>.', 'dav'),
    ) );
    $wp_customize->add_section( 'dav_imagewidgets9_section' , array(
        'title'       => __( 'Widget Lawinenlagebericht', 'dav_imagewidgets9_section' ),
        'priority'    => 10,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets1_section' , array(
        'title'       => __( 'Widget Bergwetter', 'dav_imagewidgets1_section' ),
        'priority'    => 20,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets2_section' , array(
        'title'       => __( 'Widget Bergbericht', 'dav_imagewidgets1_section' ),
        'priority'    => 30,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets3_section' , array(
        'title'       => __( 'Widget Tour der Woche', 'dav_imagewidgets1_section' ),
        'priority'    => 40,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets4_section' , array(
        'title'       => __( 'Widget Alpenvereinaktiv', 'dav_imagewidgets1_section' ),
        'priority'    => 50,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets5_section' , array(
        'title'       => __( 'Widget Hüttensuche', 'dav_imagewidgets1_section' ),
        'priority'    => 60,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets6_section' , array(
        'title'       => __( 'Widget Hüttentest', 'dav_imagewidgets1_section' ),
        'priority'    => 70,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets7_section' , array(
        'title'       => __( 'Widget Panorama', 'dav_imagewidgets1_section' ),
        'priority'    => 80,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));
    $wp_customize->add_section( 'dav_imagewidgets8_section' , array(
        'title'       => __( 'Widget Kletterhallensuche', 'dav_imagewidgets1_section' ),
        'priority'    => 90,
        'description' => 'Die Alpenvereinswidgets sind vorkonfigurierte Widgets, die einer Startseite hinzugefügt werden können. Auf diesem Panel kann festgelegt werden, welche Widgets in welchem Sektor angezeigt werden können.',
        'panel' => 'dav_imagewidgets_panel',
    ));

    $wp_customize->add_setting( 'dav_widget_bergwetter_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_huettensuche_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_tour_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_ava_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_bergbericht_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_huetten_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_hallen_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_panorama_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_widget_lawinenbericht_sector', array('default' => false,));

    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_lawinenbericht_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets9_section',
        'settings'       => 'dav_widget_lawinenbericht_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_bergwetter_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets1_section',
        'settings'       => 'dav_widget_bergwetter_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_bergbericht_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets2_section',
        'settings'       => 'dav_widget_bergbericht_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_tour_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets3_section',
        'settings'       => 'dav_widget_tour_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_ava_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets4_section',
        'settings'       => 'dav_widget_ava_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_huettensuche_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets5_section',
        'settings'       => 'dav_widget_huettensuche_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_huetten_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets6_section',
        'settings'       => 'dav_widget_huetten_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_panorama_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets7_section',
        'settings'       => 'dav_widget_panorama_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_widget_hallen_sector', array(
        'label'          => __( 'Sector auswählen', 'dav' ),
        'section'        => 'dav_imagewidgets8_section',
        'settings'       => 'dav_widget_hallen_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'Widget-Sektor 1' ),
            '2'  => __( 'Widget-Sektor 2' ),
            '3'  => __( 'Widget-Sektor 3' )
        )
    )));

}


/**
 * Generate the panel for custom-widgets for every section
 */
function dav_customwidgets_customize_register( $wp_customize ) {

    $wp_customize->add_panel( 'dav_customwidgets', array(
        'priority'       => 40,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Individual-Widgets', 'dav'),
        'description'    => __('Individual-Widgets können individuell von Ihnen mit Bild und Text gefüllt werden. Die Individual-Widgets sind in ihrem Layout identisch zu den DAV-Widgets. So können sie diese gut vermischen. <br>Mehr Informationen finden sie in den <a href="https://template.alpenverein.de/index.php/wissen/individual-widgets/" target="_blank">FAQ zur Website</a>.', 'dav'),
    ) );
    $wp_customize->add_section( 'dav_customwidgets1_section' , array(
        'title'       => __( 'Individual-Widgets 1', 'dav_custom_widgets' ),
        'priority'    => 10,
        'description' => 'Hier können individual-Widgets angelegt werden. Diese werden entweder im DAV-Widget-Sektor oder in einem eigenen Sektor angezeigt.',
        'panel' => 'dav_customwidgets',
    ));
    $wp_customize->add_section( 'dav_customwidgets2_section' , array(
        'title'       => __( 'Individual-Widget 2', 'dav_custom_widgets' ),
        'priority'    => 20,
        'description' => 'Hier können individual-Widgets angelegt werden. Diese werden entweder im DAV-Widget-Sektor oder in einem eigenen Sektor angezeigt.',
        'panel' => 'dav_customwidgets',
    ));
    $wp_customize->add_section( 'dav_customwidgets3_section' , array(
        'title'       => __( 'Individual-Widget 3', 'dav_custom_widgets' ),
        'priority'    => 30,
        'description' => 'Hier können individual-Widgets angelegt werden. Diese werden entweder im DAV-Widget-Sektor oder in einem eigenen Sektor angezeigt.',
        'panel' => 'dav_customwidgets',
    ));
    $wp_customize->add_section( 'dav_customwidgets4_section' , array(
        'title'       => __( 'Individual-Widget 4', 'dav_custom_widgets' ),
        'priority'    => 40,
        'description' => 'Hier können individual-Widgets angelegt werden. Diese werden entweder im DAV-Widget-Sektor oder in einem eigenen Sektor angezeigt.',
        'panel' => 'dav_customwidgets',
    ));
    $wp_customize->add_section( 'dav_customwidgets5_section' , array(
        'title'       => __( 'Individual-Widget 5', 'dav_custom_widgets' ),
        'priority'    => 50,
        'description' => 'Hier können individual-Widgets angelegt werden. Diese werden entweder im DAV-Widget-Sektor oder in einem eigenen Sektor angezeigt.',
        'panel' => 'dav_customwidgets',
    ));
    $wp_customize->add_section( 'dav_customwidgets6_section' , array(
        'title'       => __( 'Individual-Widget 6', 'dav_custom_widgets' ),
        'priority'    => 60,
        'description' => 'Hier können individual-Widgets angelegt werden. Diese werden entweder im DAV-Widget-Sektor oder in einem eigenen Sektor angezeigt.',
        'panel' => 'dav_customwidgets',
    ));

    $wp_customize->add_setting( 'dav_customwidget_1_title', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_2_title', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_3_title', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_4_title', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_5_title', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_6_title', array('default' => '',));

    $wp_customize->add_setting( 'dav_customwidget_1_link', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_2_link', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_3_link', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_4_link', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_5_link', array('default' => '',));
    $wp_customize->add_setting( 'dav_customwidget_6_link', array('default' => '',));

    $wp_customize->add_setting( 'dav_customwidget_1_image', array('sanitize_callback' => 'absint',));
    $wp_customize->add_setting( 'dav_customwidget_2_image', array('sanitize_callback' => 'absint',));
    $wp_customize->add_setting( 'dav_customwidget_3_image', array('sanitize_callback' => 'absint',));
    $wp_customize->add_setting( 'dav_customwidget_4_image', array('sanitize_callback' => 'absint',));
    $wp_customize->add_setting( 'dav_customwidget_5_image', array('sanitize_callback' => 'absint',));
    $wp_customize->add_setting( 'dav_customwidget_6_image', array('sanitize_callback' => 'absint',));

    $wp_customize->add_setting( 'dav_customwidget_1_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_customwidget_2_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_customwidget_3_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_customwidget_4_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_customwidget_5_sector', array('default' => false,));
    $wp_customize->add_setting( 'dav_customwidget_6_sector', array('default' => false,));


    $wp_customize->add_control( 'dav_customwidget_1_title', array(
        'label' => __( 'Titel des Widgets 1', 'dav' ),
        'section' => 'dav_customwidgets1_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_1_title'
    ));
    $wp_customize->add_control( 'dav_customwidget_1_link', array(
        'label' => __( 'Link des Widgets 1', 'dav' ),
        'section' => 'dav_customwidgets1_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_1_link'
    ));
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'dav_customwidget_1_image', array(
        'label'    => __( 'Bild 1 auswählen', 'dav' ),
        'section'  => 'dav_customwidgets1_section',
        'settings' => 'dav_customwidget_1_image',
        'height' => 294,
        'width' => 500,
        'flex_width ' => false,
        'flex_height ' => false,
        'priority' => 1
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_customwidget_1_sector', array(
        'label'          => __( 'Sector auswählen für Widget 1', 'dav' ),
        'section'        => 'dav_customwidgets1_section',
        'settings'       => 'dav_customwidget_1_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'DAV Widget-Sektor 1' ),
            '2'  => __( 'DAV Widget-Sektor 2' ),
            '3'  => __( 'DAV Widget-Sektor 3' )
        )
    )));

    $wp_customize->add_control( 'dav_customwidget_2_title', array(
        'label' => __( 'Titel des Widgets 2', 'dav' ),
        'section' => 'dav_customwidgets2_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_2_title'
    ));
    $wp_customize->add_control( 'dav_customwidget_2_link', array(
        'label' => __( 'Link des Widgets 2', 'dav' ),
        'section' => 'dav_customwidgets2_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_2_link'
    ));
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'dav_customwidget_2_image', array(
        'label'    => __( 'Bild 2 auswählen', 'dav' ),
        'section'  => 'dav_customwidgets2_section',
        'settings' => 'dav_customwidget_2_image',
        'height' => 294,
        'width' => 500,
        'flex_width ' => false,
        'flex_height ' => false,
        'priority' => 1
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_customwidget_2_sector', array(
        'label'          => __( 'Sector auswählen für Widget 2', 'dav' ),
        'section'        => 'dav_customwidgets2_section',
        'settings'       => 'dav_customwidget_2_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'DAV Widget-Sektor 1' ),
            '2'  => __( 'DAV Widget-Sektor 2' ),
            '3'  => __( 'DAV Widget-Sektor 3' )
        )
    )));

    $wp_customize->add_control( 'dav_customwidget_3_title', array(
        'label' => __( 'Titel des Widgets 3', 'dav' ),
        'section' => 'dav_customwidgets3_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_3_title'
    ));
    $wp_customize->add_control( 'dav_customwidget_3_link', array(
        'label' => __( 'Link des Widgets 3', 'dav' ),
        'section' => 'dav_customwidgets3_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_3_link'
    ));
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'dav_customwidget_3_image', array(
        'label'    => __( 'Bild 3 auswählen', 'dav' ),
        'section'  => 'dav_customwidgets3_section',
        'settings' => 'dav_customwidget_3_image',
        'height' => 294,
        'width' => 500,
        'flex_width ' => false,
        'flex_height ' => false,
        'priority' => 1
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_customwidget_3_sector', array(
        'label'          => __( 'Sector auswählen für Widget 3', 'dav' ),
        'section'        => 'dav_customwidgets3_section',
        'settings'       => 'dav_customwidget_3_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'DAV Widget-Sektor 1' ),
            '2'  => __( 'DAV Widget-Sektor 2' ),
            '3'  => __( 'DAV Widget-Sektor 3' )
        )
    )));

    $wp_customize->add_control( 'dav_customwidget_4_title', array(
        'label' => __( 'Titel des Widgets 4', 'dav' ),
        'section' => 'dav_customwidgets4_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_4_title'
    ));
    $wp_customize->add_control( 'dav_customwidget_4_link', array(
        'label' => __( 'Link des Widgets 4', 'dav' ),
        'section' => 'dav_customwidgets4_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_4_link'
    ));
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'dav_customwidget_4_image', array(
        'label'    => __( 'Bild 4 auswählen', 'dav' ),
        'section'  => 'dav_customwidgets4_section',
        'settings' => 'dav_customwidget_4_image',
        'height' => 294,
        'width' => 500,
        'flex_width ' => false,
        'flex_height ' => false,
        'priority' => 1
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_customwidget_4_sector', array(
        'label'          => __( 'Sector auswählen für Widget 4', 'dav' ),
        'section'        => 'dav_customwidgets4_section',
        'settings'       => 'dav_customwidget_4_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'DAV Widget-Sektor 1' ),
            '2'  => __( 'DAV Widget-Sektor 2' ),
            '3'  => __( 'DAV Widget-Sektor 3' )
        )
    )));

    $wp_customize->add_control( 'dav_customwidget_5_title', array(
        'label' => __( 'Titel des Widgets 5', 'dav' ),
        'section' => 'dav_customwidgets5_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_5_title'
    ));
    $wp_customize->add_control( 'dav_customwidget_5_link', array(
        'label' => __( 'Link des Widgets 5', 'dav' ),
        'section' => 'dav_customwidgets5_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_5_link'
    ));
    $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'dav_customwidget_5_image', array(
        'label'    => __( 'Bild 5 auswählen', 'dav' ),
        'section'  => 'dav_customwidgets5_section',
        'settings' => 'dav_customwidget_5_image',
        'height' => 294,
        'width' => 500,
        'flex_width ' => false,
        'flex_height ' => false,
        'priority' => 1
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_customwidget_5_sector', array(
        'label'          => __( 'Sector auswählen für Widget 5', 'dav' ),
        'section'        => 'dav_customwidgets5_section',
        'settings'       => 'dav_customwidget_5_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'DAV Widget-Sektor 1' ),
            '2'  => __( 'DAV Widget-Sektor 2' ),
            '3'  => __( 'DAV Widget-Sektor 3' )
        )
    )));

    $wp_customize->add_control( 'dav_customwidget_6_title', array(
        'label' => __( 'Titel des Widgets 6', 'dav' ),
        'section' => 'dav_customwidgets6_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_6_title'
    ));
    $wp_customize->add_control( 'dav_customwidget_6_link', array(
        'label' => __( 'Link des Widgets 6', 'dav' ),
        'section' => 'dav_customwidgets6_section',
        'type' => 'text',
        'settings' => 'dav_customwidget_6_link'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dav_customwidget_6_image', array(
        'label'    => __( 'Bild 6 auswählen', 'dav' ),
        'section'  => 'dav_customwidgets6_section',
        'settings' => 'dav_customwidget_6_image',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_customwidget_6_sector', array(
        'label'          => __( 'Sector auswählen für Widget 6', 'dav' ),
        'section'        => 'dav_customwidgets6_section',
        'settings'       => 'dav_customwidget_6_sector',
        'type'           => 'select',
        'choices'        => array(
            'false' => __('Nicht anzeigen'),
            '1'   => __( 'DAV Widget-Sektor 1' ),
            '2'  => __( 'DAV Widget-Sektor 2' ),
            '3'  => __( 'DAV Widget-Sektor 3' )
        )
    )));

}


/**
 * Generate the Panel "Template-Haupteinstellungen"
 */
function dav_theme_customize_register( $wp_customize ) {

    // Add Panel DAV-Main
    $wp_customize->add_panel( 'dav_main', array(
        'priority'       => 30,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Template–Haupteinstellungen', 'dav'),
        'description'    => __('Festlegung der Grundeinstellungen des Templates.<br>Mehr Informationen finden sie in den <a href="https://template.alpenverein.de/index.php/wissen/die-startseite-anpassen/" target="_blank">FAQ zur Website</a>.', 'dav'),
    ) );

    // Logo upload
    $wp_customize->add_section( 'dav_logo_section' , array(
        'title'       => __( 'Sektionslogo', 'dav_logo' ),
        'priority'    => 10,
        'description' => 'Bitte das Sektionslogo hier auswählen oder hochladen.',
        'panel' => 'dav_main',
    ) );

    //Hintergrundbild/Muster
    $wp_customize->add_section( 'dav_backgroundimage_section' , array(
        'title'       => __( 'Hintergrund', 'dav_backgroundimage' ),
        'priority'    => 20,
        'description' => 'Hier kann ein Muster oder eine Hintergrundfarbe für die Website festgelegt werden. Sobald ein Bild für ein Muster festgelegt wird, ist dieses automatisch ausgewählt.',
        'panel' => 'dav_main',
    ) );

    //Menü
    $wp_customize->add_section( 'dav_menu_section' , array(
        'title'       => __( 'Menü-Einstellungen', 'dav_menu' ),
        'priority'    => 30,
        'description' => 'Hier können die verschiedenen Optionen für das Menü festgelegt werden.',
        'panel' => 'dav_main',
    ) );

    //Quicklinks
    $wp_customize->add_section( 'dav_quicklinks_section' , array(
        'title'       => __( 'Quicklinks-Einstellungen', 'dav_menu' ),
        'priority'    => 40,
        'description' => 'Über dem Menü gibt es ein zusätzliches Menü für Quicklinks. Dieses kann hier eingestellt werden.',
        'panel' => 'dav_main',
    ) );

    //Brotkrümmel-Navigation
    $wp_customize->add_section( 'dav_standard_section' , array(
        'title'       => __( 'Auszuglänge, Brotkrümmel', 'dav_standard' ),
        'priority'    => 50,
        'description' => 'Hier können die Länge der Auszüge der News, sowie weitere Einstellungen getätigt werden.',
        'panel' => 'dav_main',
    ) );

    //Social Media
    $wp_customize->add_section( 'dav_socialmedia_section' , array(
        'title'       => __( 'Social Media', 'dav_socialmedia' ),
        'priority'    => 60,
        'description' => 'Anlegen von Links zu Twitter, Facebook, Instagram.',
        'panel' => 'dav_main',
    ) );

    // Footer-Logo upload
    $wp_customize->add_section( 'dav_footerlogo_section' , array(
        'title'       => __( 'Footerlogo', 'dav_footerlogo' ),
        'priority'    => 70,
        'description' => 'Hier kann ein zweites Logo in den Footer gelegt werden.',
        'panel'  => 'dav_main',
    ) );

    //Footer-Silhouette
    $wp_customize->add_section( 'dav_footerimage_section' , array(
        'title'       => __( 'Bergsilhouette', 'dav_footerimage' ),
        'priority'    => 80,
        'description' => 'Hier kann ein Bild über den Footer gelegt werden. Um diesen etwas zu individualisieren. Bspw. eine Bergsilhouette.',
        'panel'  => 'dav_main',
    ) );


    // Sektionslogo
    $wp_customize->add_setting( 'dav_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dav_logo', array(
        'label'    => __( 'Sektionslogo', 'dav_logo' ),
        'section'  => 'dav_logo_section',
        'settings' => 'dav_logo',
    ) ) );


    // Hintergrundbild upload
    $wp_customize->add_setting( 'dav_backgroundimage', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dav_backgroundimage', array(
        'label'    => __( 'Bild/Muster', 'dav_backgroundimage' ),
        'section'  => 'dav_backgroundimage_section',
        'settings' => 'dav_backgroundimage',
    ) ) );

    // add color picker setting
    $wp_customize->add_setting( 'dav_background_color', array(
        'default' => '#ffffff'
    ) );

// add color picker control
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dav_background_color', array(
        'label' => 'Hintergrundfarbe',
        'section' => 'dav_backgroundimage_section',
        'settings' => 'dav_background_color',
    ) ) );

    //Menü-Option
    $wp_customize->add_setting('dav_menucolor', array('default' => 'white'));
    $wp_customize->add_setting('dav_menuview', array('default' => 'boxed'));
    $wp_customize->add_setting('dav_menubehavior', array('default' => ''));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_menucolor', array(
        'label'          => __( 'MenüFarbe', 'dav' ),
        'section'        => 'dav_menu_section',
        'settings'       => 'dav_menucolor',
        'type'           => 'select',
        'choices'        => array(
            'primary' => __('Grün'),
            'light' => __('Hell'),
            'dark' => __('Dunkel'),
            'white' => __('Weiß'),
            'trans' => __('Transparent')
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_menuview', array(
        'label'          => __( 'Menü-Darstellung', 'dav' ),
        'section'        => 'dav_menu_section',
        'settings'       => 'dav_menuview',
        'type'           => 'select',
        'choices'        => array(
            'boxed' => __('Boxed'),
            'fluid' => __('Fluid')
        )
    )));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dav_menubehavior', array(
        'label'          => __( 'Menü-Verhalten', 'dav' ),
        'description'          => __( 'Sticky bedeutet, dass das Desktop-Menü beim Scrollen am oberen Rand andockt. Hinweis: Ist ein Slider oder ein Bild im Fullscreen gewählt, fixiert das Menü auf der Startseite immer.', 'dav' ),
        'section'        => 'dav_menu_section',
        'settings'       => 'dav_menubehavior',
        'type'           => 'select',
        'choices'        => array(
            '' => __('Normal'),
            'sticky' => __('Oben halten (Sticky)')
        )
    )));




    //Quicklinks
    $wp_customize->add_setting('dav_intern_link', array('default' => ''));
    $wp_customize->add_setting('dav_intern_text', array('default' => ''));
    $wp_customize->add_setting('dav_phone', array('default' => ''));
    $wp_customize->add_setting('dav_member', array('default' => 'https://www.alpenverein.de/mitglied-werden-dav/so-werden-sie-dav-mitglied_aid_27574.html'));
    $wp_customize->add_setting('dav_extern1_link', array('default' => ''));
    $wp_customize->add_setting('dav_extern2_link', array('default' => ''));
    $wp_customize->add_setting('dav_extern1_text', array('default' => ''));
    $wp_customize->add_setting('dav_extern2_text', array('default' => ''));
    $wp_customize->add_setting('dav_quicklink',array('default' => false));
    $wp_customize->add_control('dav_intern_link',
            array(
                'title' => __('Interner Link','dav'),
                'label'     => __('Interner Link - URL', 'dav'),
                'section'   => 'dav_quicklinks_section',
                'settings'  => 'dav_intern_link',
                'type'      => 'text',
            )
    );
    $wp_customize->add_control('dav_intern_text',
        array(
            'title' => __('Interner Link Text','dav'),
            'label'     => __('Interner Link - Ausgabetext', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_intern_text',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control('dav_phone',
        array(
            'title' => __('Telefonnummer','dav'),
            'label'     => __('Telefonnummer', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_phone',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control('dav_member',
        array(
            'title' => __('Link zum Mitgliedsantrag','dav'),
            'label'     => __('Link-Adresse zum Mitgliedsantrag', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_member',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control('dav_extern1_link',
        array(
            'title' => __('Externer Link 1','dav'),
            'label'     => __('Externer Link 1 - Link', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_extern1_link',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control('dav_extern1_text',
        array(
            'title' => __('Externer Link Text','dav'),
            'label'     => __('Externer Link 1 - Ausgabetext', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_extern1_text',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control('dav_extern2_link',
        array(
            'title' => __('Externer Link','dav'),
            'label'     => __('Externer Link 2 - Link', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_extern2_link',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control('dav_extern2_text',
        array(
            'title' => __('Externer Link Text','dav'),
            'label'     => __('Externer Link 2 - Ausgabetext', 'dav'),
            'section'   => 'dav_quicklinks_section',
            'settings'  => 'dav_extern2_text',
            'type'      => 'text',
        )
    );
    $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'dav_quicklink',
            array(
                'title' => __('Quicklink-Menü','dav'),
                'label'     => __('anzeigen', 'dav'),
                'section'   => 'dav_quicklinks_section',
                'settings'  => 'dav_quicklink',
                'type'      => 'checkbox',
            )
        )
    );



    //allgemeine Optionen
    $wp_customize->add_setting('dav_excerpt', array('default' => 160));
    $wp_customize->add_setting('dav_breadcrumb',array('default' => 'false'));
    $wp_customize->add_control( 'dav_excerpt', array(
        'title' => __('Auszuglänge', 'dav'),
        'label' => __( 'Auszuglänge in Zeichen', 'dav' ),
        'description' => 'Wieviele Zeichen dürfen für einen Auszug eingegeben werden?',
        'section' => 'dav_standard_section',
        'type' => 'text',
        'settings' => 'dav_excerpt'
    ));
    $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'dav_breadcrumb',
            array(
                'title' => __('Brotkrümmel-Navigation','dav'),
                'label'     => __('anzeigen', 'dav'),
                'section'   => 'dav_standard_section',
                'settings'  => 'dav_breadcrumb',
                'type'      => 'checkbox',
            )
        )
    );


    //SocialMedia
    $wp_customize->add_setting( 'dav_facebook', array('default' => '',));
    $wp_customize->add_setting( 'dav_twitter', array('default' => '',));
    $wp_customize->add_setting( 'dav_instagram', array('default' => '',));

    $wp_customize->add_control( 'dav_facebook', array(
        'label' => __( 'Facebook-Link', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird kein Icon angezeigt.',
        'section' => 'dav_socialmedia_section',
        'type' => 'text',
        'settings' => 'dav_facebook'
    ));
    $wp_customize->add_control( 'dav_twitter', array(
        'label' => __( 'Twitter-Link', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird kein Icon angezeigt.',
        'section' => 'dav_socialmedia_section',
        'type' => 'text',
        'settings' => 'dav_twitter'
    ));
    $wp_customize->add_control( 'dav_instagram', array(
        'label' => __( 'Instagram-Link', 'dav' ),
        'description' => 'Wenn das Feld leer ist, wird kein Icon angezeigt.',
        'section' => 'dav_socialmedia_section',
        'type' => 'text',
        'settings' => 'dav_instagram'
    ));



    // Footer-Logo
    $wp_customize->add_setting( 'dav_footerlogo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dav_footerlogo', array(
        'label'    => __( 'Footerlogo', 'dav_footerlogo' ),
        'section'  => 'dav_footerlogo_section',
        'settings' => 'dav_footerlogo',
    ) ) );


    // Footer-Hintergrundbild upload
    $wp_customize->add_setting( 'dav_footerimage', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dav_footerimage', array(
        'label'    => __( 'Bergsilhouette', 'dav_footerimage' ),
        'section'  => 'dav_footerimage_section',
        'settings' => 'dav_footerimage',
    ) ) );


}


/**
 * Remove the navigation-Panel
 */
function dav_remove_customize_register( $wp_customize ) {

    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_panel('widgets');

}

add_action( 'customize_register', 'dav_remove_customize_register',50 );
add_action( 'customize_register', 'dav_theme_customize_register' );
add_action( 'customize_register', 'dav_davwidgets_customize_register' );
add_action( 'customize_register', 'dav_customwidgets_customize_register' );
add_action( 'customize_register', 'dav_frontpage_customize_register' );









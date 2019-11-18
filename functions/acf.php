<?php

/**
 * ACF-Options for the templates
 *
 */


if( function_exists('acf_add_local_field_group') ):

    //Options for page_overview templates
    acf_add_local_field_group(array(
        'key' => 'group_5c980a9be256d',
        'title' => 'Ausgabe Unterseiten Übersichtsseite',
        'fields' => array(
            array(
                'key' => 'field_5c980acd24b3e',
                'label' => 'Sortierung der Unterseiten',
                'name' => 'dav_sortorder_pages',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'a' => 'Alphabetisch nach Seitentitel',
                    's' => 'Wie in Seiteneinstellung sortiert',
                ),
                'default_value' => array(
                    0 => 'a',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5d4c6d0d78d80',
                'label' => 'Seitenbilder nicht anzeigen',
                'name' => 'dav_imageview_pages',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_overview.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    //Menu-Column-Options for the menu
    acf_add_local_field_group(array(
        'key' => 'group_5b8aefb0f1dff',
        'title' => 'Customizer_Menuspalte',
        'fields' => array(
            array(
                'key' => 'field_5b8aefb7c1faa',
                'label' => 'Menüspalte',
                'name' => 'dav_menucolumn',
                'type' => 'select',
                'instructions' => 'Dieses Feld hilft, einen Unterpunkt des Menüs richtig einzusortieren. Hinweis: Es ist nur bei Menüpunkten der Ebene 2 wichtig. Bei allen anderen Ebenen wird es nicht ausgelesen.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    0 => 'Keine Auswahl',
                    1 => 'Spalte 1',
                    2 => 'Spalte 2',
                    3 => 'Spalte 3',
                ),
                'default_value' => array(
                    0 => 0,
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'nav_menu_item',
                    'operator' => '==',
                    'value' => 'all',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    //Extra Menu in page-templates
    acf_add_local_field_group(array(
        'key' => 'group_5b7d12c629f46',
        'title' => 'Zusatzmenü',
        'fields' => array(
            array(
                'key' => 'field_5b7d17ecbb802',
                'label' => 'Titel über der Linkliste',
                'name' => 'page_linklist_title',
                'type' => 'text',
                'instructions' => 'Welcher Titel soll über der Linkliste stehen',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Weitere Informationen zum Thema',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5b7d12de1e527',
                'label' => 'Linkliste',
                'name' => 'page_linklist',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                ),
                'taxonomy' => array(
                ),
                'allow_null' => 0,
                'allow_archives' => 1,
                'multiple' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => 'Mit diesem Auswahlfeld können bestimmten Seiten beliebige Menüs hinzugefügt werden.',
    ));

    //Seitenmenü im Page-Template
    acf_add_local_field_group(array(
        'key' => 'group_5d52ba4ee0838',
        'title' => 'Seitenmenü',
        'fields' => array(
            array(
                'key' => 'field_5d52ba673a427',
                'label' => 'Seitentyp',
                'name' => 'sidebarmenu_type',
                'type' => 'radio',
                'instructions' => 'Es können die Seiten auf gleicher Inhaltsebene oder die direkten Unterseiten der aktuellen Seite angezeigt werden.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    0 => 'Nichts anzeigen',
                    1 => 'Geschwisterseiten',
                    2 => 'Kinderseiten',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5d53c9d82f8fd',
                'label' => 'Titel Seitenmenü',
                'name' => 'sidebarmenu_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    //Content im Widget-Template
    acf_add_local_field_group(array(
        'key' => 'group_5db57903ed4f1',
        'title' => 'Widget-Content',
        'fields' => array(
            array(
                'key' => 'field_5db5791b1f766',
                'label' => 'Inhalt',
                'name' => 'widget_inhalt',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page_widgets.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    //OnePager
    acf_add_local_field_group(array(
        'key' => 'group_5d88884d8d124',
        'title' => 'OnePager',
        'fields' => array(
            array(
                'key' => 'field_5d8888b494237',
                'label' => 'In OnePager anzeigen',
                'name' => 'onepager_show',
                'type' => 'radio',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    0 => 'Im Onepager nicht anzeigen',
                    1 => 'Im Onepager anzeigen',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 0,
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5d888ca5ed62a',
                'label' => 'Hintergrundfarbe',
                'name' => 'onepager_color',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'w' => 'Weiß',
                    'bg-primary' => 'Grün',
                    'has-dav-gruen-75-background-color' => 'Grün, 75%',
                    'has-dav-gruen-50-background-color' => 'Grün, 50%',
                    'has-dav-gruen-25-background-color' => 'Grün, 25%',
                    'bg-dark' => 'Dunkelgrau',
                    'bg-light' => 'Hellgrau',
                    'bg-secondary' => 'Orange',
                    'bg-success' => 'Blau',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => '',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;


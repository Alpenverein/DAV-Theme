<?php

if( function_exists('acf_add_local_field_group') ):

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

endif;